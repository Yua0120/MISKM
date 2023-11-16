
<?php require 'header.php'?>
    <link rel="stylesheet" href="./css/centerYoo.css">
    <link rel="stylesheet" href="./css/template.css">
    <link rel="stylesheet" href="./css/newpass.css">
    <title>新しいパスワード</title>
</head>
<?php require 'FoodiesTitle.php' ?>

<div id="app">            
    <br><br><br>
        <div class="container">
        <div class="left-aligned-text">
        <div class="login-input">

            New PassWord
            <input type="password"  class="in" name="new_pass" id="new_password" v-model="pass" placeholder="8文字以上16文字以下で入力してください"><br>
            <p v-if="isInValidPass" class="error">
                8文字以上16文字以下で入力してください。</p>

         <p><input type="password" class="in" name="new_pass2" id="new_password" v-model="pass2" placeholder="もう一度パスワードを入力してください"></p>
            <p v-if="isInValidPassW" class="error">
                パスワードが一致していません。確認してください。</p>

        <div class="login-button">
            <p><button class="example" type="submit" name="login"><span>Login</span></button></p>
        </div>

        </div>
        </div>
        </div>    
</div>

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="./script/newpass.js"></script>

</body>
</html> 
