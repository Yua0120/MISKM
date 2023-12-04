<?php require 'header.php';?>
<?php require 'connect.php';?>
    <title>注文履歴</title>
</head>
<?php require 'FoodiesMenu.php';?>
    <p>注文履歴</p>
    <!--スクロールの設定　お試し-->
    <div style="width: 100%; height: 100px; overflow-y: scroll; border: 1px #999999 soild;">
       <?php
    /* データベース接続 */
    if (!isset($_SESSION['User'])) {
        $pdo = new PDO($connect, USER, PASS);
        $sql = "SELECT History.date,Product.name,Product.image,History_detail.product_id
                FROM History
                JOIN History_detail ON History.id = History_detail.history_id
                JOIN Product ON History_detail.product_id = Product.id";
        $stmt = $pdo->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $product_id = $row['product_id'];
        /* 商品一覧 */
          /* echo '<div class="ALL">';*/
        foreach ($result as $row) {
            echo '<div class="main">';
            echo '<figure class="image">';
            echo '<img src="/MISKM/img/', $row['image'], '" class="his_img">';
            echo '</figure>';
            echo '<div class="item">';
            echo "<p>{$row['date']}
                  <a href='P_detail-input.php' ?id='".$product_id."'>{$row['name']}</a></p>";
            echo "<br>";
            echo '<p id="line">-</p>';
            echo '</div>'; // .item divを閉じる
            echo '</div>'; // .main divを閉じる
    }
    ?>
    </div>
</body>
</html>