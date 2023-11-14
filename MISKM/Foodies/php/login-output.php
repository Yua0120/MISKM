<?php
    session_start();
    require 'connect.php';
    unset($_SESSION['User']);
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('select * from Pass where nickname = ? and hash_pass = ?');
    $sql->execute([$_REQUEST['nickname'], $_REQUEST['password']]);
    foreach ($sql as $row) {
        $_SESSION['User'] = [
            'id' => $row['user_id'],
            'nickname' => $row['nickname'],
            'password' => password_hash($row['password'], PASSWORD_DEFAULT)
        ];
    }
    if (isset($_SESSION['User'])) {
        header("Location: ./Top.php");
        exit;
    } else {
        header("Location: ./login.php?flag=fail");
        exit;
    }
?>
