<nav class="navbar navbar-inverse marginBottom0PX">
    <div class="container paddingTopBottom40px">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="/"><?php echo $info["title"];?><small class="hidden-xs"><?php echo $info["sub_title"];?></small></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#">&copy 2016-<?php echo date("Y")," ",$info["email"];?></a></li>
        </ul>
    </div><!-- /.container-fluid -->
</nav>