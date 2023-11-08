<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'connect.php'; ?>
<?php
    unset($_SESSION['User']);
    $pdo = new PDO($connect,USER,PASS);
    $sql = $pdo -> prepare('select * from User where nickname = ? and password = ?');
    $sql -> execute([$_REQUEST['nickname'],$_REQUEST['password']]);
    foreach($sql as $row){
        $_SESSION['User'] = [
            'id' => $row['id'], 'nickname' => $row['nickname'],
            'address' => $row['address'], 'login' => $row['login'],
            'password' => password_hash($row['password'],PASSWORD_DEFAULT)];
    }
    if (isset($_SESSION['User'])) {
        header( "Location: ./Top.php" ) ;
	    exit ;
    }else{
        echo 'ログイン名またはパスワードが違います。';
    }
?>