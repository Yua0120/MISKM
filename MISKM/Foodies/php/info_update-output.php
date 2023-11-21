<?php session_start()?>
<?php require 'connect.php'; ?>
<?php 
    $pdo = new PDO($connect, USER, PASS);
    $id = isset($_SESSION['User']['id']) ? $_SESSION['User']['id'] : null;
    
    try {
        $sql = $pdo->prepare('select * from User where id != ? and nickname = ?');
        $sql->execute([$id, $_POST['nickname']]);
        // 下のifは同じニックネームが歩かないかのチェック
        if ($sql->rowCount() == 0) {
            if ($id) {
                //　ここは登録してあるユーザーデータを更新する処理
                $sql = $pdo->prepare('update User set name = ?, nickname = ?, addres = ?, tel_number = ?, zip_code = ? where id = ?');
                $sql->execute([
                    $_POST['name'], $_POST['nickname'], $_POST['address'], $_POST['phonenumber'], $_POST['postcode'], $id
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
                $sql = $pdo->prepare('insert into User(id, name, nickname, addres, tel_number, zip_code) values (null,?,?,?,?,?)');
                $sql->execute([
                    $_POST['name'], $_POST['nickname'], $_POST['address'], $_POST['phonenumber'], $_POST['postcode']
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
