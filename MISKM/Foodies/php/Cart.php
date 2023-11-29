<?php session_start();?>
<?php require 'connect.php';?>
<?php require 'header.php';?>
    <link rel="stylesheet" href="../css/Cart.css">
    <title>カート画面</title>
</head>
<?php require 'FoodiesMenu.php';?>
<?php
/*データベース接続*/
if(!isset($_SESSION['User'])){
    $pdo = new PDO($connect,USER,PASS);
    $sql = "select Product.id,Product.name,Product.size,Product.price,Product.image,Cart.buy_counts
            FROM Cart
            JOIN Product ON Cart.product_id = Product.id";
    $stmt = $pdo->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
/*商品一覧*/
    echo '<div class= "ALL">';
foreach($result as $row){ 
    $id = $row['id'];
    echo '<div class="display">';
    echo '<div class="cart_img">';
    echo '<img src="/MISKM/img/',$row['image'],'>';
    echo '</div>';
    echo '<div class = "item">';  
    echo '<div class="item_name"';   
    echo $row['name'];
    echo '</div>';
    echo '<div class="item_size>"';
    echo 'size:',$row['size'];
    echo '</div>';
    echo '<div class="item_price>"';
    echo '￥',$row['price'],'JPY<br>';
    echo '</div>';
    echo '<div class="item_count">';
    echo $row['buy_counts'];
    echo '</div>';
    echo '</div>';     
    echo '<a href="Cart_delete.php?id =',$id,'">削除</a>';
    echo '<p id="line">-</p>';
    echo '</div>';
} 
    echo '</div>';
}
?>
</body>
</html>