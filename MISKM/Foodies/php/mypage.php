<?php session_start() ;?>
<?php require 'header.php' ;?>
<?php require 'connect.php' ;?>
<?php require 'return.php'?>
<link rel="stylesheet" href="../css/template.css">
<link rel="stylesheet" href="../css/header.css">
<link rel="stylesheet" href="../css/mypage.css">
    <title>mypage</title>
</header>
<?php require 'FoodiesAll.php' ;?>
<!--アイコンとニックネーム-->
<?php
    //ここに画像 改行はしない
    $pdo = new PDO($connect, USER, PASS);

    // ログインしている場合、セッションから user_id を取得
    //$user_id = isset($_SESSION['customer']) ? $_SESSION['customer']['id'] : '';
    $user_id = 4;

    $sql = $pdo->prepare('SELECT * FROM User WHERE id=?');
    $sql->execute([$user_id]);

    foreach ($sql as $row){
        //$id = isset($row['id']) ? $row['id'] : ''; 
        //アイコンは石島さんに相談
        echo '<img src="../img/icon.png" class="icon-img">';
        echo '<div class="nickname">';
        echo $row['nickname'];
        echo '</div>';
    };
?>

<div class="toukou">
    <p>My投稿</p>
</div>

<!--過去に投稿した一覧-->
<!--float使って新しいのを上にするようにする　多分leftで行けるはず-->
<?php
    $sql = $pdo->prepare('SELECT Post.*, User.nickname FROM Post INNER JOIN User ON Post.user_id = User.id WHERE Post.user_id = ?');
    $sql->execute([$user_id]);

    foreach ($sql as $post) {

        //画像データ
        $base64ImageData = $post['image_path'];

        echo '<div class="toukou-box">';
        //石島さんに聞く
        echo '<img src="'.$base64ImageData.'" class="shohin-img">';
        echo '<div class="toukou-box-nickname">';
        echo $post['nickname'];
        echo '</div>';
        echo '<div class="toukou-comentbox">';
        echo '<input type="text" name="comment" value="' . htmlspecialchars($post['comment']) . '" disabled class="toukou-coment">';
        echo '</div>';
        echo '<form action="post_delete.php" method="post" class="delete-form">';
        echo '<input type="hidden" name="id" value="' . $post['id'] . '">';
        echo '<button type="submit" class="toukou-delete">削除</button>';
        echo '</div>';
    }
?>
</html>