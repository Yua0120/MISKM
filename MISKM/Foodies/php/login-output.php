<?php
    session_start();
    require 'connect.php';
    unset($_SESSION['User']); // セッションの初期化
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('select * from Pass where nickname = ?');
    $sql->execute([$_REQUEST['nickname']]);
    foreach ($sql as $row) {
            if(password_verify($_REQUEST['password'],$row['hash_pass']) == true){
        $_SESSION['User'] = [
            'id' => $row['user_id'],
            'nickname' => $row['nickname'],
            'password' => $row['hash_pass']
        ];
            }
    }
    if (isset($_SESSION['User'])) {
        header("Location: ./Top.php");
        exit;
    } else {
        header("Location: ./login.php?flag=fail");
        exit;
    }
?>