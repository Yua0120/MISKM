<?php session_start(); ?>
<?php require 'header.php' ?>
<?php require 'connect.php' ?>
<link rel="stylesheet" href="../css/header.css">
<link rel="stylesheet" href="../css/C_detail.css">
<title>投稿詳細</title>
</header>
<?php require 'FoodiesReturn.php' ?>
<?php
$pdo = new PDO($connect, USER, PASS);

if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    $sql = $pdo->prepare('SELECT * FROM Post WHERE id = ?');
    $sql->execute([$post_id]);

    if ($row = $sql->fetch()) {
        $id = $row['id'];
        echo '<div class="toukouimg-box">';
        echo '<img src="',$row['image_path'],'">';
        echo '</div>';
        echo '<div class="toukuoitem-box">';
        echo '<p class="productname">';
        echo '購入商品';
        echo '</p>';
        echo '<div class="productname">';
        // Product テーブルから商品名を取得
        $productSql = $pdo->prepare('SELECT name FROM Product WHERE id = ?');
        $productSql->execute([$row['product_id']]);
        $productRow = $productSql->fetch();  
        echo $productRow ? $productRow['name'] : '商品名なし';
        echo '</div>';
        echo '<p class="productsize">';
        echo '購入サイズ';
        echo '</p>';
        echo '<div class="productdsize">';
        echo $row['product_size'];
        echo '</div>';
        /*いいね*/
        echo '</div>';
        echo '<p class="comment-area">';
        echo 'coment';
        echo '</p>';
        echo '<div class="comment-box">';
        echo nl2br(htmlspecialchars($row['comment']));
        echo '</div>';
    }
}
?>
</html>
