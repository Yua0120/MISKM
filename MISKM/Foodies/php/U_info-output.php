<?php
session_start();
require 'connect.php';

try {
    // データベース接続
    $pdo = new PDO($connect, USER, PASS);

    // PDOのエラーモードを例外に設定
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // POSTデータを取得
    $email = $_POST['E-mail'];
    $pass = $_POST['Pass2'];
    $question = $_POST['Question'];
    $name = $_POST['Name'];
    $nicename = $_POST['Nicename'];
    $phoneNumber = $_POST['Phonenumber'];
    $postCode = $_POST['Postcode'];
    $address = $_POST['Address'];

    // ユーザー情報を挿入するSQLクエリ
    $sql = $pdo->prepare("INSERT INTO user (email , name , nicename , zip_code , addres , tel_number , flag , question) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $sql->execute([$email, $name, $nicename, $postCode, $address, $phoneNumber, , $question]);

    // データベース接続をクローズ
    $pdo = null;

    // トップページにリダイレクト
    header("Location: Top.php");
    exit();
} catch (PDOException $e) {
    // エラーメッセージを表示して終了
    echo "Error: " . $e->getMessage();
}
?>