<?php session_start()?>
<?php require 'header.php';?>
    <link rel="stylesheet" href="../css/template.css">
    <link rel="stylesheet" href="../css/touroku.css">
    <title>ユーザー個人情報更新確認</title>
</head>
    <?php
        require 'FoodiesTitle.php';
        $name=$nickname=$address=$tel_number=$zip_code='';
        if(isset($_SESSION['User'])){
            $name=$_SESSION['User']['name'];
            $nickname=$_SESSION['User']['nickname'];
            $address=$_SESSION['User']['address'];
            $tel_number=$_SESSION['User']['tel_number'];
            $zip_code=$_SESSION['User']['zip_code'];
        }
    ?>
    <center><h1>Up Date</h1></center>
    <?php
        echo '<form action="info_update-output.php" method="post">';
        echo '<div class="container">';
        echo '<div class="left-aligned-text">';
        echo '<div id="circle" onload="img_hiddon()">';
        echo '<p onclick="fileUpload()">+</p>';
        echo '<input type="file" name="image_path" onchange="previewFile(this);" id="image_path" accept="image/*">';
        echo '</div>  <!--プロフィール画像の仮だよ！-->';// ここの画像をアップロードできるようにする！
        echo '<img id="preview">';
        echo '<h4>Name</h4>';
        echo '<input type="text" name="name" class="text">';
        echo '<h4>Nickname</h4>';
        echo '<input type="text" name="nickname" class="text">';
        echo '<h4>Phone number</h4>';
        echo '<input type="text" size="30" placeholder="ハイフンなしで入力してください" name="phonenumber" class="text">';
        echo '<h4>Post code</h4>';
        echo '<input type="text" size="30" placeholder="ハイフンなしで入力してください" name="postcode" class="text">';
        echo '<h4>Address</h4>';
        echo '<input type="text" size="40" placeholder="番地や部屋番号まで書いてください" name="address" class="text"><br><br>';
        echo '<div class="bobo">';
        echo '<button class="example"><span>Up Date</span></button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</form>';
    ?>
    <div class="update-fail">
        <?php
        // $_GET['flag']がセットされているか確認(セットされてると、ニックネームかぶってるからやり直し)
        if (isset($_GET['flag']) && $_GET['flag'] == 'rename') {
            echo '<p class="error">そのニックネームは既に使用されています。</p>';
        }
        ?>
    </div>
    <script>
        function previewFile(hoge) {
        var fileData = new FileReader();
        fileData.onload = (function () {
            //id属性が付与されているimgタグのsrc属性に、fileReaderで取得した値の結果を入力することで
            //プレビュー表示している
            document.getElementById('preview').src = fileData.result;
        });
        fileData.readAsDataURL(hoge.files[0]);
    }
        function img_hiddon() {
            document.getElementById("preview").style.display = "none";
        }
        function fileUpload(){
            document.getElementById("image_path").click();
            document.getElementById("circle").style.display ="none";
            document.getElementById("preview").style.display = "block";
        }
    </script>
</body>
</html>