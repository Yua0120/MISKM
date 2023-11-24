<?php session_start();?>
<?php require 'connect.php';?>
<?php require 'header.php';?>
    <link rel="stylesheet" href="../css/Cart.css">
    <title>カート画面</title>
</head>
<?php require 'FoodiesMenu.php';?>
<?php

if(!isset($_SESSION['User'])){
    $pdo = new PDO($connect,USER,PASS);
    $sql = "select Product.name,Product.size,Product.price,Cart.buy_counts
            FROM Cart
            JOIN Product ON Cart.product_id = Product.id";
    $stmt = $pdo->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $row){ 
    echo "{$row['name']},size:{$row['size']},{$row['price']},{$row['buy_counts']}";
}
}
?>
</body>
</html>