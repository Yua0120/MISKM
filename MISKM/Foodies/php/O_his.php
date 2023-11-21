<?php require 'header.php';?>
<?php require 'connect.php';?>
    <title>注文履歴</title>
</head>
<body>
    <p>注文履歴</p>
    <!--スクロールの設定　お試し-->
    <div style="width: 100%; height: 100px; overflow-y: scroll; border: 1px #999999 soild;">
    <?php
    $pdo = new PDO($connect,USER,PASS);
    $sql = $pdo->preapare('select from history where id=?');
    $sql -> execute([$_GET['id']]);
      foreach($sql as $row){
       echo '<p>',$row['data'],'</p>';
       /*商品名　配達状況　<a href="S_sttus.html">▶</a></p>*/
      }
      ?>
    </div>
</body>
</html>