<?php session_start(); ?>
<?php require 'header.php'?>
<?php require 'connect.php'?>
<?php require 'return.php'?>
<link rel="stylesheet" href="../css/header.css">
<link rel="stylesheet" href="../css/C_browsing.css">
<title>C_browsing</title>
<script src="../script/likeButton.js" defer></script>
</header>
<?php require 'Foodiesall.php' ?>
<body>
    <!--商品検索機能-->
    <div class="search-box">
        <form action="Top.html" method="post">
            <input type="text" name="keyword" placeholder="user name" class="search">
        </form>
    </div>

    <!--絞り込み機能-->
    <div class="narrow-box">
        <select name="narrow">
            <option value="">いいね　　順</option>
            <option>新規投稿　順</option>
            <!--ここは後々増やす-->
        </select>
    </div>

    <!--投稿一覧-->
    <div class="toukou-box">
        <img src="../../img/pa-ka-.jpg" class="shohin-img">
        <div class="toukou-box-nickname">
            <p>ニックネーム</p>
        </div>
        <div class="toukou-day">
            <p>投稿日</p>
        </div>
        <div class="toukou-comentbox">
            <input type="text" name="coment" placeholder="コメント" disabled class="toukou-coment">
        </div>        
    </div>
    <img class="like-button" src="../../img/kuroha-to.jpg" data-product-id="商品のID" alt="いいね">
</body>
</html>