<?php require 'header.php';?>
    <link rel="stylesheet" href="../css/hamburger.css">
    <link rel="stylesheet" href="../css/U_update.css">
    <title>ユーザー情報更新</title>
</head>
<?php require 'FoodiesMenu.php' ;?>
<?php 
    if(isset($_SESSION['User'])){
        $Email=$_SESSION['User']['mail'];
    }else{
        $Email = '';
    }
    if(isset($_SESSION['User']['password'])){
        $Pass1=$_SESSION['User']['password'];
        $Pass2=$_SESSION['User']['password'];
    }else{
        $Pass1 = $Pass2 = '';
    }
    echo '<center><h1>Up Date</h1></center>';
    echo '<form action="U_update_output.php" method="post">';
    echo  '<div class="container">';
    echo '<div class="left-aligned-text">';
    echo '<h4>E-mail</h4>';
    echo '<input type="text" size="30" name="Email" class="text" value="',$Email,'">';
    
    echo '<h4>Pass word</h4>';
    echo '<input type="password" size="30"  placeholder="8文字以上16以下で入力してください" name="Pass1" class="text" value="',$Pass1,'">';
     
    echo '<h4>Pass word(confirmation)</h4>';
    echo '<input type="password" size="30" placeholder="8文字以上16以下で入力してください" name="Pass2" class="text" value="',$Pass2,'"><br><br>';    
    echo '<div class="bobo">';
    echo '<button  type="submit" class="example"><span>Next</span></button>';
    echo '</div>';
    echo '</div>';
    echo '</div>';  
    echo '</body>';
    echo '</html>';
    ?>
<?php require 'footer.php' ;?>