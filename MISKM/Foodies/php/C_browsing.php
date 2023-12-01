<?php
session_start();
require 'header.php';
require 'connect.php';
require 'return.php';
require 'FoodiesAll.php';
?>

<link rel="stylesheet" href="../css/template.css">
<link rel="stylesheet" href="../css/header.css">
<link rel="stylesheet" href="../css/C_browsing.css">

<title>投稿一覧</title>
</header>

<body>
    <!--投稿検索機能-->
    <div class="search-box">
        <form action="C_browsing.php" method="post">
            <input type="text" name="keyword" placeholder="user name" class="search">
        </form>
    </div>

    <!--絞り込み機能-->
    <div class="narrow-box">
        <form action="C_browsing.php" method="post">
            <label for="postFilter">並び替え：</label>
            <select name="postFilter" id="postFilter">
                <option value="new">新規　順</option>
                <option value="old">古い　順</option>
                <option value="good_desc">いいね順</option>
            </select>
            <input type="submit" value="並び変える">
        </form>
    </div>

    <!--投稿一覧-->
    <?php
    $pdo = new PDO($connect, USER, PASS);

    // ニックネーム検索と並び順の変更の判定
    if (isset($_POST['keyword']) && !empty($_POST['keyword'])) {
        $keyword = '%' . $_POST['keyword'] . '%';
        $userSql = $pdo->prepare('SELECT * FROM User WHERE nickname LIKE ?');
        $userSql->execute([$keyword]);
        $matchedUsers = $userSql->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($matchedUsers as $user) {
            $userId = $user['id'];
            $order = getOrderOption($_POST['postFilter']);
            $postSql = $pdo->prepare("SELECT Post.*, User.nickname FROM Post INNER JOIN User ON Post.user_id = User.id WHERE Post.user_id = ? ORDER BY $order");
            $postSql->execute([$userId]);
            $filteredPosts = $postSql->fetchAll(PDO::FETCH_ASSOC);
    
            // $filteredPosts が null でないことを確認してから foreach ループ
            if ($filteredPosts) {
                // 投稿を表示
                foreach ($filteredPosts as $post) {
                    echo '<div class="toukou-box">';
                    echo '<a href="C_detail.php?id=' . $post['id'] . '">';
                    echo '<img src="' . $post['image_path'] . '" class="shohin-img">';
                    echo '</a>';
                    echo '<div class="nickname">';
                    echo $post['nickname'];
                    echo '</div>';
                    echo '<div class="comentbox">';
                    echo '<input type="text" name="comment" value="' . htmlspecialchars($post['comment']) . '" disabled class="coment">';
                    echo '</div>';
                    echo '</div>';
                    echo '<img class="like-button" src="../../img/kuroha-to.jpg" data-product-id="商品のID" alt="いいね">';
                }
            }
        }
    } else {
        // ニックネーム検索がない場合は全投稿を表示
        $order = getOrderOption(isset($_POST['postFilter']) ? $_POST['postFilter'] : '');
        $postSql = $pdo->prepare("SELECT Post.*, User.nickname FROM Post INNER JOIN User ON Post.user_id = User.id ORDER BY $order");
        $postSql->execute(); // executeを追加
        $allPosts = $postSql->fetchAll(PDO::FETCH_ASSOC);

        // 投稿を表示
        if ($allPosts) {
            // 投稿を表示
            foreach ($allPosts as $post) {
                echo '<div class="toukou-box">';
                echo '<a href="C_detail.php?id=' . $post['id'] . '">';
                echo '<img src="' . $post['image_path'] . '" class="shohin-img">';
                echo '</a>';
                echo '<div class="nickname">';
                echo $post['nickname'];
                echo '</div>';
                echo '<div class="comentbox">';
                echo '<input type="text" name="comment" value="' . htmlspecialchars($post['comment']) . '" disabled class="coment">';
                echo '</div>';
                echo '</div>';
                echo '<img class="like-button" src="../../img/kuroha-to.jpg" data-product-id="商品のID" alt="いいね">';
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
                return 'Post.good_count DESC, Post.id DESC';
            default:
                return 'Post.id DESC';
        }
    }
    ?>
</body>
</html>
