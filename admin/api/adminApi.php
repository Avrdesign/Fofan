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
        default:break;
    }
    echo json_encode($answer);
}
