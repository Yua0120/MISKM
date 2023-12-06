<?php session_start(); ?>
<?php require 'connect.php';?>
<?php
  unset($_SESSION['Cart']['product_id'], $_GET['id']);
  header("Location:./Cart.php");
  exit;
  ?>
