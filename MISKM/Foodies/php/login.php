<?php require 'header.php' ?>
<link rel="stylesheet" href="../css/centerYoo.css">
<link rel="stylesheet" href="../css/login.css">
<title>login.html</title>
</head>
<?php require 'FoodiesTitle.php' ?>

<h1>Choice is yours</h1>

<form action="login-output.php" method="post">
    <div class="container">
        <div class="left-aligned-text">
            <div class="login-input">
                <p>NickName
                    <input type="text" name="nickname" class="in">
                </p>
                <p>PassWord
                    <input type="password" name="password" class="in">
                </p>
            </div>
            <div class="login-confirmation">
                <a href="U_check_input.php">パスワードを忘れた方はこちら</a><br>
            </div>
            <div class="NEWlogin-confirmation">
                <a href="U_reg.php">新規の方はこちら</a><br>

            </div>
        </div>
    </div>
    <div class="login-fail">
        <?php
        // $_GET['flag']がセットされているか確認
        if (isset($_GET['flag']) && $_GET['flag'] == 'fail') {
            echo '<p class="error">ニックネームあるいはパスワードが違います。</p>';
        }
        ?>
    </div>
    <div class="login-button">
        <!--login-output側でTop.phpに飛ばしてる！-->
        <p><button class="example" type="submit" name="login"><span>Login</span></button></p>

    </div>
</form>
<center>
    <h2>New Member registration</h2>
</center>

</body>

</html>