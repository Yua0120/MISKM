<?php session_start();?>
<?php require 'connect.php'; ?>
<?php
 $pdo = new PDO($connect,USER,PASS);
 /*メールアドレスをDBに挿入（（更新）*/
 if(isset($_SESSION['User'])){
    $id=$_SESSION['customer']['id'];
    $sql=$pdo->prepare('select * from User where id!= ? and nickname=?');
    $sql->execute([$id,$_POST['nickname']]);
 }else{
    $sql=$pdo->prepare('select * from User where nickname?');
    $sql->execute([$_POST['nickname']]);
 }
 if(empty($sql->fetchAll())){
    if(isset($_SESSION['User']))
    $sql=$pdo->prepare('update User set mail=? where=id?');
    
    $sql->execute([
        $_POST['Email']]);
        $_SESSION['User']=[
            'id'=>$id,'mail'=>$_POST['Email']]
} 
        
/*パスワードをDBに挿入（更新）*/ 
if(isset($_SESSION['Pass'])){
    $id=$_SESSION['Pass']['user_id'];
    $sql=$pdo->prepare('select * from User where user_id!= ? and hash_pass=?');
    $sql->execute([$id,$_POST['Pass1']]);
 }else{
    $sql=$pdo->prepare('select * from User where nickname?');
    $sql->execute([$_POST['Pass1']]);
 }
 if(empty($sql->fetchAll())){
    if(isset($_SESSION['Pass']))
    $sql=$pdo->prepare('update User set hash_pass=? where=user_id?');
    
    $sql->execute([
        $_POST['Pass1']]);
        $_SESSION['Pass']=[
            'hash_pass'=>$_POST['Pass1']]
} 
header("Location:./info_upddatte_input.php");
exit;