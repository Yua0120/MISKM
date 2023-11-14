<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'connect.php'; ?>
<?php
    $pdo = new PDO($connect,USER,PASS);

    // フォームが送信されたときの処理
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // 新しいパスワードを取得（実際にはセキュリティ対策が必要）
        $newPassword = $_POST["new_password"];

        //パスワードの更新
        $sql=$pdo->prepare('update Pass set password = ? where user_id = ?');
        
        // アラートを表示
        echo '<script>alert("パスワードを変更しました。");</script>';
    }
?>
<?php require 'footer.php'; ?>



php
<!-- パスワード変更フォーム -->
    <label for="new_password">新しいパスワード:</label>
    <input type="password" name="new_password" id="new_password" required>
