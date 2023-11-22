<?php session_start();?>
<?php 'connect.php' ?>
<?php

// ログインユーザーのIDをセッションから取得
$user_id = $_SESSION['user_id'];

// ユーザーがいいねボタンをクリックしたときの処理
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // いいねの状態を切り替える
    toggleLike($connect, $user_id, $product_id);
}

// いいねの状態を切り替える関数
function toggleLike($connect, $user_id, $product_id) {
    // いいねの状態を取得するクエリ
    $query = "SELECT * FROM likes WHERE user_id = '$user_id' AND product_id = '$product_id'";
    $result = $connect->query($query);

    if ($result->rowCount() > 0) {
        // いいねが既についている場合、解除する処理
        $deleteQuery = "DELETE FROM likes WHERE user_id = '$user_id' AND product_id = '$product_id'";
        if ($connect->exec($deleteQuery) !== false) {
            echo "いいねを解除しました";
        } else {
            echo "Error: いいねを解除できませんでした";
        }
    } else {
        // いいねがついていない場合、追加する処理
        $insertQuery = "INSERT INTO likes (user_id, product_id) VALUES ('$user_id', '$product_id')";
        if ($connect->exec($insertQuery) !== false) {
            echo "いいねしました";
        } else {
            echo "Error: いいねできませんでした";
        }
    }
}

// データベース接続を閉じる
$connect = null;
?>