<?php require 'header.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Foodies/css/header.css">
    <link rel="stylesheet" href="css/O_pro.css">
    <title>注文手続き</title>
</head>
<body>
    <form action="O_check.html" method="post">
    <div class="main">
        <p>配送先住所<br>
          <input type="checkbox" name="address" id="address">登録した住所に配送する
        </p>
        <p>
           <input type="text" class="text" name="name" id="name" placeholder="名前（カナ）"><br>
           <input type="text" class="text" name="zip_coded" id="zip_code" placeholder="郵便番号"><br>
           <input type="text" class="text" name="address" id="address" placeholder="住所"><br>
           <input type="text" class="text" name="address_num" id="address2_num" placeholder="番地"><br>
           <input type="text" class="text" name="address_apart" id="address_apart" placeholder="マンション名、部屋番号など"><br>
           <input type="text" class="text" name="tel_number" id="telnumber" placeholder="電話番号"><br>
           <input type="text" class="text" name="e-mail" id="e-mail" placeholder="メールアドレス"><br>
            支払い方法<br>
           <input type="radio" name="pay" id="cash">現金（コンビニ払い<br>
        </p>
    </div>
    <p><button type="submit">注文確認</button></p>
    </form>
</body>
</html>