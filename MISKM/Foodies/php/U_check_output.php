<?php require 'connect.php';?>
<?php require 'header.php'; ?>
<form action="newpass.php">
<?php
unset($_SESSION['User']);
$pdo=new PDO($connect,USER,PASS);
$sql=$pdo->prepare('select * from User where mail=?');
$sql->execute([$_POST['mail']]);
foreach ($sql as $row){
    if((strcmp($_POST['mail'],$row['mail'] == 0)) && (strcmp($_POST['question'],$row['question']))){
    $_SESSION['User']=[
        'id' =>$row['id'],'mail'=>$row['mail'],
        'name'=>$row['name'],'zip_code' => $row['zip_code'],
        'addres'=>$row['addres'],'tel_number'=>$row['tel_number'],
        'question'=>$row['question']];
    }
    
}
if(isset($_SESSION['User'])){
    header("Location:./newpass.php");
    exit;
}else {
    header("Location:./U_check_output.php?flag=fail");
    exit;
}
?>
<!--<button type="submit">Next</button>-->