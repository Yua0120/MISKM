<?php require 'H_heder.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <link rel="stylesheet" href="../css/Cart.css">
    <title>カート</title>
</head>
<body>
    <div id="app">
    <form action="">
        <div class="main">
        <p>
        <img src="" alt=""><!--商品の画像-->
        商品名<br>
        金額
        サイズ<br>
        </p>
        <p>
        <button @click="decrement" class="bto2">-</button>
        {{num}}
        <button @click="increment" class="bto2">+</button>
        </p>
        <p class="kei">小計 2個 (税込):〇〇〇〇円</p>
        </div>
        <button type="submit" class="bto">ご購入手続きへ</button>
    </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="./script/Cart.js"></script>
</html>