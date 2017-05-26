<?php
/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 5/26/17
 * Time: 9:48 AM
 */

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
            return "getAllCategories category $id not exists";
        }
        return "getCategoryById ERROR";
    }

    function getInfo(){
        if(file_exists(INFO_PATH)){
            $content = file_get_contents(INFO_PATH);
            $info = json_decode($content,true);
            return $info;
        }
        return "getInfo ERROR";
    }


    # Get last 10 items from file csv
    function getLastItemsCountByStep($categoryId, $count = 10, $step = 0){
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
            while( !feof( $handler)){
                fgets($handler);
                $count++;
            }
            fclose( $handler);
            return $count;
        }
        return "getCountLinesInFile error";
    }