<?php
session_start();
require 'connect.php';

$pdo = new PDO($connect, USER, PASS);
$id = isset($_SESSION['User']['id']) ? $_SESSION['User']['id'] : null;

try {
    $sql = $pdo->prepare('select * from User where id != ? and nickname = ?');
    $sql->execute([$id, $_POST['nickname']]);

    // アップロードされた画像の一時的な保管場所のアドレス'tmp_file'を取得
    $tmp_path = $_FILES['image_path']['tmp_name'];

    // 画像の保存先フォルダと保存先のファイル名
    $img_folder = '../../img/icon_img/'; // 画像の保存先フォルダ
    $img_filename = uniqid() . '_' . basename($_FILES['image_path']['name']); // 画像の名前を一意に変更
    $img_path = $img_folder . $img_filename; // 画像の最終的なパスを取得
    move_uploaded_file($tmp_path, $img_path); // 画像をicon_imgに保存する

    // 入力値が空でないことを確認してから代入
    $updateName = isset($_POST['name']) ? $_POST['name'] : null;
    $updateNickname = isset($_POST['nickname']) ? $_POST['nickname'] : null;
    $updateAddress = isset($_POST['address']) ? $_POST['address'] : null;
    $updateTelNumber = isset($_POST['phonenumber']) ? $_POST['phonenumber'] : null;
    $updateZipCode = isset($_POST['postcode']) ? $_POST['postcode'] : null;

    $sql = $pdo->prepare('update User set 
        name = COALESCE(?, name), 
        nickname = COALESCE(?, nickname), 
        addres = COALESCE(?, addres), 
        tel_number = COALESCE(?, tel_number), 
        zip_code = COALESCE(?, zip_code), 
        flag = 1, 
        icon_image_path = COALESCE(?, icon_image_path)
        where id = ?');

    $sql->execute([$updateName, $updateNickname, $updateAddress, $updateTelNumber, $updateZipCode, $img_filename, $id]);

    $_SESSION['User'] = [
        'id' => $id, 'name' => $updateName,
        'nickname' => $updateNickname, 'addres' => $updateAddress,
        'tel_number' => $updateTelNumber, 'zip_code' => $updateZipCode,
    ];

    header("Location: ./Top.php");
    exit;
} catch (PDOException $e) {
    // エラーハンドリング
    die("Error: " . $e->getMessage());
}
?>