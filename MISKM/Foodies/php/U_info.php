<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/template.css">
    <link rel="stylesheet" href="css/touroku.css">
    <title>ユーザー個人情報登録</title>
</head>
<body>
    <header class="header">
        <!-- ヘッダーロゴ -->
        <div class="logo" id="title">Foodies</div>
    </header>
    <center><h1>Sign up</h1></center>
    <form id="app" action="output.php" method="post"> <!-- actionをoutput.phpに変更 -->
        <div class="container">
            <div class="left-aligned-text">
                
                <!-- エラーメッセージを表示する部分を追加 -->
                <div v-if="errors.length > 0" class="error-messages">
                    <ul>
                        <li v-for="error in errors" :key="error">{{ error }}</li>
                    </ul>
                </div>

                <h4>Name</h4>
                <input v-model="name" type="text" name="Name" class="text">
                
                <h4>Nickname</h4>
                <input v-model="nicename" type="text" name="Nicename" class="text">

                <h4>Phone number</h4>    
                <input v-model="phoneNumber" type="text" size="30" placeholder="ハイフンなしで入力してください" name="Phonenumber" class="text">

                <h4>Post code</h4>    
                <input v-model="postCode" type="text" size="30" placeholder="ハイフンなしで入力してください" name="Postcode" class="text">

                <h4>Address</h4>
                <input v-model="address" type="text" size="40" placeholder="番地や部屋番号まで書いてください" name="Address" class="text"><br><br>
                
                <div class="bobo">
                    <button class="example" @click.prevent="submitForm"><span>Sign up</span></button>
                </div>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="../script/U_info.js"></script>
</body>
</html>