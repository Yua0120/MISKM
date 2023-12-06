<?php session_start(); ?>
<?php require 'connect.php'; ?>
<?php require 'header.php';?>

    <link rel="stylesheet" href="../Foodies/css/header.css">
    <link rel="stylesheet" href="../css/O_con.css">
    <title>注文確定</title>
</head>
<?php require 'FoodiesTitle.php';?>
    <form action="Top.php">
    <!--<img src="../../img/O_1.jpg" class="img1"><br>くまの画像-->
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
    $date = date("Y/m/d");
    if (isset($_SESSION['User'])) {
        var_dump('2222');
        $id = $_SESSION['User']['user_id'];
        $pdo = new PDO($connect, USER, PASS);
        $sql = "INSERT INTO  History (user_id, daily)
                VALUES ($id,$date)"; //注文履歴テーブルにデータ挿入
        
        $sql = "INSERT INTO History_detail(history_id,product_id,total,counts)
                VALUES ()";//注文履歴詳細にデータ挿入
        $sql = "DELETE FROM Cart";/*カート内データ削除*/
        $stmt = $pdo->query($sql);  
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>
     
</body>
</html>