<?php
/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 5/29/17
 * Time: 11:43 AM
 */
require_once 'utils.php';

if (isset($_POST["name"], $_POST["message"])){
    $answer = sendMessage($_POST["name"],$_POST["message"]);
    echo json_encode(array("status"=>$answer, "message"=>"Письмо отправлен"));
}
