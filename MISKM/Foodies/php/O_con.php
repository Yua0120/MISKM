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
             <!--<img src="../../img/O_1.jpg" class="img1"><br>くまの画像-->
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
    $date = date("Y/m/d");
    if (isset($_SESSION['User'])) {
        $id = $_SESSION['User']['id'];
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