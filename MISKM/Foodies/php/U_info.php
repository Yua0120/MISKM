<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/touroku.css">
    <title>ユーザー個人情報登録</title>
</head>
<body>
    <header class="header">
        <!-- ヘッダーロゴ -->
        <div class="logo" id="title">Foodies</div>
    </header>
    <center><h1>Sign up</h1></center>
    <form action="Top.php" method="post">
        <div class="container">
        <div class="left-aligned-text">
            
    <h4>Name</h4>
    <input type="text" name="Name" class="text">
    
    <h4>Nickname</h4>
    <input type="text" name="Nicename" class="text">

    <h4>Phone number</h4>    
    <input type="text" size="30" placeholder="ハイフンなしで入力してください" name="Phonenumber" class="text">

    <h4>Post code</h4>    
    <input type="text" size="30" placeholder="ハイフンなしで入力してください" name="Postcode" class="text">

    <h4>Address</h4>
    <input type="text" size="40" placeholder="番地や部屋番号まで書いてください" name="Address" class="text"><br><br>
        
    <div class="bobo">
    <button class="example"><span>Sign up</span></button>
    </div>
        </div>
        </div>
    </form>
</body>
</html>