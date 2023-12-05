<?php session_start(); ?>
<?php require 'header.php' ?>
<?php require 'connect.php' ?>
<link rel="stylesheet" href="../css/header.css">
<link rel="stylesheet" href="../css/P_detail.css">
<title>商品詳細</title>
</header>
<?php require 'FoodiesReturn-top.php' ?>
<?php
$pdo = new PDO($connect, USER, PASS);

// ログインしている場合、セッションから user_id を取得
$user_id = isset($_SESSION['User']['id']) ? $_SESSION['User']['id'] : '';

$sql = $pdo->prepare('select * from Product where id=?');
$sql->execute([$_GET['id'] . '-L']);

foreach ($sql as $row) {

    $user_id = $product_id = $buy_counts = '';
    if (isset($_SESSION['Cart'])) {
        $user_id = $_SESSION['Cart']['user_id'];
        $product_id = $_SESSION['Cart']['product_id'];
        $buy_counts = $_SESSION['Cart']['buy_count'];
    }
    ?>
    <?php require_once 'slide.php' ?>

    <form id="productForm" action="P_detail-output.php" method="post">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <input type="hidden" name="product_id" value="<?php echo $_GET['id']; ?>">
        <div class="shohin-size-number-box">
            <div class="size-box">
                <select name="size" id="size">
                    <option value="XS">XS</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                </select>
            </div>

            <div class="number-box">
                <button type="button" class="number-button" id="down">-</button>
                <input type="text" class="number-button" id="textbox">
                <button type="button" class="number-button" id="up">+</button>
            </div>
        </div>

        <div class="size-img-box">
            <img src="/MISKM/img/size-kakunin.jpg" class="size-img">
        </div>

        <div class="description-text-box">
            <?php echo nl2br(htmlspecialchars($row['description'])); ?>
        </div>

        <div class="cart-button-box">
            <button type="submit" class="cart-button">Add to cart</button>
        </div>
    </form>
    <script src="/MISKM/Foodies/script/P_detail.js"></script>
    <?php
}
?>
</body>
</html>