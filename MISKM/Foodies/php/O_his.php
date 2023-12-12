<?php session_start();?>
<?php require 'header.php';?>
<?php require 'connect.php';?>
<link rel="stylesheet" href="../css/O_his.css">
<link rel="stylesheet" href="../css/hamburger.css">
<title>注文履歴</title>
</head>
<?php require 'FoodiesMenu.php';?>
<h3 class="title">注文履歴</h3>
<?php
/* データベース接続 */
if (isset($_SESSION['User'])) {
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo -> prepare('select * from History WHERE user_id = ?');
    $sql -> execute([
            $_SESSION['User']['id']
    ]);
    //$setid = $sql->fetchAll(PDO::FETCH_ASSOC);
    //$userId = $_SESSION['User']['id'];
    $sql = "SELECT History.daily, Product.name, Product.image, History_detail.product_id
            FROM History
            JOIN History_detail ON History.id = History_detail.history_id
            JOIN Product ON History_detail.product_id = Product.id
            WHERE user_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $userId, PDO::PARAM_INT); 
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    /* 商品一覧 */
    foreach ($result as $row) {
        $product_id = $row['product_id']; // $product_id をここで定義する
        echo '<div class="main">';
        echo '<figure class="image">';
        echo '<img src="/MISKM/img/', $row['image'], '" class="his_img">';
        echo '</figure>';
        echo '<div class="item">';
        $id_in = strpos($product_id,'-');
        $id_out = ($id_in !== false) ? substr($product_id,0,$id_in):$product_id;
        echo "<p>{$row['daily']} <a href='P_detail-input.php?id={$id_out}'><br>{$row['name']}</a></p>";
        echo "<br>";
        echo '</div>'; // .item divを閉じる
        echo '</div>'; // .main divを閉じる
    }
}
?>
</div>
<?php require 'footer.php' ;?>
