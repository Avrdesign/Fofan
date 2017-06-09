<?php
require_once 'utils.php';

$cat_id = $_GET["category_id"];
$step = $_GET["step"];
$answer = array("status"=>false);
if(isset($cat_id,$step)){
    $itemsTemp = getLastItemsCountByStep($cat_id,10,$step,ADMIN_AJAX_CATEGORIES_ITEMS_PATH);
    $answer["items"] = $itemsTemp;
    if(count($answer["items"])){
        $answer["status"]=true;
    }
}

echo json_encode($answer);