import VueStar from 'vue-star'

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Foodies/css/header.css">
    <link rel="stylesheet" href="../Foodies/css/C_browsing.css">
    <title>投稿一覧</title>
</head>
<body>
    <header class="header">
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
            <li class="nav_item"><a href="">トップ</a></li>
            <li class="nav_item"><a href="">投稿</a></li>
            <li class="nav_item"><a href="">カート</a></li>
            <li class="nav_item"><a href="">注文履歴</a></li>
            <li class="nav_item"><a href="">アカウント情報</a></li>
            </ul>
        </nav>

        </div>
    </header>

    <!--商品検索機能-->
    <div class="search-box">
        <form action="Top.html" method="post">
            <input type="text" name="keyword" placeholder="user name" class="search">
        </form>
    </div>

    <!--絞り込み機能-->
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
        <img src="../img/pa-ka-.jpg" class="shohin-img">
        <div class="toukou-box-nickname">
            <p>ニックネーム</p>
        </div>
        <div class="toukou-day">
            <p>投稿日</p>
        </div>
        <div class="toukou-comentbox">
            <input type="text" name="coment" placeholder="コメント" disabled class="toukou-coment">
        </div>
        <!--いいね機能-->
        <div class="like-box">
            <div class="box unlike">
                <img src="../img/kuroha-to.jpg">
            </div>
            <div class="box like hidden">
                <img src="../img/pinkuha-to.jpg">
            </div>
          </div>
        <p>0</p>
        <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
        <script src="./script/C_browsing.js"></script>
    </div>
</body>
</html>