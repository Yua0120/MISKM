<?php require 'header.php'?>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <link rel="stylesheet" href="./css/centerYoo.css">
    <link rel="stylesheet" href="./css/template.css">
    <link rel="stylesheet" href="./css/newpass.css">
    <title>新しいパスワード</title>
</head>
<?php require 'FoodiesTitle.php' ?>
<?php
    echo '<div id="app">';
    echo '<form action="newpass-output.php">';        
    echo '<br><br><br>';
    echo '<div class="container">';
    echo '<div class="left-aligned-text">';
    echo '<div class="login-input">';

        echo 'New PassWord';
        echo '<input type="password"  class="in" id="new_password" v-model="password" @input="checkInput" placeholder="8文字以上16文字以下で入力してください"><br>';
        echo '<p><input type="password" class="in" id="new_password" v-model="confirmPassword" @input="checkInput" placeholder="もう一度パスワードを入力してください"></p>';

        echo '<p v-if="isError" class="error">エラー: {{ errorMessage }}</p>';

        echo '<div class="login-button">';
            echo '<p><button class="example" type="submit"><span>Login</span></button></p>';
        echo '</div>';

    echo  '</div>';
    echo  '</div>';
    echo  '</div>';    
    echo  '</form>';
    echo  '</div>';
?>
</body>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="./script/newpass.js"></script>
</html> 
