<?php
/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 5/26/17
 * Time: 9:48 AM
 */

    define('CATEGORY_PATH',"admin/DB/categories.json");
    define('INFO_PATH',"admin/DB/info.json");
    define('ITEM_PATH',"admin/DB/category_items_");
    define('ITEM_VALIDATION_PATH',"../DB/items_validation.csv");
    define('IMAGES_PATH',"src/images/");
    define('IMAGE_MAX_WIDTH',400);

    function addItemToValidation($title,$categoryId,$url = null){
        if (isset($url)){
            $image_path = '../../'.IMAGES_PATH;
            $name = loadImageAndResize($url, $image_path, IMAGE_MAX_WIDTH);
            return addItemToFile($title,$categoryId, $name);
        }else if(isset($_FILES)){
            $image_path = '../../'.IMAGES_PATH;
            switch ($_FILES['image']['type']) {
                case 'image/jpeg': $ext = ".jpg"; break;
                case 'image/png': $ext = ".png"; break;
                case 'image/gif': $ext = ".gif"; break;
                default: $ext = ''; break;
            }
            if (!$ext){
                return false;
            }
            $file = $_FILES["image"]['tmp_name'];
            $imgName = md5(microtime()).$ext;
            $fullNameImage = $image_path.$imgName;
            resizeImageToWidth($file, $fullNameImage, IMAGE_MAX_WIDTH);
            return addItemToFile($title,$categoryId,$imgName);
        }
        else{
            return false;
        }
    }

    # Функция для загрузки и ресайза изображений
    function loadImageAndResize( $url, $preview_path, $size )
    {
        /*
         * $url - ссылка на изображение
         * $preview_path - папка, куда сохраняем превьюшки
         * $original_path - папка, куда сохраняем оригинал
         * $size - размер большей строны (в пикселях)
        */

        # Допустимые расширения
        $enabled = array( 'png', 'gif', 'jpeg', 'jpg');

        # Получаем изображение. Если функция не отработала
        if( $image = file_get_contents( $url ) )
        {
            # Генерируем имя tmp-изображения
            $tmp_name = md5(microtime());

            # Сохраняем изображение
            file_put_contents( $tmp_name, $image );

            # Очищаем память
            unset( $image );

            # Если getimagesize вернула массив
            if( $info = getimagesize( $tmp_name ) )
            {
                # Вычисляем тип изображения
                $type = trim( strrchr( $info['mime'], '/' ), '/' );

                # Если тип не подходит
                if( !in_array( $type, $enabled ) ) die( $type . ' - Недопустимый тип файла' );
                $type_format = $type == 'jpg' ? 'jpeg' : $type ;
                # Исходя из типа формируем названия функций
                $imagecreate = 'imagecreatefrom' . $type_format;
                $imagesave = 'image' . $type;
                $imagename = md5(microtime()) . '.' . $type;

                # Получаем данные об изображении
                list( $width, $height ) = $info;

                # Создаём ресурс изображения
                $src_im = $imagecreate( $tmp_name );

                # Вычисляем ширину
                $new_width = $width > $height ? $size : ceil( ( $width * $size ) / $height );

                # Вычисляем высоту
                $new_height = $width < $height ? $size : ceil( ( $height * $size ) / $width );

                # Создаём новое изображение
                $dst_im = imagecreatetruecolor( $new_width, $new_height );

                # Ресайзим
                imagecopyresampled( $dst_im, $src_im, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

                # Чистим память
                unset( $src_im );

                # Сохраняем превьюшку
                if( !$imagesave($dst_im, $preview_path . $imagename ) ) $return = false;

                # Очищаем память
                unset( $dst_im );
                unlink( $tmp_name );

                # Возвращаем
                return $imagename;
            }
        }
    }

    function resizeImageToWidth($fileName, $newFileName,$width){
        $image_info = getimagesize($fileName);
        $image_type = $image_info[2];
        if( $image_type == IMAGETYPE_JPEG ) {
            $image = imagecreatefromjpeg($fileName);
        } elseif( $image_type == IMAGETYPE_GIF ) {
            $image = imagecreatefromgif($fileName);
        } elseif( $image_type == IMAGETYPE_PNG ) {
            $image = imagecreatefrompng($fileName);
        }
        $imageW = imagesx($image);
        $imageH = imagesy($image);
        $ratio = $width / $imageW;
        $height = $imageH * $ratio;
        $new_image = imagecreatetruecolor($width, $height);
        imagecopyresampled($new_image, $image, 0, 0, 0, 0, $width, $height, $imageW, $imageH);
        $image = $new_image;

        if( $image_type == IMAGETYPE_JPEG ) {
            imagejpeg($image,$newFileName);
        } elseif( $image_type == IMAGETYPE_GIF ) {
            imagegif($image,$newFileName);
        } elseif( $image_type == IMAGETYPE_PNG ) {
            imagepng($image,$newFileName);
        }
        unset($image);
    }

    function addItemToFile($title,$categoryId,$img){

        if (file_exists(ITEM_VALIDATION_PATH)){
            $handler = fopen(ITEM_VALIDATION_PATH,'a');
            $item = array($categoryId,$img,$title);
            fputcsv($handler,$item);
            fclose($handler);
            return true;
        }

        return false;
    }

    function getAllCategories(){
        if(file_exists(CATEGORY_PATH)){
            $content = file_get_contents(CATEGORY_PATH);
            $categories = json_decode($content,true);
            return $categories;
        }
        return "getAllCategories ERROR";
    }

    function getCategoryById($id){
        if(file_exists(CATEGORY_PATH)){
            $content = file_get_contents(CATEGORY_PATH);
            $categories = json_decode($content,true);
            foreach ($categories as $category) {
                if ($category["id"] == $id){
                    return $category;
                }
            }
            return "getCategoryById category $id not exists";
        }
        return "getCategoryById ERROR";
    }

    function getInfo($path = INFO_PATH){
        if(file_exists($path)){
            $content = file_get_contents($path);
            $info = json_decode($content,true);
            return $info;
        }
        return "getInfo ERROR";
    }

    # Get last 10 items from file csv
    function getLastItemsCountByStep($categoryId, $count = 10, $step =  0){
        $fileName = ITEM_PATH.$categoryId.".csv";
        if (file_exists($fileName)){

            $items = array();
            $handler = fopen($fileName,"r");
            $countLines = 0;
            while( !feof( $handler)){
                fgets($handler);
                $countLines++;
            }
            rewind($handler);

            $endPosition = $countLines - $count * $step - 1;
            $startPosition = $endPosition - $count;

            for ($i=0; $item = fgetcsv($handler); $i++){
                if ($i >= $endPosition){
                    break;
                }
                if ($i >= $startPosition){
                    array_unshift($items, $item);
                }
            }
            fclose($handler);
            return $items;
        }
        return "getLastItemsCountByStep $fileName ERROR";
    }

    # Get count lines from file
    function getCountLinesInFile($filePath){
        if (file_exists($filePath)){
            $count = 0;
            $handler = fopen($filePath, 'r');
            while( !feof($handler)){
                fgets($handler);
                $count++;
            }
            fclose( $handler);
            return $count;
        }
        return "getCountLinesInFile error";
    }

    function sendMessage($name,$text){
        $info    = getInfo('../DB/info.json');
        $to      = $info['email'];
        if ($to){
            $subject = 'Forfan - сообщение';
            $message = "Имя: $name \r\nСообщение: $text";
            $headers = 'From: no-replay@forfan.by'. "\r\n" .
                'Reply-To: '. $to . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
            mail($to, $subject, $message, $headers);
            return true;
        }else{
            return false;
        }
    }