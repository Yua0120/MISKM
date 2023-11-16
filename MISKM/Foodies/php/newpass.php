
<?php require 'header.php'?>
    <link rel="stylesheet" href="./css/centerYoo.css">
    <link rel="stylesheet" href="./css/template.css">
    <link rel="stylesheet" href="./css/newpass.css">
    <title>新しいパスワード</title>
</head>
<?php require 'FoodiesTitle.php' ?>

    <br><br><br>
    <form action="newpass-output.php" method="post">

        <div class="container">
        <div class="left-aligned-text">
        <div class="login-input">

            New PassWord
            <input type="password"  class="in" name="new_pass" id="new_password" placeholder="8文字以上16文字以下で入力してください"><br>
         <p><input type="password" class="in" name="new_pass2" id="new_password" placeholder="もう一度パスワードを入力してください"></p>
        
        <div class="login-button">
            <p><button class="example" type="submit" name="login"><span>Login</span></button></p>
        </div>

        </div>
        </div>
        </div>    
    </form>

</body>
</html> 
