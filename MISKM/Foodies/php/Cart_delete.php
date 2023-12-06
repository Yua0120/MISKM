<?php session_start(); ?>
<?php require 'connect.php';?>
<?php
    $pdo = new PDO($connect, USER, PASS);
    $sql = "ALTER TABLE Cart
    DROP product_id;";/*カート内データ削除*/
  
     header("Location:./Cart.php");
     exit;
  ?>
