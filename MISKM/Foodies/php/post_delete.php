<?php
session_start();
require 'connect.php';

$pdo = new PDO($connect, USER, PASS);

$user_id = isset($_SESSION['User']['id']) ? $_SESSION['User']['id'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post_id = isset($_POST['id']) ? $_POST['id'] : null;

    if ($post_id !== null) {
        try {
            // Good テーブルから削除
            $deleteGoodSql = $pdo->prepare('DELETE FROM Good WHERE post_id = ?');
            $deleteGoodSql->execute([$post_id]);

            // Post テーブルから削除
            $deletePostSql = $pdo->prepare('DELETE FROM Post WHERE id = ?');
            $deletePostSql->execute([$post_id]);

            // 削除が成功したことをクライアントに通知
            $response = ['success' => true];
        } catch (PDOException $e) {
            // エラーが発生した場合はエラーメッセージをクライアントに通知
            $response = ['success' => false, 'error' => $e->getMessage()];
        }

        // JSON 形式でレスポンスを返す
        header('Content-Type: application/json');

        // JavaScript を使用して mypage.php にリダイレクト
        echo '<script>
            window.location.href = "mypage.php?id=' . $user_id . '";
            </script>';
        exit;
    }
}

// 無効なリクエストメソッド
http_response_code(405);
exit('Method Not Allowed');
?>
