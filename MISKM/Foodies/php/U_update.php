<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/template.css">
    <link rel="stylesheet" href="css/touroku.css">
    <title>ユーザー情報更新</title>
</head>
<body>
    <header class="header">
        <!-- ヘッダーロゴ -->
        <div class="logo" id="title">Foodies</div>
    </header>
    <center><h1>Up Date</h1></center>
    <form action="info_update.php" method="post">
        <div class="container">
        <div class="left-aligned-text">
    <h4>E-mail</h4>
    <input type="text" size="40" name="E-mail" class="text">
    
    <h4>Pass word</h4>
    <input type="password" size="30"  placeholder="8文字以上16以下で入力してください" name="Pass1" class="text">
    
    <h4>Pass word(confirmation)</h4>
    <input type="password" size="30" placeholder="8文字以上16以下で入力してください" name="Pass2" class="text"><br><br>
    
    <div class="bobo">
    <button class="example"><span>Next</span></button>
    </div>
    </div>
    </div>
</body>
</html>