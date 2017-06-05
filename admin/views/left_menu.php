<div class="">
    <div class="list-group">
        <a href="/zanko" class="list-group-item <?php echo !$activeCategory ? 'active' : '';?>">
            <span class="badge"><?php echo $totalCount;?></span>
            Все
        </a>
        <?php foreach ($categories as $category) {?>
            <a href="?cat_id=<?php echo $category["id"];?>" class="list-group-item <?php echo $activeCategory == $category["id"] ? 'active' : '';?>">
                <span class="badge"><?php echo $category["count"];?></span>
                <?php echo $category["name"];?>
            </a>
        <?php } ?>
    </div>

    <div class="leftBanner">
        Место для вашей рекламы
        Место для вашей рекламы

        Место для вашей рекламы

        Место для вашей рекламы

        Место для вашей рекламы
    </div>
</div>
