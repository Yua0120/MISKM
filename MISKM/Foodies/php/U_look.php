<?php session_start() ;?>
<?php require 'header.php' ;?>
<?php require 'connect.php' ;?>
<link rel="stylesheet" href="../css/header.css">
<link rel="stylesheet" href="../css/U_look.css">
<!--管理者用のハンバーガーメニューを作る-->
<link rel="stylesheet" href="../css/hamburger.css">
    <title>master-page</title>
</header>
<body>

<p class="text">ユーザー　一覧</p>

<?php
    $pdo = new PDO($connect, USER, PASS);
    $sql = "SELECT * FROM User WHERE nickname <> 'master'";
    $result = $pdo->query($sql);
    if ($result -> rowCount() > 0) {
        foreach ($result as $post) {
            echo '<div class="user">';
            echo '<div class="username" id="name">';
            //ユーザー名
            echo $post['name'];
            echo '</div>';
            echo '<div class="username" id="nickname">';
            //ニックネーム
            echo $post['nickname'];
            echo '</div>';
            echo '<div class="mail">';
            //メールアドレス
            echo $post['mail'];
            echo '</div>';
            echo '<div class="tel-number">';
            //電話番号
            echo $post['tel_number'];
            echo '</div>';
            echo '<div class="zip-code">';
            //郵便番号 表示する横に郵便マークつける
            echo '〒',$post['$zip_code'];
            echo '</div>';
            echo '<div class="addres">';
            //住所
            echo $post['$address'];
            echo '</div>';
            echo '</div>';
        }
    }
?>
<?php require 'footer.php' ;?>