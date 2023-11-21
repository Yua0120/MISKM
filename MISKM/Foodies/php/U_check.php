<?php require 'header.php';?>

    <link rel="stylesheet" href="../css/template.css">
    <link rel="stylesheet" href="../css/U_check.css">
    <title>本人確認画面</title>
</head>
<?php require 'FoodiesTitle.php';?>
    <form action="newpass.html">
        <div class="main">
            <p>
              User ID
              <input type="text" class="text1" name ="UserId" id="UserId">
            </p>
            <p>
               秘密の質問
               <input type="text" class="text2"name="question" id="question" placeholder="卒業した小学校名を入力してください">
            </p>
         </div>
         <button type="submit" >Next</button>
    </form>
</body>
</html>