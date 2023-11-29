<?php require 'header.php'?>
<link rel="stylesheet" href="../css/template.css">
<link rel="stylesheet" href="../css/touroku.css">
<title>ユーザー登録</title>
</head>
<body>
    <?php require 'FoodiesReturn.php'; ?>

    <center><h1>Sign up</h1></center>

    <div id="app">
    <form action="U_info.php" method="post">
        <div class="container">
            <div class="left-aligned-text">
        
                <h4>E-mail</h4>
                <input v-model="email" type="text" size="40" name="E-mail" class="text">
                <div v-if="isEmailError" class="error">無効なメール形式です</div>
    
                <h4>Pass word</h4>
                <input v-model="password1" type="password" size="30" placeholder="8文字以上16以下で入力してください" name="password" class="text">
                <div v-if="isLengthError" class="error">パスワードは8文字以上16文字以下で入力してください。</div>
    
                <h4>Pass word(confirmation)</h4>
                <input v-model="password2" type="password" size="30" placeholder="8文字以上16以下で入力してください" name="Pass2" class="text">
                <div v-if="isMatchError" class="error">パスワードが一致しません。</div>
            
                <h4>Security Question</h4>
                <input v-model="question" type="text" placeholder="卒業した小学校は？" name="Question" class="text">
                <div v-if="isQuestionError" class="error">秘密の質問を入力してください</div>
                <br><br>
                <div class="bobo">
                    <button class="example" onclick="location.href='U_info.php'"><span>Next</span></button>
                </div>
    
            </div>
        </div>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>
    <script src="../script/U_reg.js"></script>
</body>
</html>