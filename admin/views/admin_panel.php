<div class="container">
    <div class="page-header">
        <h1>Администратор <small id="emailUser"><?php echo $admin["info"]["email"];?></small></h1>
    </div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
            </a>
        </li>
        <li role="presentation">
            <a href="#validation" aria-controls="validation" role="tab" data-toggle="tab">
                <span class="glyphicon glyphicon-filter" aria-hidden="true"></span>
            </a>
        </li>
        <li role="presentation">
            <a href="#item" aria-controls="item" role="tab" data-toggle="tab">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </a>
        </li>
        <li role="presentation">
            <a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <?php require_once 'views/admin_tabs/admin_home_tab.php';?>
        <?php require_once 'views/admin_tabs/admin_validation_tab.php';?>
        <?php require_once 'views/admin_tabs/admin_item_tab.php';?>
        <?php require_once 'views/admin_tabs/admin_settings_tab.php';?>
    </div>
</div>
<script defer src="admin.js"></script>

