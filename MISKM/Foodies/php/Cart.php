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
foreach($result as $row){ 
    $id = isset($row['product_id']) ? $row['product_id'] : $row['id'];
    echo '
         <div class = "img"> 
         <img src="./img/',$row['image'],'">,
         </div>
         ';
    echo "
         <div class = name>
         {$row['name']}
         </div>
         <div class = prsi>
         size:{$row['size']}
         {$row['price']}
          <br>
         {$row['buy_counts']}
         </div>
         ";
    echo '<a href= "Cart_delete.php?id =',$id,'">削除</a>';
}
}
?>
</body>
</html>