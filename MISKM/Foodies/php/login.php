<?php require 'header.php'?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/centerYoo.css">
    <link rel="stylesheet" href="../css/template.css">
    <link rel="stylesheet" href="../css/login.css">
    <title>login.html</title>
</head>
<body>

    <h1>Choice is yours</h1>

    <form action="login-output.php" method="post">
        <div class="container">
        <div class="left-aligned-text">
        <div class="login-input">

            <p>NickName
                <input type="text" name="nickname" class="in"></p>
            <p>PassWord
                <input type="password" name="password" class="in"></p>
        </div>
        <div class="login-confirmation">
            <a href="U_check.php">パスワードを忘れた方はこちら</a><br>
        </div>
        <div class="NEWlogin-confirmation">
 <a href="U_reg.php">新規の方はこちら</a><br>

        </div>
        </div>
        </div>
        <div class="login-fail">
            <?php
                if($_GET['flag']=='fail'){
                    echo '<p class="error">ニックネームあるいはパスワードが違います。</p>';
                }
            ?>
        </div>
        <div class="login-button">
            <!--login-output側でTop.phpに飛ばしてる！-->
            <p><button class="example" type="submit" name="login"><span>Login</span></button></p>

        </div>
    </form>
    <center><h2>New Member registration</h2></center>

</body>
</html>