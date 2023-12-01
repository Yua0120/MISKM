<?php require 'header.php'; ?>
<link rel="stylesheet" href="../css/centerYoo.css">
<link rel="stylesheet" href="../css/U_check.css">
<title>本人確認画面</title>
</head>
<body>
<?php require 'FoodiesReturn.php'; ?>


    <form action="U_check_output.php" method="post">
    <div class="container">
    <div class="left-aligned-text">
    <div class="login-input">

        メール<br>
        <input type="email" size="13" class="in" name ="mail" required><br>

        秘密の質問<br>
        <input type="text" size="13" class="in" name="question" placeholder="卒業した小学校名を入力してください" required><br>

        <div class="next-button">
            <p><button class="example" type="submit"><span>Next</span></button></p>
        </div>

    </div>
    </div>
    </div>
    </form>

<?php
    // $_GET['flag']がセットされているか確認(本人確認に失敗した場合)
    if (isset($_GET['flag']) && $_GET['flag'] == 'fail') {
        echo '<p class="error">本人確認に失敗しました。もう一度入力してください。</p>';
    }
?>
</body> <!-- この終了のbodyタグを追加 -->
</html>