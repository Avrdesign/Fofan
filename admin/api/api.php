<?php

    require_once 'utils.php';

    $categories = getAllCategories();
    $items = getLastItemsCountByStep(1);
    $info = getInfo();
    $banners = array();



