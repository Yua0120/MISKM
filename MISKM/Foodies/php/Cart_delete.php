<?php session_start(); ?>
<?php require 'connect.php';?>
<?php
    /*$pdo = new PDO($connect, USER, PASS);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
    $sql = "DELETE FROM Cart
           WHERE product_id = '$row['product_id']';
           ";/*カート内データ削除*/
   /* }
     header("Location:./Cart.php");
     exit;

     <?php*/

     $pdo = new PDO($connect, USER, PASS);

     if (isset($_SESSION['User'])) {
      var_dump("333333");
     $user_id = $_SESSION['User']['id'];

     var_dump($_GET['id']);
     if (isset($_GET['id'])) {
      var_dump("44444");
        $product_id = $_GET['id'];

        $deleteSql = "DELETE FROM Cart WHERE user_id = ? AND product_id = ?";
        $deleteStmt = $pdo->prepare($deleteSql);
        $deleteStmt->execute([$user_id, $product_id]);
       } 
       /*header("Location: ./Cart.php");
       exit;*/
     }
?>
