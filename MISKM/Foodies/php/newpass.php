<?php require 'header.php'?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/centerYoo.css">
    <link rel="stylesheet" href="./css/template.css">
    <link rel="stylesheet" href="./css/newpass.css">
    <title>新しいパスワード</title>
</head>
<body>
    <br><br><br>
    <form action="newpass-output.php" method="post">

        <div class="container">
        <div class="left-aligned-text">
        <div class="login-input">

            New PassWord
            <input type="password"  class="in" name="password" placeholder="8文字以上16文字以下で入力してください"><br>
         <p><input type="password" class="in" name="password" placeholder="もう一度パスワードを入力してください"></p>
        
        <div class="login-button">
            <p><button class="example" type="submit" name="login"><span>Login</span></button></p>
        </div>

        </div>
        </div>
        </div>    
    </form>

</body>
</html> 
