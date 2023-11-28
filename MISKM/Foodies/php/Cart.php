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
    $sql = "select Product.id,Product.name,Product.size,Product.price,Product.image,Cart.buy_counts
            FROM Cart
            JOIN Product ON Cart.product_id = Product.id";
    $stmt = $pdo->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo '<div class= "ALL">';
foreach($result as $row){ 
    $id = $row['id'];

    echo '
         <div class = "img"> 
         <img src="/MISKM/img/',$row['image'],'">,
         </div>
         ';
    echo '<div class = "item">';     
    echo "
         <p id='name'>{$row['name']}</p>
         <p id = 'item'>
         size:{$row['size']}
         {$row['price']}
          <br>
         {$row['buy_counts']}
         </p>";
    echo '</div>';     
    echo '<a href="Cart_delete.php?id =',$id,'">削除</a>';
} 
    echo '</div>';
}
?>
</body>
</html>