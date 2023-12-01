<?php session_start(); ?>
<?php require 'connect.php'; ?>
<?php require 'header.php'; ?>
<link rel="stylesheet" href="../css/Cart.css">
<title>カート画面</title>
</head>
<body>
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
            echo '<img src="/MISKM/img/', $row['image'], '" class="cart_img">';
            echo '<div class="item">';
            echo "<p>{$row['name']}</p>";
            echo "<br>";
            echo "<p>size:{$row['size']} {$row['price']}<br>{$row['buy_counts']}</p>";
            echo '<a href="Cart_delete.php?id=', $id, '">削除</a>';
            echo '<p id="line">-</p>';
            echo '</div>'; // .item divを閉じる
            echo '</div>'; // .main divを閉じる
        }
          /* echo '</div>';*/
    }
    ?>
</body>
</html>