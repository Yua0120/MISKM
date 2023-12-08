<?php require 'header.php';?>
<?php require 'connect.php';?>
    <link rel="stylesheet" href="../css/centerYoo.css">
    <link rel="stylesheet" href="../css/O_check.css">
    <title>注文確認</title>
</head>
<?php require 'FoodiesReturn.php'; ?>
    <form action="O_con.php" method="post">
    <div class="container">
        <div class="left-aligned-text">
            <br><br>
    <?php
       echo $_POST['name'],'<br>';/*-名前*/
       echo $_POST['zip_code'],'<br>';/*-郵便番号*/
       echo $_POST['address'],'<br>';/*住所*/
       echo $_POST['tel_number'],'<br>';/*電話番号*/
       echo $_POST['mail'],'<br>';/*メールアドレス*/
       echo '<p>支払方法</p>';
       echo $_POST['pay'];/*支払い方法*/
       ?>
    <p class="check"> 情報に誤りがないかご確認ください</p>
    <input type="hidden" name="total" value="<?=$_POST['total'] ?>">
    <button type="submit" class="example"><span>注文確定</span></button>
        </div>
    </div>
    </form>
</body>
</html>
