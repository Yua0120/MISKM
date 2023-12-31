<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    require 'connect.php';
}
?>
<?php require 'header.php'; ?>
<link rel="stylesheet" href="../css/Cart.css">
<link rel="stylesheet" href="../css/hamburger.css">
<title>カート画面</title>
</head>
<body>
    <!--スクロール設定
    <div style="width: 100%; height: 100px; overflow-y: scroll; border: 1px #999999 soild;">-->
    <?php require 'FoodiesMenu.php'; ?>
    <?php
    /* データベース接続 */
    if (isset($_SESSION['User'])) {
        $pdo = new PDO($connect, USER, PASS);
        $sql = $pdo -> prepare('select * from Cart where user_id = ?');
        $sql -> execute([
            $_SESSION['User']['id']
        ]);
        $setid = $sql->fetchAll(PDO::FETCH_ASSOC);
        $userId = $_SESSION['User']['id'];
        $sql = "SELECT Product.id, Product.name, Product.size, Product.price, Product.image, Cart.buy_counts
                FROM Cart
                JOIN Product ON Cart.product_id = Product.id
                WHERE user_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $userId, PDO::PARAM_INT); 
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $total_price = 0;
        /* 商品一覧 */
        if(!empty($setid)){
            foreach ($result as $row) {
                $sum_price = $row['price'] * $row['buy_counts'];
                $id = $row['id'];
                echo '<h3>カート</h3>';
                echo '<div class="main">';
                echo '<figure class="image">';
                echo '<img src="/MISKM/img/', $row['image'], '" class="cart_img">';
                echo '</figure>';
                echo '<div class="item">';
                echo "<p class='name'>{$row['name']}</p>";
                echo "<br>";
                echo "<p class='text'>
                      size:{$row['size']}　￥{$row['price']}<br>
                      counts:{$row['buy_counts']}　小計　￥",$sum_price,
                      "</p>";
                echo '<a href="Cart_delete.php?id=', $id, '">削除</a>';
                echo '</div>'; // .item divを閉じる
                echo '</div>'; // .main divを閉じる
                $total_price += $sum_price; 
            }
            echo '<div class="total">';
            echo '合計　￥',$total_price;
            echo '</div>';
            echo '<form action="O_pro.php" method="post">';
            echo '<input type="hidden" name="total" value="',$total_price,'">';
            echo '<button type="submit">購入手続きへ</button>';
            echo '</form>';
        }else{
            echo '<p class="error">カートに商品が入っていません。</p>';
        }    
    }else{
        echo  '<p class ="error">ログインしてください</p>';
    }
            
    ?>
    <!--</div>-->
    <?php require 'footer.php' ;?>