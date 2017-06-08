<?php
/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 6/2/17
 * Time: 10:42 PM
 */
require_once 'utils.php';
session_start();
$type = $_POST['form'];

if (isset($type)){
    $answer = array('status'=>false);
    switch ($type){
        case 'add_category':
            $name = $_POST['name'];
            if ($name){
                $answer = createCategory($name);
                $answer['message'] = $answer['status'] ? "Категория $name создана" : "Категории $name не создана";
            }
            break;
        case 'delete_category':
            $id = $_POST['id'];
            if ($id){
                $answer = deleteCategory($id);
                $name = $answer["category"]["name"];
                $answer['message'] = $answer['status'] ? "Категория $name удалена" : "Категория $name не удалена";
            }
            break;
        case 'rename_category':
            $id = $_POST['id'];
            $name = $_POST['name'];
            if ($id){
                $answer = renameCategory($id,$name);
                $name = $answer["name"];
                $answer['message'] = $answer['status'] ? "Категория $name изменина" : "Категория $name не изменина";
            }
            break;
        case 'change_password':
            $password = $_POST['password'];
            $new_password = $_POST['new_password'];
            if (isset($password,$new_password)){
                $answer = changePassword($password,$new_password);
                $_SESSION["password"] = $new_password;
            }
            break;
        case 'change_info':
            $email = $_POST['email'];
            $title = $_POST['title'];
            $subTitle = $_POST['sub_title'];

            if (isset($email,$title,$subTitle)){
                $answer = changeInfo($email,$title,$subTitle);
            }
            break;
        case 'validation_item_remove':
            $name = $_POST['name'];
            if (isset($name)){
                $answer["status"] = deleteValidationItem($name);
            }
            break;
        case 'validation_item_save':
            $imageName = $_POST['name'];
            $categoryId = $_POST['id'];
            $title = $_POST['title'];

            if (isset($imageName,$categoryId,$title)){
                $answer["status"] = validateItem($imageName,$categoryId,$title);
            }
            break;
        case 'search_item':
            $value = $_POST['text'];
            if (isset($value)){
                $answer = searchItemsByValue($value);
            }
            break;
        case 'save_item':
            $imageName = $_POST['item_img'];
            $categoryId = $_POST['cat_id'];
            $title = $_POST['title'];
            if (isset($imageName,$categoryId,$title)){
                $answer["status"] = saveItemFromAdminPanel($imageName,$categoryId,$title);
            }
            break;
        case 'delete_item':
            $categoryId = $_POST['cat_id'];
            $imageName = $_POST['item_img'];
            if (isset($categoryId,$imageName)){
                $answer["status"] = deleteItemFromAdminPanel($imageName,$categoryId);
            }
            break;
        case 'save_banners':
            $url_left = $_POST["url_left"];
            $url_center = $_POST["url_center"];
            $url_right = $_POST["url_right"];
            $id = $_POST["id"];
            if (isset($url_left,$url_center,$url_right)){
                $answer = saveBanners($id,$url_left,$url_center,$url_right);
            }
            break;
        case 'remove_banner':

            $position = $_POST["pos"];
            $cat_id = $_POST["cat_id"];

            if (isset($position,$cat_id)){
                $answer = removeBanner($cat_id,$position);
            }
            break;
        default:break;
    }
    echo json_encode($answer);
}
