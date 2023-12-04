<?php
session_start();
require 'connect.php';


$user_id = $_SESSION['user_id'];

// 投稿のIDを取得
if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    try {
        $pdo = new PDO($connect, USER, PASS);
        
        // すでにいいねが存在するか確認
        $checkLikeSql = $pdo->prepare('SELECT * FROM Good WHERE user_id = ? AND post_id = ?');
        $checkLikeSql->execute([$user_id, $post_id]);

        if ($checkLikeSql->rowCount() > 0) {
            // いいねが存在する場合、Good テーブルから削除
            $deleteLikeSql = $pdo->prepare('DELETE FROM Good WHERE user_id = ? AND post_id = ?');
            $deleteLikeSql->execute([$user_id, $post_id]);
        }

        // この処理が成功したら元のページにリダイレクト（適切なURLに変更すること）
        header('Location: C_detail.php?id='.$post_id); 
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit();
    }
} else {
    // 投稿のIDが渡されていない場合のエラー処理（適切な方法で処理すること）
    echo "Invalid request.";
    exit();
}
?>
