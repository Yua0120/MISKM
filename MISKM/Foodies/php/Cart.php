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

        $sum_price = $result['price'] * $result['buy_counts'];
        $total_price = 0;
        /* 商品一覧 */
        if(!empty($setid)){
            foreach ($result as $row) {
                $id = $row['id'];
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
            echo '合計　￥',$total_price;
            echo '<button type="button" onclick="location.href=\'O_pro.php\'">購入手続きへ</button>';
        }else{
            echo '<p class="error">カートに商品が入っていません。</p>';
        }    
    }else{
        echo  '<p class ="error">ログインしてください</p>';
    }
            
    ?>
    <!--</div>-->
</body>
</html>