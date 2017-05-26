<?php

    require_once 'utils.php';

    define('CATEGORY_PATH',"admin/DB/categories.json");
    define('INFO_PATH',"admin/DB/info.json");
    define('ITEM_PATH',"admin/DB/category_items_");
    define('IMAGES_PATH',"src/images/");

    $categories = getAllCategories();
    $items = getLastItemsCountByStep(1);
    $info = getInfo();
    $banners = array();


