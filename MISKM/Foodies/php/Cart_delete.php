<?php session_start(); ?>
<?php
  unset($_SESSION['Cart'][$_GET['product_id']]);
  require 'cart.php';
  ?>