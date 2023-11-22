<?php
// output.php

// データベース接続情報
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "your_dbname";

try {
    // データベースに接続
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // PDOのエラーモードを例外に設定
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // POSTデータを取得
    $name = $_POST['Name'];
    $nicename = $_POST['Nicename'];
    $phoneNumber = $_POST['Phonenumber'];
    $postCode = $_POST['Postcode'];
    $address = $_POST['Address'];

    // データベースにユーザー情報を挿入
    $stmt = $conn->prepare("INSERT INTO users (name, nicename, phone_number, post_code, address) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$name, $nicename, $phoneNumber, $postCode, $address]);

    // データベース接続をクローズ
    $conn = null;

    // トップページにリダイレクト（例：Top.php）
    header("Location: Top.php");
    exit();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>