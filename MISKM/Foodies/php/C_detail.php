<?php session_start(); ?>
<?php require 'header.php' ?>
<?php require 'connect.php' ?>
<link rel="stylesheet" href="../css/C_detail-header.css">
<link rel="stylesheet" href="../css/C_detail.css">
<link rel="stylesheet" href="../css/hamburger.css">
<title>投稿詳細</title>
</header>
<?php require 'FoodiesReturn-C_browsing.php' ?>
<?php

$pdo = new PDO($connect, USER, PASS);

$user_id = isset($_SESSION['User']['id']) ? $_SESSION['User']['id'] : '';

// このページに対するユーザーのいいねを確認
if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

        $checkLikeSql = $pdo->prepare('SELECT * FROM Good WHERE user_id = ? AND post_id = ?');
        $checkLikeSql->execute([$user_id, $post_id]);
        $isFavorite = $checkLikeSql->rowCount() > 0;
    
        // この投稿に対するいいねの数を取得
        $countLikesSql = $pdo->prepare('SELECT COUNT(*) as count FROM Good WHERE post_id = ?');
        $countLikesSql->execute([$post_id]);
        $likeCount = $countLikesSql->fetch()['count'];

    $sql = $pdo->prepare('SELECT * FROM Post WHERE id = ?');
    $sql->execute([$post_id]);

    if ($row = $sql->fetch()) {
        $id = $row['id'];
        echo '<div class="toukou-img-box">';
        echo '<img src="',$row['image_path'],'" class="toukou-img">';
        echo '</div>';
        // いいね/いいね解除ボタンを表示
        echo '<div class="favorite">';
        if ($isFavorite) {
            echo '<a href="like_out.php?id=', $post_id, '">';
            echo '<img src="/MISKM/img/kuma.jpg" width="50" class="like">';
            echo '<div class="like">';
            echo $likeCount;
            echo '</div>';
            echo '</a>';
        } else {
            echo '<a href="like_in.php?id=', $post_id, '">';
            echo '<img src="/MISKM/img/shirokuma.jpg" width="50" class="like">';
            echo '<div class="like">';
            echo $likeCount;
            echo '</div>';
            echo '</a>';
        }
        echo '</div>';
        echo '<div class="toukou-item-box">';
        echo '<p class="productname" id="item-text">';
        echo '購入商品 　: ';
        echo '</p>';
        echo '<div class="productname" id="db">';
        // Product テーブルから商品名を取得
        $productSql = $pdo->prepare('SELECT name FROM Product WHERE id = ?');
        $productSql->execute([$row['product_id']]);
        $productRow = $productSql->fetch();  
        echo $productRow ? $productRow['name'] : '商品名なし';
        echo '</div>';
        echo '<div class="productsize-box">';
        echo '<p class="productsize" id="item-text">';
        echo '購入サイズ : ';
        echo '</p>';
        echo '<div class="productsize" id="db">';
        echo $row['product_size'];
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<p class="comment-text">';
        echo 'coment';
        echo '</p>';
        echo '<div class="comment-box">';
        echo nl2br(htmlspecialchars($row['comment']));
        echo '</div>';
    }
}
?>
<?php require 'footer.php' ;?>
