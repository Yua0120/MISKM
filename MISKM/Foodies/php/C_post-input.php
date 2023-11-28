<?php require 'header.php' ?>
<link rel="stylesheet" href="../css/template.css">
<link rel="stylesheet" href="../css/coordinate.css">
<title>CoordinatePost.html</title>
</head>
<?php require 'FoodiesMenu.php' ?>

<form action="C_post-output.php" method="post">
    <div class="container">
        <label id="upload-wrapper" for="upload">
            <!--acceptで画像ファイルのみ投稿可能と指定 -->
            <p onclick="fileUpload()">+</p>
            <input type="file" name="image_path" onchange="previewFile(this);" id="image_path" accept="image/*">
            <img id="preview">
        </label>
        <p>購入商品<input type="text" name="product_name" id="pro_name"></p>
        <p>サイズ
            <select name="size" id="pro_size">
                <option value="XS">XS</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
            </select>
        </p>
        <p class="suport">Comment</p>
        <textarea name="comment" id="review" cols="50" rows="10"></textarea>
        <p class="suport">URL</p>
        <textarea name="url" id="another_link" cols="50" rows="3">画像内の他サイトの商品リンクを掲載してください。</textarea>
        <button type="submit">投稿</button>
    </div>
</form>

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
    function fileUpload(){
        document.getElementById("image_path").click();
    }
</script>
<div class="post-fail">
    <?php
    // $_GET['flag']がセットされているか確認
    if (isset($_GET['flag']) && $_GET['flag'] == 'fail') {
        echo '<p class="error">コーディネートの投稿に失敗しました。もう一度入力してください。</p>';
    } else if (isset($_GET['flag']) && $_GET['flag'] == 'none') {
        echo '<p class="error">セッションが無効です。ログインしなおしてください。</p>';
    }
    ?>
</div>

</html>