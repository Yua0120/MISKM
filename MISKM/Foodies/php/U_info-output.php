<?php
session_start();
require 'connect.php';

var_dump($_POST);
try {
    if (isset($_POST['E-mail']) && isset($_POST['Name']) && isset($_POST['Nickname']) && isset($_POST['Postcode']) && isset($_POST['Addres']) && isset($_POST['Phonenumber']) && isset($_POST['Question']) && isset($_POST['password'])) {
        
        $pdo = new PDO($connect, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // ニックネームの重複確認
        $sql = $pdo->prepare('select * from User where nickname = ?');
        $sql->execute([$_POST['Nickname']]);
        $existingUser = $sql->fetch(PDO::FETCH_ASSOC);

        // ユーザーが存在し、かつ他の情報も一致する場合
        if ($existingUser &&
            $existingUser['mail'] == $_POST['E-mail'] &&
            $existingUser['name'] == $_POST['Name'] &&
            $existingUser['zip_code'] == $_POST['Postcode'] &&
            $existingUser['addres'] == $_POST['Addres'] &&
            $existingUser['tel_number'] == $_POST['Phonenumber'] &&
            $existingUser['question'] == $_POST['Question']
        ) {
            echo '<script>alert("ユーザーが既に存在します。");</script>';
        } else {
            // ユーザーが存在しない場合、新規登録
            $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // 住所が登録される場合、flag を 1 に設定
            $flagValue = isset($_POST['Addres']) ? 1 : '';

            // 正しいSQLクエリを使用
            $sql = $pdo->prepare('insert into User (mail, name, nickname, zip_code, addres, tel_number, flag, question, password) values (?, ?, ?, ?, ?, ?, ?, ?, ?)');
            $sql->execute([
                $_POST['E-mail'],
                $_POST['Name'],
                $_POST['Nickname'],
                $_POST['Postcode'],
                $_POST['Addres'],
                $_POST['Phonenumber'],
                $flagValue,
                $_POST['Question'],
                $hashedPassword
            ]);
            $sql = $pdo->prepare('update User set hash_pass=? where user_id=?');
            $sql->execute([$hashedPassword],[$id]);

            // 登録が成功した場合、Top.php にリダイレクト
            header('Location: Top.php');
            exit();
        }
    } else {
        // データが足りない場合の処理
        echo '<script>alert("データが不足しています。");</script>';
    }
} catch (PDOException $e) {
    // エラーハンドリング
    echo 'データベースエラー: ' . $e->getMessage();
}
?>