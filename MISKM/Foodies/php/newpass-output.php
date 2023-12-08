<?php
session_start();
require 'connect.php';

$pdo = new PDO($connect, USER, PASS);

// フォームが送信されたときの処理
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 新しいパスワードを取得
    $newPass = $_POST['newpass1'];

    // フォームの入力検証（空でないか、適切なフォーマットかなどを確認）
    if (empty($newPass)) {
        die('エラー: 新しいパスワードを入力してください。');
    }

    // パスワードのハッシュ化
    $hashedpass = password_hash($newPass, PASSWORD_DEFAULT);

    // ユーザーIDの取得（セッションによる例）
    $id = isset($_SESSION['User']['id']) ? $_SESSION['User']['id'] : null; // セッションの構造に合わせて修正

    // セッションからIDが取得できない場合はエラーとして終了
    if (!$id) {
        die('エラー: ユーザーIDが取得できません。');
    }

    // 適切なテーブルに対して更新
    $sql = $pdo->prepare('UPDATE Pass SET hash_pass = ? WHERE user_id = ?');
    $sql->execute([$hashedpass, $id]);

    // ユーザーが存在する場合はTop.phpにリダイレクト
    if (isset($_SESSION['User'])) {
        header("Location: ./Top.php");
        exit;
    } else {
        header("Location: ./login.php?flag=fail");
        exit;
    }
}
?>
