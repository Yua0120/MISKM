<?php require 'header.php';?>
<?php require 'connect.php';?>
    <link rel="stylesheet" href="../css/O_check.css">
    <title>注文確認</title>
</head>
<?php require 'FoodiesReturn.php'; ?>
    <form action="O_con.php" mrthods="post">
    <div class="main">
    <p>配送先住所</p>
    <?php
       echo '<div class="text">';
       echo $_POST['name'],'<br>';/*-名前*/
       echo $_POST['zip_code'],'<br>';/*-郵便番号*/
       echo $_POST['address'],'<br>';/*住所*/
       echo $_POST['tel_number'],'<br>';/*電話番号*/
       echo $_POST['mail'],'<br>';/*メールアドレス*/
       echo '</div>';
       echo '<p>支払方法</p>';
       echo '現金（コンビニ払い）';
       ?>
    </div>
    <p class="check"> 情報に誤りがないかご確認ください</p>
    <button type="submit" class="example"><a href="O_con.php"><span>注文確定</span></a></button>
    </form>
</body>
</html>
