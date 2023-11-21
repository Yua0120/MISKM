<?php require 'header.php'?>
    <link rel="stylesheet" href="../css/template.css">
    <link rel="stylesheet" href="../css/U_check.css">
    <title>本人確認画面</title>
</head>
<?php require 'FoodiesTitle.php';?>
    <?php
       echo '<form action="newpass.php" method="post">';
       echo '<div class="main">';
       echo '<p>';
       echo 'mail';
       echo '<input type="mail" class="text1" name ="mail" id="mail">';
       echo '</p>';
       echo '<p>';
       echo '秘密の質問';
       echo '<input type="text" class="text2"name="question" id="question" placeholder="卒業した小学校名を入力してください">';
       echo '</p>';
       echo '</div>';
       echo '<button type="submit" >Next</button>';
       echo '</form>';
    ?>
</body>
</html>