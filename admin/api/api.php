<?php

    require_once 'utils.php';
    $categoryId = isset($_GET["cat_id"])? $_GET["cat_id"]:0;
    if ($categoryId){
        $categories = getAllCategories();
        $items = getLastItemsCountByStep($categoryId);
        $info = getInfo();
        $banners = array();
    }




