<body>
<link rel="stylesheet" href="../css/header.css">
    <header class="header">
    <?php
        // これがボタン
        if (!empty($r) && (strpos($r, $h) !== false)) :
        ?>
        <div class="post-detail-button is_prev"><a href="<?= $r ?>" class="return-button">< return</a></div>
        <?php endif ?>
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
            <li class="nav_item"><a href="Top.php">トップ</a></li>
            <li class="nav_item"><a href="">投稿</a></li>
            <li class="nav_item"><a href="C_browsing.php">投稿一覧</a></li>
            <li class="nav_item"><a href="">カート</a></li>
            <li class="nav_item"><a href="">注文履歴</a></li>
            <li class="nav_item"><a href="">アカウント情報</a></li>
            </ul>
        </nav>

        </div>
    </header>