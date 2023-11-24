<?php session_start();?>
<?php require 'header.php';?>
<?php
$id=$_POST['id'];
if(!isset($_SESSION['User'])){
    $pdo = new PDO($connect,USER,PASS);
    $sql = "select Product_image,Product.naem,Product.size,Product.price,Cart.count
            FROM Cart
            JOIN Product ON Cart.product_id = Product.id";
    $stmt = $pdo->query($sql);

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $row){ 
    echo '{$row['name']},sizee:{$row['size']},{row['price']},{$row['buy_count']}';
}
?>