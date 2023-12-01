<body>
    <header class="header">
    <?php
        // これがボタン
        if (!empty($r) && (strpos($r, $h) !== false)) :
        ?>
        <div class="post-detail-button is_prev"><a id="return-button" href="<?= $r ?>">< return</a></div>
        <?php endif ?>
        <!-- ヘッダーロゴ -->
        <div class="logo">Foodies</div>
    </header>
