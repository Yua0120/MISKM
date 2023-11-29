<?php session_start() ;?>
<?php require 'header.php' ;?>
<?php require 'connect.php' ;?>
<link rel="stylesheet" href="../css/template.css">
<link rel="stylesheet" href="../css/header.css">
<link rel="stylesheet" href="../css/mypage.css">
    <title>mypage</title>
</head>
<?php require 'FoodiesAll' ;?>
<!--アイコンとニックネーム-->
<?php
    //ここに画像 改行はしない
    $pdo = new PDO($connect, USER, PASS);

    //セッションからuser_idを取得する
    $user_id = $_SESSION['id'];

    $sql = $pdo->prepare('SELECT * FROM User WHERE id=?');
    $sql->execute([$user_id]);

    foreach ($sql as $row){
        $id = $row['id'];
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
    $sql = $pdo->prepare('SELECT * FROM Post WHERE user_id=?');
    $sql->execute([$user_id]);

    echo '<div class="toukou-box">';
    //石島さんに聞く
    echo '<img src="../img/pa-ka-.jpg" class="shohin-img">';
    echo '<div class="toukou-box-nickname">';
    echo $row[$nickname];
    echo '</div>';
    echo '<div class="toukou-comentbox">';
    echo '<input type="text" name="comment" value="' . htmlspecialchars($post['comment']) . '" disabled class="toukou-coment">';
    echo '</div>';
    echo '<button type="button" class="toukou-delete">削除</button>';
    echo '</div>';
?>
</html>