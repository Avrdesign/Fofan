<?php require_once 'admin/api/api.php' ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>For-Fun</title>

    <!-- Bootstrap -->
    <link href="https://fonts.googleapis.com/css?family=Alice" rel="stylesheet">
    <link href="src/css/bootstrap.min.css" rel="stylesheet">
      <style>
          html,body{
              font-family: 'Alice', serif;
          }
          .marginTop70PX{margin-top: 70px;}
          .backgroundColorBlack {background-color: #101010;}
          .colorWhite{color:white;}
          .colorLightGray{color:#9d9d9d;}
          .list-group-item.active, .list-group-item.active:focus, .list-group-item.active:hover{
              z-index: 2;
              color: #fff;
              background-color: #101010;
              border-color: #101010;
          }
          .list-group-item.active>.badge, .nav-pills>.active>a>.badge {
              color: #101010;
              background-color: #fff;
          }
          .btn-darck{
              color: #9d9d9d;
              background-color: #101010;
              border-color: #101010;
          }
          .btn-darck:hover{
              color: #fff;
              background-color: #101010;
              border-color: #101010;
          }
          .btn-darck:focus{
              color: #fff;
          }
          .paddingLeftRight3PX{padding-left: 3px;padding-right: 3px;}
          .fontSize16PX{font-size: 16px;}
          .vkLike:hover{color:white;cursor: pointer;}
          .positionFixed{
              position: fixed;
          }
          .width25PER{width: 25%;}
          .width18PER{width: 20%;}

          .marginBottom20PX{
              margin-bottom: 20px;
          }
          .paddingTopBottom40px{
              padding-top: 40px;
              padding-bottom: 40px;
          }
          .marginBottom0PX{
              margin-bottom: 0px;
          }
      </style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  <?php require 'admin/views/header.php';?>

  <div class="container marginTop70PX">
      <div class="row">
          <div class="col-sm-4 hidden-xs">
              <?php require 'admin/views/left_menu.php' ?>
          </div>
          <div class="col-sm-5">
              <?php require 'admin/views/content.php' ?>
          </div>
          <div class="col-sm-3 hidden-xs">
              <?php require 'admin/views/right_menu.php' ?>
          </div>
      </div>
  </div>

  <?php require 'admin/views/add_item.php' ?>
  <?php require 'admin/views/send_message.php' ?>
  <?php require "admin/views/footer.php";?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="src/js/bootstrap.min.js"></script>
  </body>
</html>