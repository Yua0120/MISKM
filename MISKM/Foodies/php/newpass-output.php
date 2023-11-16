<?php session_start(); ?>
<?php require 'connect.php'; ?>
<?php
    $pdo = new PDO($connect,USER,PASS);

    // サンプルのユーザーパスワード（実際にはデータベースから取得するなどの処理が必要）
    $previousPassword = "previous_password";

    // フォームが送信されたときの処理
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 新しいパスワードを取得（実際にはセキュリティ対策が必要）
    $newPassword = $_POST["new_password"];

    // パスワードが前回と同じかどうかを確認
        if ($newPassword === $previousPassword) {
            echo '<script>alert("新しいパスワードは前回と同じです。");</script>';
        }else{
        // パスワードを更新するなどの処理を行う

        // アラートを表示
        echo '<script>alert("パスワードを変更しました。");</script>';
        }
    }
?>