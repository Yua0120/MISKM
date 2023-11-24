<?php require 'header.php'; ?>
<link rel="stylesheet" href="../css/template.css">
<link rel="stylesheet" href="../css/touroku.css">
<title>ユーザー個人情報登録</title>
</head>
<body>
    <?php require 'FoodiesTitle.php'; ?>

    <center><h1>Sign up</h1></center>
    <div id="app">
        <form @submit.prevent="submitForm" action="U_info-output.php" method="post">
            <div class="container">
                <div class="left-aligned-text">
                    
                    <h4>Name</h4>
                    <input v-model="name" type="text" name="Name" class="text">
                    <div v-if="isNameError" class="error">名前を入力してください</div>
                    
                    <h4>Nickname</h4>
                    <input v-model="nicename" type="text" name="Nicename" class="text">
                    <div v-if="isNicenameError" class="error">ニックネームを入力してください</div>

                    <h4>Phone number</h4>    
                    <input v-model="phoneNumber" type="text" size="30" placeholder="ハイフンなしで入力してください" name="Phonenumber" class="text">
                    <div v-if="isPhoneNumberError" class="error">正しい電話番号を入力してください</div>

                    <h4>Post code</h4>    
                    <input v-model="postCode" type="text" size="30" placeholder="ハイフンなしで入力してください" name="Postcode" class="text">
                    <div v-if="isPostCodeError" class="error">正しい郵便番号を入力してください</div>

                    <h4>Address</h4>
                    <input v-model="address" type="text" size="40" placeholder="番地や部屋番号まで書いてください" name="Addres" class="text">
                    <div v-if="isAddressError" class="error">番地や部屋番号を入力してください</div>
                    <br><br>

                    <div class="bobo">
                        <button class="example" type="submit"><span>Sign up</span></button>
                    </div>

                    <input type="hidden" name="E-mail" value="<?= $_POST['E-mail'] ?>">
                    <input type="hidden" name="password" value="<?= $_POST['Pass2'] ?>">
                    <input type="hidden" name="Question" value="<?= $_POST['Question'] ?>">
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="../script/U_info.js"></script>
</body>
</html>