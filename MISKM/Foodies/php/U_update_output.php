<?php session_start();?>
<?php require 'connect.php'; ?>
<?php
$pdo = new PDO($connect, USER, PASS);

/* メールアドレスをDBに挿入（更新） */
if (isset($_SESSION['User'])) {
    $id = $_SESSION['User']['id'];
    $sql = $pdo->prepare('select * from User where id != ? and mail = ?');
    $sql->execute([$id, $_POST['Email']]);
} else {
    $sql = $pdo->prepare('select * from User where mail = ?');
    $sql->execute([$_POST['Email']]);
}

if (empty($sql->fetchAll())) {
    if (isset($_SESSION['User'])) {
        $sql = $pdo->prepare('update User set mail=? where id=?');
        $sql->execute([$_POST['Email'], $id]);
        $_SESSION['User']['mail'] = $_POST['Email'];
    }

    /* パスワードをDBに挿入（更新） */
    if (isset($_SESSION['Pass'])) {
        $id = $_SESSION['Pass']['user_id'];
        $sql = $pdo->prepare('update User set hash_pass=? where user_id=?');
        $sql->execute([$_POST['Pass1'], $id]);
        $_SESSION['Pass']['hash_pass'] = $_POST['Pass1'];
    }
}

header("Location: ./info_upddatte-input.php");
exit;
