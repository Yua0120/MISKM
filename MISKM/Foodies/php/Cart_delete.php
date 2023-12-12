<?php session_start(); ?>
<?php require 'connect.php';?>
<?php
     $pdo = new PDO($connect, USER, PASS);

     if (isset($_SESSION['User'])) {
          $user_id = $_SESSION['User']['id'];
          if (isset($_GET['id'])) {
               $product_id = $_GET['id'];

               $deleteSql = "DELETE FROM Cart WHERE user_id = ? AND product_id = ?";
               $deleteStmt = $pdo->prepare($deleteSql);
               $deleteStmt->execute([$user_id, $product_id]);

               require 'Cart.php';
          } 
     }
?>
