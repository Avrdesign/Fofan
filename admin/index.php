<?php
session_start();
require_once 'api/utils.php' ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../src/images/icon.png">

    <title>Администратор</title>

    <!-- Bootstrap core CSS -->
    <link href="../src/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../src/css/admin.css" rel="stylesheet">
    <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script defer src="../src/js/bootstrap.min.js"></script>

  </head>

  <body>
  <?php
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (isset($_SESSION["email"],$_SESSION["password"])){
        $email = $_SESSION["email"];
        $password = $_SESSION["password"];
    }

    if( isset($email,$password)){
        $access = validateUser($email,$password);
        if ($access["status"]){
            $admin = initAdmin();
            $_SESSION["email"] = $email;
            $_SESSION["password"] = $password;
            require_once 'views/admin_panel.php';
        }else{
            require_once 'views/admin_form.php';
        }
    }else {
        require_once 'views/admin_form.php';
    }
  ?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

  </body>
</html>
