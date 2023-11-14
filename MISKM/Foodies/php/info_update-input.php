<?php session_start()?>
<?php require 'header.php';?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/template.css">
    <link rel="stylesheet" href="../css/touroku.css">
    <title>ユーザー個人情報更新確認</title>
</head>
<body>
    <?php
        $name=$nickname=$address=$tel_number=$zip_code='';
        if(isset($_SESSION['User'])){
            $name=$_SESSION['User']['name'];
            $nickname=$_SESSION['User']['nickname'];
            $address=$_SESSION['User']['address'];
            $tel_number=$_SESSION['User']['tel_number'];
            $zip_code=$_SESSION['User']['zip_code'];
        }
    ?>
    <center><h1>Up Date</h1></center>
    <?php
        echo '<form action="info_update-output.php" method="post">';
        echo '<div class="container">';
        echo '<div class="left-aligned-text">';
        echo '<div class="circle"></div>  <!--プロフィール画像の仮だよ！-->';
        echo '<h4>Name</h4>';
        echo '<input type="text" name="name" class="text">';
        echo '<h4>Nickname</h4>';
        echo '<input type="text" name="nickname" class="text">';
        echo '<h4>Phone number</h4>';
        echo '<input type="text" size="30" placeholder="ハイフンなしで入力してください" name="phonenumber" class="text">';
        echo '<h4>Post code</h4>';
        echo '<input type="text" size="30" placeholder="ハイフンなしで入力してください" name="postcode" class="text">';
        echo '<h4>Address</h4>';
        echo '<input type="text" size="40" placeholder="番地や部屋番号まで書いてください" name="address" class="text"><br><br>';
        echo '<div class="bobo">';
        echo '<button class="example"><span>Up Date</span></button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</form>';
    ?>
</body>
</html>