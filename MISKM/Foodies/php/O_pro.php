
<!--
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
        <p>
            配送先住所
        </p>
        <p>

          支払い方法<br>
          <input type="radio" name="pay" id="cash">現金（コンビニ払い）<br>
          </p>
    </div>
    <p><button type="submit">注文確認</button></p>
    </form>
</body>
</html>
DBとつなげる-->
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
    <form action="O_check.php" method="post">
    <div class="main">
        <p>
            配送先住所
        </p>
        <p>
        <?php
       if(isset($_SESSION['User'])){
        $pdo = new PDO($connect, USER, PASS);
        $sql = $pdo->prepare('SELECT  name, zip_code, addres, tel_number, mail FROM User WHERE nickname=?');
        $sql->execute([$_SESSION['User']['nickname']]);
        $row = $sql->fetch(PDO::FETCH_ASSOC);

        echo '<input type="text" class="text" name="name" id="name" value="', $row['name'], '"><br>';
        echo '<input type="text" class="text" name="zip_code" id="zip_code" value="', $row['zip_code'], '"><br>';
        echo '<textarea class="text" name="address" id="address">', $row['addres'], '</textarea><br>';
        echo '<input type="text" class="text" name="tel_number" id="tel_number" value="', $row['tel_number'], '"><br>';
        echo '<input type="text" class="text" name="mail" id="mail" value="', $row['mail'], '"><br>';
        }else{
            echo 'セッションが設定されていません。';
        }
        ?>
        支払い方法<br>
        <input type="radio" name="pay" id="cash">現金（コンビニ払い）<br>
        </p>
    </div>
    <p><button type="submit">注文確認</button></p>
    </form>
</body>
</html>
