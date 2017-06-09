<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

if($_GET['id'] == 1){
    echo json_encode(array(
        "status"=>true,
        "message"=>$_GET['id']
    ));
    exit;
}
echo json_encode(array("status"=>false));
