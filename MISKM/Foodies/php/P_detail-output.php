<?php require 'header.php' ;?>
<link rel="stylesheet" href="../css/template.css">
<link rel="stylesheet" href="../css/header.css">
<?php require 'FoodiesTitle' ;?>
<?php
session_start();
require 'connect.php';
require 'return.php';

$pdo = new PDO($connect, USER, PASS);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //ここ心配だから聞く
    $user_id = $_SESSION['id'];
    $size = $_POST['size'];
    $quantity = isset($_POST['count']) ? $_POST['count'] : 1;

    $sql_size_id = $pdo->prepare('SELECT id FROM Product WHERE size = ?');
    $sql_size_id->execute([$size]);
    $size_id = $sql_size_id->fetchColumn();

    // 既存のカートアイテムを検索
    $existing_cart_item = $pdo->prepare('SELECT * FROM Cart WHERE user_id = ? AND product_id = ?');
    $existing_cart_item->execute([$user_id, $size_id]);
    $existing_item_data = $existing_cart_item->fetch(PDO::FETCH_ASSOC);

    if ($existing_item_data) {
        // 既存のアイテムがある場合は数量を更新
        $new_quantity = $existing_item_data['buy_counts'] + $quantity;
        $update_existing_item = $pdo->prepare('UPDATE Cart SET buy_counts = ? WHERE user_id = ? AND product_id = ?');
        $update_existing_item->execute([$new_quantity, $user_id, $size_id]);
    } else {
        // 既存のアイテムがない場合は新しいアイテムを追加
        $add_new_item = $pdo->prepare('INSERT INTO Cart (user_id, product_id, buy_counts) VALUES (?, ?, ?)');
        $add_new_item->execute([$user_id, $size_id, $quantity]);
    }

    // カートにアイテムが追加された場合のJavaScriptアラート
    echo "<script>
            alert('カートにアイテムが追加されました。');
            window.location.href = 'Top.php';
          </script>";
    exit();
}
?>