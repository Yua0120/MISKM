<?php
session_start();
require 'connect.php';


$user_id = isset($_SESSION['User']['id']) ? $_SESSION['User']['id'] : '';


// 投稿のIDを取得
if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    try {
        $pdo = new PDO($connect, USER, PASS);
        
        // すでにいいねが存在するか確認
        $checkLikeSql = $pdo->prepare('SELECT * FROM Good WHERE user_id = ? AND post_id = ?');
        $checkLikeSql->execute([$user_id, $post_id]);

        if ($checkLikeSql->rowCount() === 0) {
            // いいねがまだ存在しない場合、Good テーブルに挿入
            $insertLikeSql = $pdo->prepare('INSERT INTO Good (user_id, post_id) VALUES (?, ?)');
            $insertLikeSql->execute([$user_id, $post_id]);

            // いいねが追加されたら、Post テーブルの good_count カラムをインクリメント
            $updateGoodCountSql = $pdo->prepare('UPDATE Post SET good_count = good_count + 1 WHERE id = ?');
            $updateGoodCountSql->execute([$post_id]);
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