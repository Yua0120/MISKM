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
    }else{
        header("Location: ./login.php");
        exit;
    }

    /* パスワードをDBに挿入（更新） */
    if (isset($_SESSION['User']['password'])) {
        $id = $_SESSION['User']['user_id'];
        $sql = $pdo->prepare('update User set hash_pass=? where user_id=?');
        $sql->execute([password_hash($_POST['Pass1'], PASSWORD_DEFAULT), $id]);
        $_SESSION['User']['password'] = $_POST['Pass1'];
    }
}

header("Location: ./info_update-input.php");
exit;
?>