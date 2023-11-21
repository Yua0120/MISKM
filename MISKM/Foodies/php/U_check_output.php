<?php require 'connect.php';?>
<?php require 'header.php'; ?>
<form action="newpass.php">
<?php
unset($_SESSION['User']);
$pdo=new PDO($connect,USER,PASS);
$sql=$pdo->prepare('select * from User where mail=?');
$sql->execute([$_POST['mail']]);
foreach ($sql as $row){
    if(strcmp($_POST['mail'],$row['mail'] == 0)){
    $_SESSION['User']=[
        'id' =>$row['id'],'mail'=>$row['mail'],
        'name'=>$row['name'],'zip_code' => $row['zip_code'],
        'addres'=>$row['addres'],'tel_number'=>$row['tel_number'],
        'question'=>$row['question']];
    }
    
}
if(isset($_SESSION['User'])){
    echo '本人確認が完了しました<br>';
    echo 'Nextで新しいパスワードの設定画面に移動します';
}else {
    echo 'メールアドレスまたは秘密の質問が違います<br>';
    echo '戻るでもう一度やり直してください';
}
?>
<button type="submit">Next</button>
