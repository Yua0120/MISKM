<?php session_start(); ?>
<?php require 'connect.php';?>
<?php
  if(isset($_SESSION['User'])){
    $pdo = new PDO($connect,USER,PASS);
  $sql = $pdo->prepare('delete from Cart where user_id=? and product_id=?');
  $sql->execute([$_SESSION['Cart']['product_id'], $_POST['user_id']]);
  }
  ?>
