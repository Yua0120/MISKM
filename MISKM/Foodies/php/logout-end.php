<?php session_start(); ?>
<?php require 'header.php';?>
    <link rel="stylesheet" href="../css/touroku.css">
    <link rel="stylesheet" href="../css/header.css">
    <title>ログアウト完了画面</title>
</head>
<body>
    <?php require 'FoodiesTitle.php' ?>
    <form action="login.php" method="post">

    <?php 
        if(isset($_SESSION['User'])){
            unset($_SESSION['User']);
            echo '<br><br>';
            echo '<center><h2>Logout Completed!</h2></center>';
            echo '<br><br>';
            echo '<div class="bobo">';
            echo '<button class="baba"><span>OK</span></button>';
            echo '</div>';
        }else{
            echo '<center>すでにログアウトしています。</center>';
            echo '<center><a href="login.php">ログイン画面へ</a></center>';
        }
    ?>

    </form>
</body>
</html>
