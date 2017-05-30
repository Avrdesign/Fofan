<?php
/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 5/29/17
 * Time: 2:02 PM
 */

require_once 'utils.php';

$title = $_POST["title"];
$categoryId = $_POST["category"];
$type = $_POST["type"];
$url = $_POST["url"];


if(isset($title,$categoryId)){
    $answer = array("status"=>false);
    if($type == 'url'){
        $answer["status"] = addItemToValidation($title,$categoryId,$url);
    }else if($type == 'file'){
        $answer["status"] = addItemToValidation($title,$categoryId);
    }
    $answer["message"] = $answer["status"] ? "Ваша картинка отправлена на валидацию" : "Сбой сервера";
    echo json_encode($answer);
}
