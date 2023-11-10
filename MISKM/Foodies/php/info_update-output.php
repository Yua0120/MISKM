<?php session_start()?>
<?php require 'header.php';?>
<?php require 'connect.php'; ?>
<?php 
    $pdo = new PDO($connect,USER,PASS);
    if(isset($_SESSION['User'])){
        $id=$_SESSION['User']['id'];
        $sql=$pdo->prepare('select * from User where id != ? and nickname = ?');
        $sql->execute([$id, $_POST['nickname']]);
    }else{
        $sql=$pdo->prepare('select * from User where nickname = ?');
        $sql->execute([$_POST['nickname']]);
    }
    if(empty($sql->fetchAll())){
        if (isset($_SESSION['User'])) {
            $sql=$pdo->prepare('update User set name = ?, nickname= ?, address = ?, tel_number = ?, zip_code = ? where id = ?');
            $sql->execute([
                $_POST['name'],$_POST['nickname'],$_POST['address'],$_POST['phonenumber'],$_POST['postcode'],$id                
            ]);
            $_SESSION['User'] = [
                'id' => $id, 'name' => $_POST['name'],
                'nickname' => $_POST['nickname'], 'address' => $_POST['address'],
                'tel_number'=> $_POST['phonenumber'],'zip_code' => $_POST['postcode'],
            ];
            header("Location: ../Top.html");
            exit;
        }else{
            $sql=$pdo->prepare('insert into User values(null,?,?,?,?,?)');
            $sql->execute([
                $_POST['name'],$_POST['nickname'],$_POST['address'], $_POST['phonenumber'],$_POST['postcode']
            ]);
            header("Location: ../Top.html");
            exit;
        }
    }else{
        echo 'ログイン名が既に使用されていますので、変更してください。';
    }    
?>
