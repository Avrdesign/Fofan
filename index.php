<?php require_once 'admin/api/api.php' ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $info["title"];?></title>
    <link rel="icon" href="<?php echo IMAGES_PATH.$info["icon"];?>">
    <!-- Bootstrap -->
    <link href="https://fonts.googleapis.com/css?family=Alice" rel="stylesheet">
    <link href="src/css/bootstrap.min.css" rel="stylesheet">
    <link href="src/css/main.css" rel="stylesheet">

      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  <?php require 'admin/views/header.php';?>

  <div class="container-fluid marginTop70PX">
      <div class="row">
          <div class="col-sm-offset-1 col-sm-3 positionFixed hidden-xs">
              <?php require 'admin/views/left_menu.php' ?>
          </div>
          <div class="col-sm-offset-8 col-sm-3 positionFixed hidden-xs">
              <?php require 'admin/views/right_menu.php' ?>
          </div>
      </div>
  </div>


  <div class="container-fluid ">
      <div class="row">
          <div id="content_items" class="col-sm-offset-4 col-sm-4">
              <?php require 'admin/views/content.php' ?>
          </div>
      </div>
  </div>

  <?php require 'admin/views/add_item.php' ?>
  <?php require 'admin/views/send_message.php' ?>
  <?php require "admin/views/footer.php";?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script defer src="src/js/bootstrap.min.js"></script>
    <script defer src="src/js/main.js"></script>
  </body>
</html>