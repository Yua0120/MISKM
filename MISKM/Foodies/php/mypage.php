<?php session_start() ;?>
<?php require 'header.php' ;?>
<?php require 'connect.php' ;?>
<link rel="stylesheet" href="../css/header.css">
<link rel="stylesheet" href="../css/mypage.css">
<link rel="stylesheet" href="../css/hamburger.css">
    <title>mypage</title>
</header>
<body>
<?php require 'FoodiesMenu.php'; ?>
<!--アイコンとニックネーム-->
<?php
    //ここに画像 改行はしない
    $pdo = new PDO($connect, USER, PASS);

    // ログインしている場合、セッションから user_id を取得
    $user_id = isset($_SESSION['User']['id']) ? $_SESSION['User']['id'] : '';

    $post_id = null;

    if (isset($_GET['id'])) {
        $post_id = $_GET['id'];

        // ログインユーザーの情報を取得
        $userSql = $pdo->prepare('SELECT * FROM User WHERE id = ?');
        $userSql->execute([$user_id]);
        $userInfo = $userSql->fetch(PDO::FETCH_ASSOC);

        echo '<div class="user-icon-name">';
            //アイコンは石島さんに相談
            echo '<div class="icon-img">';
            if (!empty($userInfo['icon_image_path'])) {
                // icon_image_path が空でない場合はその画像を表示
                echo '<img src="../../img/icon_img/'. $userInfo['icon_image_path'] . ' class="icon">';
            } else {
                // icon_image_path が空の場合はデフォルトの画像を表示
                echo '<img src="/MISKM/img/default_icon.jpg" class="icon">';
            }
            echo '</div>';
            echo '<div class="nickname">';
            echo $userInfo['nickname'];
            echo '</div>';
        echo '</div>';
    }
?>

<div class="toukou">
    <p class="toukou-text">My投稿</p>
</div>

<!--過去に投稿した一覧-->
<!--float使って新しいのを上にするようにする　多分leftで行けるはず-->
<?php
    $sql = $pdo->prepare('SELECT Post.*, User.nickname FROM Post INNER JOIN User ON Post.user_id = User.id WHERE Post.user_id = ?');
    $sql->execute([$user_id]);
    
    // $sql が null でないことを確認してから foreach ループを実行
    if ($sql) {
        foreach ($sql as $post) {

            $checkLikeSql = $pdo->prepare('SELECT * FROM Good WHERE user_id = ? AND post_id = ?');
            $checkLikeSql->execute([$user_id, $post_id]);
            $isFavorite = $checkLikeSql->rowCount() > 0;

            // 画像データ
            $base64ImageData = $post['image_path'];

            echo '<div class="toukou-box">';
            // 石島さんに聞く
            echo '<img src="'.$base64ImageData.'" class="shohin-img">';
            echo '<div class="toukou-box-nickname">';
            echo $post['nickname'];
            echo '</div>';
            echo '<div class="toukou-comentbox">';
            echo nl2br(htmlspecialchars($post['comment']));
            echo '</div>';

            // いいねの数を取得（Postテーブルのgood_countを使用）
            $likeCount = $post['good_count'];

            // いいね/いいね解除ボタンを表示
            echo '<div class="favorite">';
            if ($isFavorite) {
                echo '<img src="/MISKM/img/kuma.jpg" width="40" class="kuma-img">';
                echo $likeCount;
                echo '</a>';
            } else {
                echo '<img src="/MISKM/img/shirokuma.jpg" width="40" class="kuma-img">';
                echo $likeCount;
                echo '</a>';
            }
            echo '</div>';
            echo '<form action="post_delete.php" method="post" class="delete-form">';
            echo '<input type="hidden" name="id" value="' . $post['id'] . '">';
            echo '<button type="submit" class="toukou-delete">削除</button>';
            echo '</div>';
        }
    }
?>
<?php require 'footer.php' ;?>