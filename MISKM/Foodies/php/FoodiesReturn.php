<link rel="stylesheet" href="../css/header.css">
<body>
    <header class="header">
    <?php
        // これがボタン
        if (!empty($r) && (strpos($r, $h) !== false)) :
        ?>
        <div class="post-detail-button is_prev">
            <a onclick="window.location.href='<?= $r ?>'" class="return-button">＜ return</a></div>        
        <?php endif ?>
        <!-- ヘッダーロゴ -->
        <div class="logo">Foodies</div>
    </header>
