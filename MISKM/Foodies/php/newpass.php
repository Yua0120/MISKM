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
    <header class="header">
        <!-- ヘッダーロゴ -->
        <div class="logo" id="title">Foodies</div>
    </header>
    <br><br><br>
    <form action="Top.php">
        <div class="container">
            <div class="left-aligned-text">
                <div class="login-input">
                    New PassWord
                    <input type="password" name="loginid" placeholder="8文字以上16文字以下で入力してください"><br>
                    <p><input type="password" name="Question" placeholder="もう一度パスワードを入力してください"></p>
                </div>
                <div class="login-button">
                    <p><button class="example" type="submit" name="login"><span>Login</span></button></p>
                </div>
            </div>
        </div>    
    </form>

</body>
</html> 
