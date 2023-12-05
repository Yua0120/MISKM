<?php session_start();?>
<?php require 'header.php';?>
<?php require 'connect.php';?>
    <link rel="stylesheet" href="../css/O_pro.css">
    <title>注文手続き</title>
</head>
<?php require 'FoodiesTitle.php';?>
    <form action="O_check.php" method="post">
    <div class="main">
        <p class="sabtitle">
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
            echo '<p class = "error">
                  ログインしていません。<br>
                  ログインしてください。
                  </p>';
        }
        ?>
        <p class="sabtitle">支払い方法<p><br>
        <input type="radio" name="pay" id="cash">現金（コンビニ払い）<br>
        </p>
    </div>
    <p><button type="submit">注文確認</button></p>
    </form>
</body>
</html>
