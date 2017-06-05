<?php

    require_once 'utils.php';
    $categoryId = isset($_GET["cat_id"])? $_GET["cat_id"]:-1;
    $activeCategory = isCategoryExist($categoryId);
    $categories = getAllCategories();
    $items = getLastItemsCountByStep($categoryId);
    $totalCount = getAllItemsCount();
    $info = getInfo();
    $banners = array();




