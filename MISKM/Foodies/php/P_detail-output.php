<?php
session_start();
require 'connect.php';

$pdo = new PDO($connect, USER, PASS);
$sql = $pdo->prepare('SELECT * FROM Cart WHERE product_id = ?');
$sql->execute([$product_id]);
$row = $sql->fetch(PDO::FETCH_ASSOC);

    $_SESSION['Cart'] = [
        'id' => $row['user_id'],
        'product' => $row['product_id'],
        'counts' => $row['buy_counts']
    ];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //ここ心配だから聞く
    $user_id = isset($_SESSION['User']['id']) ? $_SESSION['User']['id'] : '';
    $product_id = $_POST['product_id'];
    $size = $_POST['size'];
    $quantity = isset($_POST['count']) ? $_POST['count'] : 0;

    $sql_size_id = $pdo->prepare('SELECT id FROM Product WHERE id LIKE ? AND size = ?');
    $x = $product_id . "%";  // 検索条件
    $sql_size_id->execute([$x, $size]);
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

        $existing_cart_item->execute([$user_id, $size_id]);

    }

    // カートにアイテムが追加された場合のJavaScriptアラート
    echo "<script>
            alert('カートにアイテムが追加されました。');
            window.location.href = 'P_detail-input.php?id=".$product_id."';
          </script>";
    exit();
}
?>
