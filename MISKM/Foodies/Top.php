<?php require 'header.php';?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Foodies/css/header.css">
    <link rel="stylesheet" href="../Foodies/css/top.css">
    <title>商品一覧</title>
</head>
<body>
    

    <!--商品検索機能-->
    <div class="search-box">
        <form action="Top.html" method="post">
            <input type="text" name="keyword" placeholder="search" class="search">
        </form>
    </div>

    <!--絞り込み機能-->
    <div class="narrow-box">
        <select name="narrow">
            <option value="">絞り込む</option>
            <option>金額： 6000円以内</option>
            <option>金額：10000円以内<option>
            <!--ここは後々増やす-->
        </select>
    </div>

    <!--タイムセール-->
    <div class="time-sale-box">
        <img src="../img/time_sale.jpg" class="time-sale">    
    </div>
    
    <!--商品一覧-->
    <div class="shohin">
        <img src="../img/pa-ka-.jpg" class="shohin-img">
        <div class="shohin-item">
            <div class="shohin-item-name">
            <p>商品名</p>
            </div>
            <p>￥〇〇〇〇　JPY</p>
        </div>
        <button type="submit">Add to cart</button>
    </div>

    <div class="shohin">
        <img src="../img/pa-ka-.jpg" class="shohin-img">
        <div class="shohin-item">
            <p>商品名</p>
            <p>￥〇〇〇〇　JPY</p>
        </div>
        <button type="submit">Add to cart</button>
    </div>

    <div class="shohin">
        <img src="../img/pa-ka-.jpg" class="shohin-img">
        <div class="shohin-item">
            <p>商品名</p>
            <p>￥〇〇〇〇　JPY</p>
        </div>
        <button type="submit">Add to cart</button>
    </div>

    <div class="shohin">
        <img src="../img/pa-ka-.jpg" class="shohin-img">
        <div class="shohin-item">
            <p>商品名</p>
            <p>￥〇〇〇〇　JPY</p>
        </div>
        <button type="submit">Add to cart</button>
    </div>
</body>
</html>