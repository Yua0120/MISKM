<?php session_start()?>
<?php require 'header.php';?>
<?php require 'connect.php'; ?>
<?php 
    $pdo = new PDO($connect,USER,PASS);
    if(isset($_SESSION['User'])){
        $id=$_SESSION['User']['id'];
<<<<<<< Updated upstream
        $sql=$pdo->prepare('select * from Customer where id != ? and nickname = ?');
        $sql->execute([$id, $_POST['Nickname']]);
    }else{
        $sql=$pdo->prepare('select * from Customer where nickname = ?');
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
=======
        $sql=$pdo->prepare('select * from Customer where id != ? and login = ?');
        $sql->execute([$id, $_POST['login']]);
    }else{
        $sql=$pdo->prepare('select * from Customer where login = ?');
        $sql->execute([$_POST['login']]);
    }
    if(empty($sql->fetchAll())){
        if (isset($_SESSION['customer'])) {
            $sql=$pdo->prepare('update Customer set name = ?, address= ?, login = ?, password = ? where id = ?');
            $sql->execute([
                $_POST['name'],$_POST['address'],$_POST['login'],password_hash($_POST['password'],PASSWORD_DEFAULT),$id
            ]);
            $_SESSION['customer'] = [
                'id' => $id, 'name' => $_POST['name'],
                'address' => $_POST['address'], 'login' => $_POST['login'],
                'password' => password_hash($_POST['password'],PASSWORD_DEFAULT)];
            echo 'お客様情報を更新しました。';
        }else{
            $sql=$pdo->prepare('insert into Customer values(null,?,?,?,?)');
            $sql->execute([
                $_POST['name'],$_POST['address'],$_POST['login'],password_hash($_POST['password'],PASSWORD_DEFAULT)
            ]);
            echo 'お客様情報を登録しました。';
>>>>>>> Stashed changes
        }
    }else{
        echo 'ログイン名が既に使用されていますので、変更してください。';
    }    
<<<<<<< Updated upstream
?>
=======
?>
<?php require 'footer.php'; ?>
>>>>>>> Stashed changes
