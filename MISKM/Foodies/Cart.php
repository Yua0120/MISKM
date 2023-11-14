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
    <?php
       echo '<div id="app">';
       echo '<form action="O_pro.php">';
       echo '<div class="main">';
       echo '<p>';
       echo '<img alt="image" src="../img/',$row['id'],'.jpg">'/*商品の画像*/
       echo  $row['name'],'<br>';/*商品名*/
       echo  $row['prie']; /*金額*/
       echo  $row['size'],'<br>';/*サイズ*/
       echo '</p>';
       echo '<p>';
       echo '<button @click="decrement" class="bto2">-</button>';
       echo '{{num}}';
       echo '<button @click="increment" class="bto2">+</button>';
       echo '</p>';
       echo '<p class="kei">小計 2個 (税込):〇〇〇〇円</p>';
       echo '</div>'
       echo '<button type="submit" class="bto">ご購入手続きへ</button>'
       echo '</form>'
       echo '</div>'
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="./script/Cart.js"></script>
</html>