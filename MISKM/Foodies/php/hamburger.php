<link rel="stylesheet" href="../css/hamburger.css">
    <title>ハンバーガーメニュー専用</title>
</head>
<!--ヘッダー↓-->
<header>
  <!-- spハンバーガーメニュー ↓ -->
  <div class="sp_nav">
    <div class="overlay" id="js_overlay"></div>
    <div class="hamburger" id="js_hamburger">
      <span class="hamburger_linetop"></span>
      <span class="hamburger_linecenter"></span>
      <span class="hamburger_linebottom"></span>
    </div>
    <div class="sidemenu">

      <?php $user_id = isset($_SESSION['User']['id']) ? $_SESSION['User']['id'] : ''; ?>

      <nav>
        <ul>
          <li><a href="login.php">ログイン</a></li>
          <li><a href="Top.php">トップ</a></li>
          <li><a href="C_post-input.php">投稿</a></li>
          <li><a href="C_browsing.php">投稿一覧</a></li>
          <li><a href="Cart.php">カート</a></li>
          <li><a href="O_his.php">注文履歴</a></li>
	      <li><a href="mypage.php?id=<?php $user_id ?>">マイページ</a></li>
	      <li><a href="U_update-input.php?id=<?php $user_id ?>">アカウント情報更新</a></li>
	      <li><a href="logout-check.php">ログアウト</a></li>
        </ul>
      </nav>
    </div>
  </div>
  <!-- spハンバーガーメニュー ↑ -->
</header>
<!--ヘッダー↑-->

<!-- ハンバーガーメニューを表示させたいときは、bodyの中にhamburger.phpを呼ぶんだ。 -->
<!-- ハンバーガーメニューを表示させたいときは、/bodyから下を消してfooter.phpを呼ぶんだ。 -->