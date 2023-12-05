<body>
<link rel="stylesheet" href="../css/header.css">
    <header class="header">
        <div class="post-detail-button is_prev"><a id="return-button" href="C_browsing.php">＜ return</a></div>
        <!-- ヘッダーロゴ -->
        <div class="logo">Foodies</div>
        <!-- ハンバーガーメニュー部分 -->
        <div class="nav">
        <!-- ハンバーガーメニューの表示・非表示を切り替えるチェックボックス -->
        <input id="drawer_input" class="drawer_hidden" type="checkbox">
        <!-- ハンバーガーアイコン -->
        <label for="drawer_input" class="drawer_open"><span></span></label>

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
    </header>