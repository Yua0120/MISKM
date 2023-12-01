<?php session_start(); ?>
<?php require 'connect.php'; ?>
<?php require 'header.php'; ?>
<link rel="stylesheet" href="../css/Cart.css">
<title>カート画面</title>
</head>
<body>
    <!--スクロール設定
    <div style="width: 100%; height: 100px; overflow-y: scroll; border: 1px #999999 soild;">-->
    <?php require 'FoodiesMenu.php'; ?>
    <?php
    /* データベース接続 */
    if (!isset($_SESSION['User'])) {
        $pdo = new PDO($connect, USER, PASS);
        $sql = "SELECT Product.id, Product.name, Product.size, Product.price, Product.image, Cart.buy_counts
                FROM Cart
                JOIN Product ON Cart.product_id = Product.id";
        $stmt = $pdo->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        /* 商品一覧 */
          /* echo '<div class="ALL">';*/
        foreach ($result as $row) {
            $id = $row['id'];
            echo '<div class="main">';
            echo '<figure class="image">';
            echo '<img src="/MISKM/img/', $row['image'], '" class="cart_img">';
            echo '</figure>';
            echo '<div class="item">';
            echo '<div class="name">';
            echo "<p>{$row['name']}</div>
                  <br>
                  <div class='text>'
                 size:{$row['size']} {$row['price']}<br>{$row['buy_counts']}</p>";
            echo '<a href="Cart_delete.php?id=', $id, '">削除</a>';
            echo '</div>'; // .item divを閉じる
            echo '</div>'; // .main divを閉じる
        }
          /* echo '</div>';*/
    }
    ?>
    <!--</div>-->
</body>
</html>