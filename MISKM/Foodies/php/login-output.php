<?php session_start(); ?>
<?php require 'connect.php'; ?>
<?php
    unset($_SESSION['customer']);
    $pdo = new PDO($connect,USER,PASS);
    $sql = $pdo -> prepare('select * from User where nickname = ? and password = ?');
    $sql -> execute([$_REQUEST['login'],$_REQUEST['password']]);
    foreach($sql as $row){
        $_SESSION['customer'] = [
            'id' => $row['id'], 'name' => $row['name'],
            'address' => $row['address'], 'login' => $row['login'],
            'password' => password_hash($row['password'],PASSWORD_DEFAULT)];
    }
    if (isset($_SESSION['customer'])) {
        echo 'いらっしゃいませ、', $_SESSION['customer']['name'],'さん。';
    }else{
        echo 'ログイン名またはパスワードが違います。';
    }
?>
<?php require 'footer.php'; ?>