<?php require 'header.php';?>

<?php require 'connect.php';?>
    <link rel="stylesheet" href="../css/O_pro.css">
    <title>注文確認</title>
</head>
<?php require 'FoodiesTitle.php';?>
    <form action="O_con.php" mrthods="post">
    <div class="main">
    <p>配送先住所</p>
    <?php
       echo $_POST['name'],'<br>';/*-名前*/
       echo $_POST['zip_code'],'<br>';/*-郵便番号*/
       echo $_POST['address'],'<br>';/*住所*/
       echo $_POST['tel_number'],'<br>';/*電話番号*/
       echo $_POST['mail'],'<br>';/*メールアドレス*/
       echo '<p>支払方法</p>';
       echo '現金（コンビニ払い）';
       ?>
    </div>
    <p class="cheak"> 情報に誤りがないかご確認ください</p>
    <button type="submit"><a href="O_con.php">注文確定</a></button>
    </form>
</body>
</html>
