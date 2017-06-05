<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
session_start();
if (!isset($_SESSION['counter'])) $_SESSION['counter']=0;
echo "Ok ".$_SESSION['counter']++." once. ";
echo "<br><a href=".$_SERVER['PHP_SELF'].">update";