<?php
    session_start();
    require 'connect.php';
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('insert into Post(user_id,product_name,image_path,comment) values (?,?,?,?)');
    $success=$sql->execute([$_SESSION['User']['id'],$_POST['product_name'],$_POST['image_path'],$_POST['comment']]);
    if($success){
        header("Location: ./Top.php");
        exit;
    }else if(isset($_SESSION['User'])){
        header("Location: ./C_post-input.php?flag=none");
        exit;
    }else{
        header("Location: ./C_post-input.php?flag=fail");
        exit;
    }
?>
