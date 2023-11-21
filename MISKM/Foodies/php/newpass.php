<?php require 'header.php'?>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <link rel="stylesheet" href="../css/centerYoo.css">
    <link rel="stylesheet" href="../css/template.css">
    <link rel="stylesheet" href="../css/newpass.css">
    <title>新しいパスワード</title>
</head>
<?php require 'FoodiesTitle.php' ?>

<h1>Choice is yours</h1>

<div id="app">
    <form action="newpass-output.php" method="post" @submit.prevent="submitForm">    
        <br><br><br>
        <div class="container">
        <div class="left-aligned-text">
        <div class="login-input">

            <div class="aa">New Password<br></div>
            <input type="password" class="in" v-model="password" size="13" @input="checkInput" placeholder="8文字以上16文字以下で入力してください"><br>                <div v-if="isLengthError" class="error">パスワードは8文字以上16文字以下で入力してください。</div>
                    
            <div class="aa">Confirm Password<br></div>
            <input type="password" class="in" v-model="confirmPassword" size="13" @input="checkInput" placeholder="もう一度パスワードを入力してください"><br>
            <div v-if="isMatchError" class="error">パスワードが一致しません。</div>

            <div class="login-button">
                <p><button class="example" type="submit"><span>Login</span></button></p>
            </div>

        </div>
        </div>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="../script/newpass.js"></script>
</body>
</html>