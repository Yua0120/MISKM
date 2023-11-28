<?php
session_start();
require 'connect.php';

try {
    if (isset($_POST['E-mail']) && isset($_POST['Name']) && isset($_POST['Nickname']) && isset($_POST['Postcode']) && isset($_POST['Addres']) && isset($_POST['Phonenumber']) && isset($_POST['Question']) && isset($_POST['password'])) {
        
        $pdo = new PDO($connect, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // ニックネームの重複確認
        $sql = $pdo->prepare('SELECT * FROM User WHERE nickname = ?');
        $sql->execute([$_POST['Nickname']]);
        $existingUser = $sql->fetch(PDO::FETCH_ASSOC);

        // ユーザーが既に存在する場合
        if ($existingUser) {
            echo '<script>alert("ユーザーが既に存在します。");</script>';
            echo '<a href="login.php">ログイン画面に戻る</a><br>';
            exit(); // ユーザーが既に存在する場合、ここで処理を中断
        }

        // ユーザーが存在しない場合、新規登録
        $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // 住所が登録される場合、flag を 1 に設定
        $flagValue = isset($_POST['Addres']) ? 1 : '';

        // 正しいSQLクエリを使用
        $sql = $pdo->prepare('insert into User (mail, name, nickname, zip_code, addres, tel_number, flag, question) values (?, ?, ?, ?, ?, ?, ?, ?)');
        $sql->execute([
            $_POST['E-mail'],
            $_POST['Name'],
            $_POST['Nickname'],
            $_POST['Postcode'],
            $_POST['Addres'],
            $_POST['Phonenumber'],
            $flagValue,
            $_POST['Question'],
        ]);

        // PassテーブルのnicknameとUserテーブルのnicknameが一致する場合のidを取得する例
        $nickname = $_POST['Nickname'];
        $sql = $pdo->prepare('select user_id from User join Pass on User.nickname = Pass.nickname where Pass.nickname = ?');
        $sql->execute([$nickname]);
        $id = $sql->fetch(PDO::FETCH_COLUMN);

        // Passテーブルに挿入
        $sql = $pdo->prepare('insert into Pass (user_id, hash_pass, nickname) values (?,?,?)');
        $sql->execute([$id, $hashedPassword, $_POST['Nickname']]);

        // 登録が成功した場合、Top.php にリダイレクト
        header('Location: Top.php');
        exit();
    } else {
        // データが足りない場合の処理
        echo '<script>alert("データが不足しています。");</script>';
        echo '<a href="U_reg.php">データ入力画面に戻る</a><br>';
    }
} catch (PDOException $e) {
    // エラーハンドリング
    echo '<script>alert("データベースエラー")</script>' . htmlspecialchars($e->getMessage());
    echo '<a href="U_reg.php">データ入力画面に戻る</a><br>';
}
?>