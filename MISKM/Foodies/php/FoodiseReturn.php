<body>
    <header class="header">
        <!-- ヘッダーロゴ -->
        <div class="logo">Foodies</div>

        <?php
        // これがボタン
        if (!empty($r) && (strpos($r, $h) !== false)) :
        ?>
        <div class="post-detail-button is_prev"><a href="<?= $r ?>">< return</a></div>
        <?php endif ?>

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
            <li class="nav_item"><a href="C_browsing.php">投稿一覧</a></li>
            <li class="nav_item"><a href="">カート</a></li>
            <li class="nav_item"><a href="">注文履歴</a></li>
            <li class="nav_item"><a href="">アカウント情報</a></li>
            </ul>
        </nav>

        </div>
    </header>