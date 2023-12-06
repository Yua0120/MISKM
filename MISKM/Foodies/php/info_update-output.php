<?php session_start()?>
<?php require 'connect.php'; ?>
<?php 
    $pdo = new PDO($connect, USER, PASS);
    $id = isset($_SESSION['User']['id']) ? $_SESSION['User']['id'] : null;
    
    try {
        $sql = $pdo->prepare('select * from User where id != ? and nickname = ?');
        $sql->execute([$id, $_POST['nickname']]);
        //アップロードされた画像の一時的な保管場所のアドレス(テンポラリファイル)のパス'tmp_file'を取得
        $tmp_path = $_FILES['image_path']['tmp_name'];
        // 画像の保存先フォルダと保存先のファイル名
        $img_folder = $img_folder = __DIR__ . '../../icon_img/';//画像の保存先フォルダ
        $img_filename = uniqid() . '_' . basename($_FILES['image_path']['name']);//アップロードされた画像の名前を一意的なものに変更
        $img_path = $img_folder . $img_filename;//アップロードされた画像の最終的なパスを取得
        move_uploaded_file($tmp_path, $img_path);//画像をicon_imgに保存する
        // 下のifは同じニックネームがあるかないかのチェック
        if ($sql->rowCount() == 0) {
            if ($id) {
                //　ここは登録してあるユーザーデータを更新する処理
                $sql = $pdo->prepare('update User set name = ?, nickname = ?, addres = ?, tel_number = ?, zip_code = ? ,flag = 1, icon_image_path = ? where id = ?');
                $sql->execute([
                    $_POST['name'], $_POST['nickname'], $_POST['address'], $_POST['phonenumber'], $_POST['postcode'],$img_path, $id
                ]);
                $_SESSION['User'] = [
                    'id' => $id, 'name' => $_POST['name'],
                    'nickname' => $_POST['nickname'], 'addres' => $_POST['address'],
                    'tel_number' => $_POST['phonenumber'], 'zip_code' => $_POST['postcode'],
                ];
                header("Location: ../Top.html");
                exit;
            } else {
                //　ここは詳細なユーザーデータを登録してなかった人のデータを挿入する処理
                $sql = $pdo->prepare('insert into User(id, name, nickname, addres, tel_number, zip_code, flag, icon_image_path) values (null,?,?,?,?,?,1,?)');
                $sql->execute([
                    $_POST['name'], $_POST['nickname'], $_POST['address'], $_POST['phonenumber'], $_POST['postcode'],$img_path
                ]);
                header("Location: ../Top.html");
                exit;
            }
        } else {
            // nicknameが重複しているとき
            header("Location: ../info_update-input.php?flag=rename");
            exit;
        }
    } catch (PDOException $e) {
        // エラーハンドリング
        die("Error: " . $e->getMessage());
    }
?>
