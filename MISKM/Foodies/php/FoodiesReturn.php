<body>
    <header class="header">
    <?php
        // これがボタン
        if (!empty($r) && (strpos($r, $h) !== false)) :
        ?>
        <div class="post-detail-button is_prev"><a href="<?= $r ?>" class="return-button">< return</a></div>
        <?php endif ?>
        </div>
        <!-- ヘッダーロゴ -->
        <div class="logo">Foodies</div>
    </header>
