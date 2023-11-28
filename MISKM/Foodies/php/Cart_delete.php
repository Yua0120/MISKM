<?php session_start(); ?>
<?php require 'connect.php';?>
<?php
  unset($_SESSION['Cart'][$_GET['product_id']]);
  require 'cart.php';
  echo 'カートから削除しました'
  ?>
  <button onclick="Cart.php" >カートに戻る</button>