<?php require 'header.php';?>

    <link rel="stylesheet" href="../Foodies/css/header.css">
    <link rel="stylesheet" href="../css/O_con.css">
    <title>注文確定</title>
</head>
<?php require 'FoodiesTitle.php';?>
    <form action="Top.php">
    <img src="../../img/O_1.jpg" class="img1"><br><!--くまの画像-->
    <?php
    echo '配達予定日　';
    echo date("m月d日",strtotime("+3 day"));
    echo '<br>';
    ?>
    <img src="../../img/O_2.jpg" class="img2"><br>
    <button>商品一覧へ戻る</button>
    </form>
    <?php
    /* データベース接続 */
    if (!isset($_SESSION['User'])) {
        $pdo = new PDO($connect, USER, PASS);
        $sql = "DELETE FROM Cart";/*カート内データ削除*/
        $stmt = $pdo->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     
</body>
</html>