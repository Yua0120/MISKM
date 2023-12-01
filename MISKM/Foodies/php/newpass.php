<?php require 'header.php'?>
    <link rel="stylesheet" href="../css/centerYoo.css">
    <link rel="stylesheet" href="../css/template.css">
    <link rel="stylesheet" href="../css/newpass.css">
    <title>新しいパスワード</title>
</head>
<body>
<?php require 'FoodiesTitle.php' ?>

<h1>Choice is yours</h1>

<h2>本人確認が完了しました</h2><br>

<div id="app">
    <form action="newpass-output.php" method="post" @submit.prevent="submitForm">    
        <div class="container">
        <div class="left-aligned-text">
        <div class="login-input">

            New Password<br>
            <input type="password" class="in" v-model="password" size="13" @input="checkInput" name="newpass1" placeholder="8文字以上16文字以下で入力してください"><br>
            <div v-if="isLengthError" class="error">パスワードは8文字以上16文字以下で入力してください。</div>
                    
            Confirm Password<br>
            <input type="password" class="in" v-model="confirmPassword" size="13" @input="checkInput" name="newpass2" placeholder="もう一度パスワードを入力してください"><br>
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