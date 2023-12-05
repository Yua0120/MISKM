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

        <!-- spハンバーガーメニュー ↓ -->
        <div class="sp_nav">
            <div class="overlay" id="js_overlay"></div>
            <div class="hamburger" id="js_hamburger">
            <span class="hamburger_linetop"></span>
            <span class="hamburger_linecenter"></span>
            <span class="hamburger_linebottom"></span>
            </div>
            <div class="sidemenu">
            <nav>
                <ul>
                <li><a href="Top.php">トップ</a></li>
                <li><a href="">投稿</a></li>
                <li><a href="">投稿一覧</a></li>
                <li><a href="">カート</a></li>
                <li><a href="">注文履歴</a></li>
                <li><a href="">マイページ</a></li>
                <li><a href="">アカウント情報更新</a></li>
                <li><a href="">ログアウト</a></li>
                </ul>
            </nav>
            </div>
        </div>
    </header>