<?php require 'connect.php';?>
<?php require 'header.php';?>
    <title>発送状況</title>
</head>
<?php require 'FoodiesTitle.php';?>
<?php
  $pdo=new PDO($connect,USER,PASS);
  $sql=$pdo->prepare('select * from User where id=?');
  foreach($sql as $row){
    $id = $row['id'];
  }
    <p>商品名
        サイズ
        〇個 <br>
        〇〇〇〇円
    </p>
    <p>
        受注しました<br>
        発送準備中<br>
        発送しました
    </p>
</body>
</html>