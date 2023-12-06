<?php session_start(); ?>
<?php require 'connect.php'; ?>
<?php require 'header.php';?>
    <link rel="stylesheet" href="../css/centerYoo.css">
    <link rel="stylesheet" href="../css/O_con.css">
    <title>注文確定</title>
</head>
<?php require 'FoodiesTitle.php';?>
    <form action="Top.php">
    <div class="container">
        <div class="left-aligned-text">
            <img src="../../img/O_1.jpg" class="img1"><br><!--くまの画像-->
                <?php
                echo '配達予定日　';
                echo date("m月d日",strtotime("+3 day"));
                echo '<br>';
                ?>
                <img src="../../img/O_2.jpg" class="img2"><br>
                <button type="submit" class="example"><span>商品一覧へ戻る</span></button>
        </div>
    </div>
    </form>
    <?php
    /* データベース接続 */
    if (!isset($_SESSION['User'])) {
        $pdo = new PDO($connect, USER, PASS);
        $sql = "DELETE FROM Cart";/*カート内データ削除*/
        $stmt = $pdo->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>
     
</body>
</html>