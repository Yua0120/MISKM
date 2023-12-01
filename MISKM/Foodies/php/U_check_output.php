<?php session_start();?>
<?php require 'connect.php';?>
<?php
unset($_SESSION['User']);

if (isset($_POST['mail']) && isset($_POST['question'])) {
    try {
        $pdo = new PDO($connect, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare('SELECT * FROM User WHERE mail = ?');
        $result = $sql->execute([$_POST['mail']]);

        if ($result) {
            $row = $sql->fetch(PDO::FETCH_ASSOC);

            if ($row && strcmp($_POST['question'], $row['question']) == 0) {
                $_SESSION['User'] = [
                    'id' => $row['id'],
                    'mail' => $row['mail'],
                    'name' => $row['name'],
                    'zip_code' => $row['zip_code'],
                    'addres' => $row['addres'],
                    'tel_number' => $row['tel_number'],
                    'question' => $row['question']
                ];

                header("Location:./newpass.php");
                exit;
            } else {
                header("Location:./U_check_input.php?flag=fail");
                exit;
            }
        } else {
            echo "SQL エラー: " . $sql->errorInfo()[2];
            // エラーログや適切なエラーハンドリングを追加することが望ましい
        }
    } catch (PDOException $e) {
        echo "エラー: " . $e->getMessage();
        // エラーログや適切なエラーハンドリングを追加することが望ましい
    }
}
?>