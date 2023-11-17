<?php require 'header.php' ?>
<link rel="stylesheet" href="../css/centerYoo.css">
<link rel="stylesheet" href="../css/template.css">
<title>CoordinatePost.html</title>
</head>
<?php require 'FoodiesMenu.php' ?>

<form action="C_browsing.php" method="post">
    <div class="container">
        <input type="file" name="test" onchange="previewFile(this);">
        <br>
        <p>購入商品<input type="text" name="product_name" id="pro_name"></p>
        <p>購入商品
            <select name="size" id="pro_size">
                <option value="">XS</option>
                <option value="">S</option>
                <option value="">M</option>
                <option value="">L</option>
                <option value="">XL</option>
            </select>
        </p>
        <p class="suport">comment</p>
        <textarea name="comment" id="review" cols="50" rows="10"></textarea>
        <br>
        <p class="suport">URL</p>
        <textarea name="url" id="another_link" cols="50" rows="3">画像内の他サイトの商品リンクを掲載してください。</textarea>
        <br>
        <button type="submit">投稿</button>
    </form>
    <img id="preview">
 
  <script>
  function previewFile(hoge){
    var fileData = new FileReader();
    fileData.onload = (function() {
      //id属性が付与されているimgタグのsrc属性に、fileReaderで取得した値の結果を入力することで
      //プレビュー表示している
      document.getElementById('preview').src = fileData.result;
    });
    fileData.readAsDataURL(hoge.files[0]);
  }
  </script>
    <div class="post-fail">
        <?php
        // $_GET['flag']がセットされているか確認
        if (isset($_GET['flag']) && $_GET['flag'] == 'fail') {
            echo '<p class="error">コーディネートの投稿に失敗しました。もう一度入力してください。</p>';
        }
        ?>
    </div>
    <div class="login-button">
        <!--login-output側でTop.phpに飛ばしてる！-->
        <p><button class="example" type="submit" name="login"><span>Login</span></button></p>

    </div>

</body>
</html>