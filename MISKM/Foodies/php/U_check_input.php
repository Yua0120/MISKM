<?php require 'header.php'; ?>
<link rel="stylesheet" href="../css/centerYoo.css">
<link rel="stylesheet" href="../css/U_check.css">
<title>本人確認画面</title>
</head>
<body> <!-- この開始のbodyタグを追加 -->
<?php require 'FoodiesTitle.php'; ?>
<?php
    echo '<form action="U_check_output.php" method="post">';
    echo '<div class="container">';
    echo '<div class="left-aligned-text">';
    echo '<div class="login-input">';

    echo 'メール<br>';
    echo '<input type="email" class="in" name ="mail" id="mail" required><br>';

    echo '秘密の質問<br>';
    echo '<input type="text" class="in" name="question" id="question" placeholder="卒業した小学校名を入力してください" required><br>';

    echo '<div class="next-button">';
    echo '<p><button class="example" type="submit"><span>Next</span></button></p>';
    echo '</div>';

    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</form>';

    // $_GET['flag']がセットされているか確認(本人確認に失敗した場合)
    if (isset($_GET['flag']) && $_GET['flag'] == 'fail') {
        echo '<p class="error">本人確認に失敗しました。もう一度入力してください。</p>';
    }
?>
</body> <!-- この終了のbodyタグを追加 -->
</html>