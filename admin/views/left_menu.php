<div class="">
    <div class="list-group">
        <a href="/" class="list-group-item active">
            <span class="badge">14</span>
            Все
        </a>
        <?php foreach ($categories as $category) {?>
            <a href="?cat_id=<?php echo $category["id"];?>" class="list-group-item">
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
