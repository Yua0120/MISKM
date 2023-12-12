<?php
    session_start();
    require 'connect.php';
    unset($_SESSION['Master']); // セッションの初期化
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('select * from Pass where nickname = ?');
    $sql->execute([$_REQUEST['nickname']]);
    foreach ($sql as $row) {
            if(password_verify($_REQUEST['password'],$row['hash_pass']) == true){
            $_SESSION['Master'] = [
                'id' => $row['user_id'],
                'nickname' => $row['nickname']
            ];
        }
    }
    if (isset($_SESSION['Master'])) {
        header("Location: ./U_look.php");
        exit;
    } else {
        header("Location: ./login.php?flag=fail");
        exit;
    }
?>