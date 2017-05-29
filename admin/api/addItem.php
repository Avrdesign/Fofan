<?php
/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 5/29/17
 * Time: 2:02 PM
 */

require_once 'utils.php';

$title = $_POST["title"];
$categoryId = $_POST["category_id"];
$urlImage = $_POST["url"];

if (isset($title,$categoryId)){
    $answer = array();
    if (isset($urlImage)){
        $answer["status"] = addItemToValidation($title,$categoryId,$urlImage);
        $answer["message"] = $answer["status"] ? "Ваша картинка отправлена на валидацию": "Сбой сервера";
    }else if (isset($_FILES)){
        $answer["status"] = addItemToValidation($title,$categoryId);
        $answer["message"] = $answer["status"] ? "Ваша картинка отправлена на валидацию": "Сбой сервера";
    }else{
        $answer["status"] = false;
    }
    echo json_encode($answer);
}
