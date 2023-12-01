<?php require 'header.php';?>
<?php require 'connect.php';?>
    <title>注文履歴</title>
</head>
<body>
    <p>注文履歴</p>
    <!--スクロールの設定　お試し-->
    <div style="width: 100%; height: 100px; overflow-y: scroll; border: 1px #999999 soild;">
       <?php
    /* データベース接続 */
    if (!isset($_SESSION['User'])) {
        $pdo = new PDO($connect, USER, PASS);
        $sql = "SELECT History.date,Product.neme
                FROM History
                JOIN History_detail ON History.id = History_detail.history_id
                JOIN Product ON History_detail.product_id = Product.id
                WHERE History.id = $history_id;";
        $stmt = $pdo->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $sql
        /* 商品一覧 */
          /* echo '<div class="ALL">';*/
        foreach ($result as $row) {
            $id = $row['id'];
            echo '<div class="main">';
            echo '<div class="item">';
            echo "<p>{$row['date']}</p>";
            echo "<p>{$row['name']}</p>";
            echo "<br>";
            echo '<p id="line">-</p>';
            echo '</div>'; // .item divを閉じる
            echo '</div>'; // .main divを閉じる
        }
          /* echo '</div>';*/
    }
    ?>
    </div>
</body>
</html>