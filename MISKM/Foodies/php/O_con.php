<?php require 'header.php';?>

    <link rel="stylesheet" href="../Foodies/css/header.css">
    <link rel="stylesheet" href="../../css/O_con.css">
    <title>注文確定</title>
</head>
<?php require 'FoodiesTitle.php';?>
    <form action="Top.php">
    <img src="../img/O_1.jpg" class="img1"><br><!--くまの画像はる？-->
    <?php
    echo '配達予定日　';
    echo date("m月d日",strtotime("+3 day"));
    echo '<br>';
    ?>
    <img src="../../img/O_2.jpg" class="img2"><br>
    <button>商品一覧へ戻る</button>
    </form>
</body>
</html>