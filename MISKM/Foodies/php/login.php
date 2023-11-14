<?php require 'header.php'?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/centerYoo.css">
    <link rel="stylesheet" href="./css/template.css">
    <link rel="stylesheet" href="./css/login.css">
    <title>login.html</title>
</head>
<body>

    <h1>Choice is yours</h1>

    <form action="login-output.php" method="post">
    <form action="Top.php" method="post">
        <div class="container">
        <div class="left-aligned-text">
        <div class="login-input">

            <p>NickName
                <input type="text" name="nickname" style="width: 200px; height: 30px;"></p>
            <p>PassWord
                <input type="password" name="password" style="width: 200px; height: 30px;"></p>
        </div>
        <div class="login-confirmation">
            <a href="newpass.html">パスワードを忘れた方はこちら</a><br>
        </div>
        <div class="NEWlogin-confirmation">
            <a href="U_reg.html">新規の方はこちら</a><br>
        </div>
        </div>
        </div>
        <div class="login-fail">
            <?php
                if($_GET['flag']==false){
                    echo '<p class="error">ニックネームあるいはパスワードが違います。</p>';
                }
            ?>
        </div>
        <div class="login-button">
            //login-output側でTop.phpに飛ばしてる！
            <p><button class="example" type="submit" name="login"><span>Login</span></button></p>

        </div>
    </form>
    <center><h2>New Member registration</h2></center>

</body>
</html>