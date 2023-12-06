<?php
    session_start();
    if(!isset($_SESSION['User'])){
        header("Location: ./C_post-input.php?flag=none");
        exit;
    }else{
        require 'connect.php';
        $pdo = new PDO($connect, USER, PASS);
        //アップロードされた画像の一時的な保管場所のアドレス(テンポラリファイル)のパス'tmp_file'を取得
        $tmp_path = $_FILES['image_path']['tmp_name'];
        // 画像の保存先フォルダと保存先のファイル名
        $img_folder = __DIR__.'/../../post_img/';//画像の保存先フォルダ
        $img_filename = uniqid() . '_' . basename($_FILES['image_path']['name']);//アップロードされた画像の名前を一意的なものに変更
        $img_path = $img_folder . $img_filename;//アップロードされた画像の最終的なパスを取得
        move_uploaded_file($tmp_path, $img_path);//画像をpost_imgに保存する
        //product_idの作成
        $product_id_name = str_replace(' ', '', $_POST['product_name']);
        $product_id = $product_id_name . '-' . $_POST['size'];
        echo $product_id;
        $sql = $pdo->prepare('insert into Post(user_id,product_id,product_size,image_path,comment) values (?,?,?,?,?)');
        $success = $sql->execute([$_SESSION['User']['id'], $product_id, $_POST['size'],$img_path, $_POST['comment']]);
        if ($success) {
            header("Location: ./Top.php");
            exit;
        } else {
            header("Location: ./C_post-input.php?flag=fail");
            exit;
        }
    }
?>
