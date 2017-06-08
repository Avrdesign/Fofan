<?php

    require_once 'utils.php';
    $categoryId = isset($_GET["cat_id"])? $_GET["cat_id"]:-1;
    $info = getInfo();
    $activeCat = $categoryId != -1 ? isCategoryExist($categoryId) : $info;
    $activeCategory = $activeCat['id'];
    $categories = getAllCategories();
    $items = getLastItemsCountByStep($categoryId);
    $totalCount = getAllItemsCount();




