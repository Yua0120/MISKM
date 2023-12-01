<?php
session_start();
require 'connect.php';

$pdo = new PDO($connect, USER, PASS);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post_id = $_POST['id'];

    // JavaScript 確認ダイアログを表示
    echo "<script>
            if (confirm('本当に削除しますか？')) {
                // 削除を実行
                fetch('delete_post.php', {
                    method: 'POST',
                    body: new URLSearchParams({ 'id': '$post_id' }),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('削除が完了しました。');
                        window.location.href = 'mypage.php';
                    } else {
                        alert('削除に失敗しました。');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('削除に失敗しました。');
                });
            } else {
                alert('削除がキャンセルされました。');
            }
        </script>";
    exit;
} else {
    // 無効なリクエストメソッド
    http_response_code(405);
    exit('Method Not Allowed');
}
?>
