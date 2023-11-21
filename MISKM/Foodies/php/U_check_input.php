<?php require 'header.php'?>
    <link rel="stylesheet" href="../css/template.css">
    <link rel="stylesheet" href="../css/U_check.css">
    <title>本人確認画面</title>
</head>
<?php require 'FoodiesTitle.php';?>
    <?php
       echo '<form action="U_check_output.php" method="post">';
       echo '<div class="main">';
       echo '<p>';
       echo 'mail';
       echo '<input type="email" class="text1" name ="mail" id="mail">';
       echo '</p>';
       echo '<p>';
       echo '秘密の質問';
       echo '<input type="text" class="text2"name="question" id="question" placeholder="卒業した小学校名を入力してください">';
       echo '</p>';
       echo '</div>';
       echo '<button type="submit" >Next</button>';
       echo '</form>';
    
       // $_GET['flag']がセットされているか確認(本人確認に失敗した場合)

       if (isset($_GET['flag']) && $_GET['flag'] == 'fail') {
           echo '<p class="error">本人確認に失敗しました。もう一度入力してください。</p>';
       }
    ?>
</body>
</html>