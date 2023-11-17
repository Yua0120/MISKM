<?php require 'header.php';?>
<?php require 'connect.php';?>
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
        <p>
            配送先住所
        </p>
        <p>
        <?php
          echo '<input type="text" class="text" name="name" id="name" value="',$row['name'],'"><br>';
          echo '<input type="text" class="text" name="zip_coded" id="zip_code" value="',$row['zip_code'],'"><br>';
          echo '<textarea class="text" name="address" id="address" value="',$row['addres'],'"><br>';
          echo '<input type="text" class="text" name="tel_number" id="tel_number" value="',$rowT['tel_number'],'"><br>';
          echo '<input type="text" class="text" name="mail" id="mail" value="',$row['mail'],'"><br>';
          ?>
          支払い方法<br>
          <input type="radio" name="pay" id="cash">現金（コンビニ払い)<br>
          </p>
    </div>
    <p><button type="submit">注文確認</button></p>
    </form>
</body>
</html>
<!--DBとつなげる-->