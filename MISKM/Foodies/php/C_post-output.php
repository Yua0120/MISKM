<?php
    session_start();
    if(!isset($_SESSION['User'])){
        header("Location: ./C_post-input.php?flag=none");
        exit;
    }else{
        require 'connect.php';
        $pdo = new PDO($connect, USER, PASS);
        $product_id = $_POST['product_name'] . '-' . $_POST['product_size'];
        $sql = $pdo->prepare('insert into Post(user_id,product_id,product_size,image_path,comment) values (?,?,?,?,?)');
        $success = $sql->execute([$_SESSION['User']['id'], $product_id, $_POST['image_path'], $_POST['comment']]);
        if ($success) {
            header("Location: ./Top.php");
            exit;
        } else {
            header("Location: ./C_post-input.php?flag=fail");
            exit;
        }
    }
?>
