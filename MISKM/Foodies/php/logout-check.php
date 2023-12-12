<?php require 'header.php';?>
    <link rel="stylesheet" href="../css/touroku.css">
    <link rel="stylesheet" href="../css/header.css">
    <title>logout</title>
</head>
<body>
    <?php require 'FoodiesTitle.php' ?>

        <br><br>
        <center><h2>Are you sure you want to logout?</h2></center>
        <br><br>
        <div class="bobo">
            <button class="baba" onclick="location.href='logout-end.php'"><span>OK</span></button>
            <div class="space"></div>
            <button class="example" onclick="location.href='javascript:history.back();'"><span>←Back</span></button>
        </div>
</body>
</html>