<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Foodies/css/header.css">
    <link rel="stylesheet" href="../Foodies/css/P_detail.css">
    <title>商品一覧</title>
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

    <div class="shohin-detail">

        <div class="carousel">
            <!-- スライドのリスト -->
            <div class="contains">
              <!-- スライドを選択するためのラジオボタンリスト。 -->
              <!-- 数は増減しても構わないです。 最初は1番目を選択状態(checked)にします。-->
              <!-- Slide各ラジオボタンに個別のidを定義して、nameはすべて同じ値にします。 -->
              <input class="slide_select" type="radio" id="SlideA" name="slide_check" checked />
              <input class="slide_select" type="radio" id="SlideB" name="slide_check" />
              <!-- スライド -->
              <!-- 上のラジオボックスと同じ数だけ記述します。-->
              <div class="slide">
                <!-- スライドの前へ、次へとスクロールさせるボタン -->
                <div class="scroll_controler">
                  <!-- 前へボタン forで戻る先のラジオボタンのidを書きます。-->
                  <!-- 先頭要素なので、最後のスライドのidである"SlideB"を書いています。 -->
                  <label class="scroll_button scroll_prev" for="SlideB"></label>
                  <!-- 次へボタン 上と同様にforで進む先のラジオボタンのidを書きます。-->
                  <!-- 進み先は2番目の要素なので、2番目のスライドのid"SlideB"を書いています。 -->
                  <label class="scroll_button scroll_next" for="SlideB"></label>
                </div>
                <!-- スライドの内容（ここでは画像）を記述します。 -->
                <!-- div要素に変えれば文字を加えることもできます。 -->
                <img src="../img/BEEgray-front.jpg" class="shohin-img">
              </div>
              <!-- スライド（2番目）内容は1個めと同じ -->
              <div class="slide">
                <div class="controler_scroll">
                  <label class="scroll_button scroll_prev" for="SlideA"></label>
                  <label class="scroll_button scroll_next" for="SlideA"></label>
                </div>
                <img src="../img/BEEgray-back.jpg" class="shohin-img">
              </div>
              <!-- スライド移動用ボタン -->
              <div class="move_controler">
                <!-- 1個目のスライドのボタン -->
                <!-- 一番上のラジオボタンの1個目のスライドのid”A”をforに定義します-->
                <label class="button_move" for="SlideA"></label>
                <label class="button_move" for="SlideB"></label>
              </div>
            </div>
        </div>

        <div class="shohin-name-money-box">
            <div class="shohin-name">
                <p>商品名</p>
            </div>

            <div class="shohin-money">
                <p>￥〇〇〇〇</p>
            </div>
        </div>
        <div class="shohin-size-number-box">
            <!--サイズ選択-->
            <div class="size-box">
                <select name="size">
                    <option>XS</option>
                    <option>S</option>
                    <option>M<option>
                    <option>L</option>
                    <option>XL<option>
                </select>
            </div>

        <div shohin-size-number-box>
            <!--サイズ選択-->
            <div class="size-box">
                <select name="size">
                    <option>XS</option>
                    <option>S</option>
                    <option>M<option>
                    <option>L</option>
                    <option>XL<option>
                </select>
            </div>

            <!--個数選択-->
            <div id="app" class="number-box">
                <button @click="decrement" class="number-button" id="button">-</button>
                <p class="number-button">{{count}}</p>
                <button @click="increment" class="number-button" id="button">+</button>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
            <script src="./script/P_detail.js"></script>
        </div>

        <div class="size-img-box">
            <img src="../img/size-kakunin.jpg" class="size-img">
        </div>

        <div class="description-text-box">
            <input type="text" placeholder="Description Of Item" class="description-text">
        </div>

        <div class="cart-button-box">
            <button type="submit" class="cart-button">Add to cart</button>
        </div>
    </div>
</body>
</html>