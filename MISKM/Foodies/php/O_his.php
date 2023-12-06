<?php session_start();?>
<?php require 'header.php';?>
<?php require 'connect.php';?>
<link rel="stylesheet" href="../css/O_his.css">
<title>注文履歴</title>
</head>
<?php require 'FoodiesMenu.php';?>
<h3 class="title">注文履歴</h3>
<?php
/* データベース接続 */
if (!isset($_SESSION['User'])) {
    $pdo = new PDO($connect, USER, PASS);
    $sql = "SELECT History.date, Product.name, Product.image, History_detail.product_id
            FROM History
            JOIN History_detail ON History.id = History_detail.history_id
            JOIN Product ON History_detail.product_id = Product.id";
    $stmt = $pdo->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    /* 商品一覧 */
    foreach ($result as $row) {
        $product_id = $row['product_id']; // $product_id をここで定義する
        echo '<div class="main">';
        echo '<figure class="image">';
        echo '<img src="/MISKM/img/', $row['image'], '" class="his_img">';
        echo '</figure>';
        echo '<div class="item">';
        echo "<p>{$row['date']} <a href='P_detail-input.php?id={$product_id}'><br>{$row['name']}</a></p>";
        echo "<br>";
        echo '</div>'; // .item divを閉じる
        echo '</div>'; // .main divを閉じる
    }
}
?>
</div>
</body>
</html>
