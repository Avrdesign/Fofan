<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><?php echo $info["title"];?><small class="hidden-xs"><?php echo $info["sub_title"];?></small></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right visible-xs">
                <li>
                    <a href="/zanko">Все
<!--                        <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span>-->
                        <span class="badge pull-right"><?php echo $totalCount;?></span>
                    </a>
                </li>
                <?php foreach ($categories as $category) {?>
                    <li>
                        <a href="?cat_id=<?php echo $category["id"];?>"><?php echo $category["name"];?>
<!--                            <span class="glyphicon glyphicon-chevron-right pull-right" aria-hidden="true"></span>-->
                            <span class="badge pull-right"><?php echo $category["count"];?></span>
                        </a>
                    </li>
                <?php }?>
                <hr>
                <li><a href="#" data-toggle="modal" data-target="#exampleModal">Добавить картинку<span class="glyphicon glyphicon-plus pull-right" aria-hidden="true"></span></a></li>
                <li><a href="#" data-toggle="modal" data-target="#exampleModal2">Контакты<span class="glyphicon glyphicon-envelope pull-right" aria-hidden="true"></span></a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>