<?php session_start();?>
<?php 'connect.php' ?>
<?php
// データベースに接続
$pdo = new PDO($Product,USER,PASS);

// 接続エラーがあるか確認
if ($pdo->pdoect_error) {
    die("データベースに接続できませんでした: " . $pdo->pdoect_error);
}

// ログインユーザーのIDをセッションから取得
$user_id = $_SESSION['user_id'];

// ユーザーがいいねボタンをクリックしたときの処理
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // いいねの状態を切り替える
    toggleLike($pdo, $user_id, $product_id);
}

// いいねの状態を切り替える関数
function toggleLike($pdo, $user_id, $product_id) {
    // いいねの状態を取得するクエリ
    $query = "SELECT * FROM likes WHERE user_id = '$user_id' AND product_id = '$product_id'";
    $result = $pdo->query($query);

    if ($result->num_rows > 0) {
        // いいねが既についている場合、解除する処理
        $deleteQuery = "DELETE FROM likes WHERE user_id = '$user_id' AND product_id = '$product_id'";
        if ($pdo->query($deleteQuery) === TRUE) {
            echo "いいねを解除しました";
        } else {
            echo "Error: " . $deleteQuery . "<br>" . $pdo->error;
        }
    } else {
        // いいねがついていない場合、追加する処理
        $insertQuery = "INSERT INTO likes (user_id, product_id) VALUES ('$user_id', '$product_id')";
        if ($pdo->query($insertQuery) === TRUE) {
            echo "いいねしました";
        } else {
            echo "Error: " . $insertQuery . "<br>" . $pdo->error;
        }
    }
}

// データベース接続を閉じる
$pdo->close();
?>