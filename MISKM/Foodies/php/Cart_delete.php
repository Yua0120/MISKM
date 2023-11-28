<?php session_start(); ?>
<?php require 'connect.php';?>
<?php
  unset($_SESSION['Product'][$_GET['id']]);
  require 'Cart.php';
  echo 'カートから削除しました';
  ?>
  <button onclick="Cart.php" >カートに戻る</button>