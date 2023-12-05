<body>
<link rel="stylesheet" href="../css/header.css">
    <header class="header">
        <div class="post-detail-button is_prev"><a id="return-button" href="javascript:history.back();">＜ return</a></div>
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
            <?php $user_id = isset($_SESSION['User']['id']) ? $_SESSION['User']['id'] : '';?>

            <!-- メニュー -->
            <nav class="nav_content">
                <ul class="nav_list">
                <li class="nav_item"><a href="Top.php">トップ</a></li>
                <li class="nav_item"><a href="C_browsing.php">投稿一覧</a></li>
                <li class="nav_item"><a href="">カート</a></li>
                <li class="nav_item"><a href="">注文履歴</a></li>
                <li class="nav_item"><a href="mypage.php?id=<?php $user_id ?>">マイページ</a></li>
                </ul>
            </nav>
            </div>
        </div>
    </header>