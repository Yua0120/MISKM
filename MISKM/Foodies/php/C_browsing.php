<?php session_start(); ?>
<?php require 'header.php' ?>
<?php require 'connect.php' ?>
<link rel="stylesheet" href="../css/C_browsing.css">
<link rel="stylesheet" href="../css/hamburger.css">

<title>投稿一覧</title>
</head>
<body>
<?php require 'FoodiesMenu.php';?>
    <!-- 投稿検索機能 -->
    <form action="C_browsing.php" method="post" class="search-form-003">
            <label>
                <input type="text" name="keyword" placeholder="user name" class="search">
            </label>
            <button type="submit" aria-label="検索"></button>
    </form>

    <!-- 絞り込み機能 -->
    <div class="narrow-box">
        <form action="C_browsing.php" method="post">
            <select name="postFilter" id="postFilter">
                <option value="new">新規　順</option>
                <option value="old">古い　順</option>
                <option value="good_desc">いいね順</option>
            </select>
            <input type="submit" value="並び替える" id="like">
        </form>
    </div>

    <!-- 投稿一覧 -->
    <?php

    $pdo = new PDO($connect, USER, PASS);

    $user_id = isset($_SESSION['User']['id']) ? $_SESSION['User']['id'] : '';

    // ニックネーム検索と並び順の変更の判定
if (isset($_POST['keyword']) && !empty($_POST['keyword'])) {
    $keyword = '%' . $_POST['keyword'] . '%';
    $userSql = $pdo->prepare('SELECT * FROM User WHERE nickname LIKE :keyword');
    $userSql->bindParam(':keyword', $keyword, PDO::PARAM_STR);
    $userSql->execute();
    $matchedUsers = $userSql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($matchedUsers as $user) {
        $order = getOrderOption(isset($_POST['postFilter']) ? $_POST['postFilter'] : 'new');
        $postSql = $pdo->prepare("SELECT Post.*, User.nickname, Post.good_count
                                    FROM Post 
                                    INNER JOIN User ON Post.user_id = User.id 
                                    WHERE Post.user_id = ? 
                                    GROUP BY Post.id
                                    ORDER BY $order");
        $postSql->execute([$user['id']]);
        $filteredPosts = $postSql->fetchAll(PDO::FETCH_ASSOC);

        // $filteredPosts が null でないことを確認してから foreach ループ
        if ($filteredPosts) {
            // 投稿を表示
            foreach ($filteredPosts as $post) {
                echo '<div class="toukou-box">';
                echo '<div class="toukou-img-box">';
                echo '<a href="C_detail.php?id=' . $post['id'] . '">';
                echo '<img src="',$post['image_path'],'" class="toukou-img">';
                echo '</a>';
                echo '</div>';
                echo '<div class="nickname">';
                echo $post['nickname'];
                echo '</div>';
                echo '<div class="comentbox">';
                echo '<input type="text" name="comment" value="' . htmlspecialchars($post['comment']) . '" disabled class="coment">';
                echo '</div>';
                echo '<div class="like-count">';

                // ログインユーザーのいいね情報を取得
                $checkLikeSql = $pdo->prepare('SELECT * FROM Good WHERE user_id = ? AND post_id = ?');
                $checkLikeSql->execute([$_SESSION['User']['id'], $post['id']]);
                $isLiked = $checkLikeSql->rowCount() > 0;

                // いいねがある場合、いいね画像を表示
                if ($isLiked) {
                    echo '<img src="/MISKM/img/kuma.jpg" width="30" alt="いいね画像">';
                } else {
                    echo '<img src="/MISKM/img/shirokuma.jpg" width="30" alt="いいね画像">';
                }

                echo $post['good_count'];
                echo '</div>';
                echo '</div>';
            }
        }
    }
} else {
// ニックネーム検索がない場合は全投稿を表示
$order = getOrderOption(isset($_POST['postFilter']) ? $_POST['postFilter'] : '');
$postSql = $pdo->prepare("SELECT Post.*, User.nickname, Post.good_count
                            FROM Post 
                            INNER JOIN User ON Post.user_id = User.id 
                            GROUP BY Post.id
                            ORDER BY $order");
$postSql->execute();

$allPosts = $postSql->fetchAll(PDO::FETCH_ASSOC);

    // 投稿を表示
    if ($allPosts) {
        // 投稿を表示
        foreach ($allPosts as $post) {
            echo '<div class="toukou-box">';
            echo '<div class="toukou-img-box">';
            echo '<a href="C_detail.php?id=' . $post['id'] . '">';
            echo '<img src="'. $post['image_path'] . '" class="toukou-img">';
            echo '</a>';
            echo '</div>';
            echo '<div class="nickname">';
            echo $post['nickname'];
            echo '</div>';
            echo '<div class="comentbox">';
            echo '<input type="text" name="comment" value="' . htmlspecialchars($post['comment']) . '" disabled class="coment">';
            echo '</div>';
            echo '<div class="like-count">';

            // ログインユーザーのいいね情報を取得
            $checkLikeSql = $pdo->prepare('SELECT * FROM Good WHERE user_id = ? AND post_id = ?');
            $checkLikeSql->execute([$_SESSION['User']['id'], $post['id']]);
            $isLiked = $checkLikeSql->rowCount() > 0;

            // いいねがある場合、いいね画像を表示
            if ($isLiked) {
                echo '<img src="/MISKM/img/kuma.jpg" width="30" alt="いいね画像">';
            } else {
                echo '<img src="/MISKM/img/shirokuma.jpg" width="30" alt="いいね画像">';
            }

            echo $post['good_count'];
            echo '</div>';
            echo '</div>';
        }
    }
}

// 並び替え
function getOrderOption($filter)
{
    switch ($filter) {
        case 'new':
            return 'Post.id DESC';
        case 'old':
            return 'Post.id ASC';
        case 'good_desc':
            return 'good_count DESC, Post.id DESC';
        default:
            return 'Post.id DESC';
    }
}
?>
<?php require 'footer.php' ;?>