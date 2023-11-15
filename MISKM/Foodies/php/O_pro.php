<?php require 'heder.php';?>
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
    <header class="header">
        <div class="logo">Foodies</div>
    </header>
    <form action="O_check.html" method="post">
    <div class="main">
        <p>配送先住所<br>
        </p>
        <?php
          echo '<p>';
          echo '<input type="text" class="text" name="name" id="name" value="',$_POST['name'],'"><br>';
          echo '<input type="text" class="text" name="zip_coded" id="zip_code" value="',$_POST['zip_code'],'"><br>';
          echo '<input type="text" class="text" name="address" id="address" value="',$_POST['addres'],'"><br>';
          echo '<input type="text" class="text" name="address_num" id="address2_num" value="',$_POST[''],'"><br>';
          echo '<input type="text" class="text" name="address_apart" id="address_apart" value="',$_POST[],'"><br>';
          echo '<input type="text" class="text" name="tel_number" id="telnumber" value="',$_POST[],'"><br>';
          echo '<input type="text" class="text" name="e-mail" id="e-mail" value="',$_POST['mail'],'"><br>';
          echo '支払い方法<br>';
          echo '<input type="radio" name="pay" id="cash">現金（コンビニ払い<br>';
          echo '</p>';
          ?>
    </div>
    <p><button type="submit">注文確認</button></p>
    </form>
</body>
</html>
<!--DBとつなげる-->