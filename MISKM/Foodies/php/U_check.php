<?php require 'header.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Foodies/css/header.css">
    <link rel="stylesheet" href="../css/U_check.css">
    <title>本人確認画面</title>
</head>
<body>
    <form action="newpass.html">
        <div class="main">
            <p>
              User ID
              <input type="text" class="text1" id="UserID">
            </p>
            <p>
               秘密の質問
               <input type="text" class="text2" id="question" placeholder="卒業した小学校名を入力してください">
            </p>
         </div>
         <button type="submit" >Next</button>
    </form>
</body>
</html>