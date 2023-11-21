<?php
    require 'H_header.php';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Foodies/css/mypage.css">
    <title>マイページ</title>
</head>
<body>
    <body>
        <header class="header">
            <!-- ヘッダーロゴ -->
            <div class="logo">Foodies</div>
            <!-- ハンバーガーメニュー部分 -->
            <div class="nav">
            <!-- ハンバーガーメニューの表示・非表示を切り替えるチェックボックス -->
            <input id="drawer_input" class="drawer_hidden" type="checkbox">
            <!-- ハンバーガーアイコン -->
            <label for="drawer_input" class="drawer_open"><span></span></label>
        
            <!-- メニュー -->
            <nav class="nav_content">
                <ul class="nav_list">
                <li class="nav_item"><a href="">トップ</a></li>
                <li class="nav_item"><a href="">投稿</a></li>
                <li class="nav_item"><a href="">カート</a></li>
                <li class="nav_item"><a href="">注文履歴</a></li>
                <li class="nav_item"><a href="">アカウント情報</a></li>
                </ul>
            </nav>
    
            </div>
        </header>

    <!--ここに画像 改行はしない-->
    <img src="../img/icon.png" class="icon-img">
    <div class="nickname">
        <p>ニックネーム</p>
    </div>

    <div class="toukou">
        <p>My投稿</p>
    </div>

    <!--投稿一覧-->
    <div class="toukou-box">
        <img src="../img/pa-ka-.jpg" class="shohin-img">
            <div class="toukou-box-nickname">
                <p>ニックネーム</p>
            </div>
            <div class="toukou-day">
                <p>投稿日</p>
            </div>
            <div class="toukou-comentbox">
                <input type="text" name="coment" value="コメント" disabled class="toukou-coment">
            </div>
        <button type="button" class="toukou-delete">削除</button>
    </div>
</body>
</html>