<?php session_start(); ?>
<?php require 'header.php' ;?>
<?php require 'connect.php' ;?>
<link rel="stylesheet" href="../css/template.css">
<link rel="stylesheet" href="../css/header.css">
<link rel="stylesheet" href="../css/top.css">
<title>Top</title>
</header>
<?php require 'FoodiesMenu.php' ;?>
    <!--商品検索機能-->
    <div class="search-box">
        <form action="Top.php" method="post">
            <input type="text" name="keyword" placeholder="search" class="search">
        </form>
    </div>

    <!--絞り込み機能-->
    <div class="narrow-box">
        <form action="Top.php" method="post">
            <label for="priceFilter">金額絞り込み：</label>
                <select name="priceFilter" id="priceFilter">
                    <option value="">絞り込まない</option>
                    <option value="6000">6000円以下</option>
                    <option value="8000">8000円以下</option>
                    <option value="10000">10000円以下</option>
                    <!-- 必要に応じて他の金額帯を追加 -->
                </select>
            <input type="submit" value="絞り込む">
        </form>
    </div>

    <!--タイムセール-->
    <?php require 'timesale.php'?>
    <!--商品一覧-->
    <?php
    $pdo = new PDO($connect, USER, PASS);

    // 金額の絞り込みとキーワード検索の判定
    if (isset($_POST['priceFilter']) && !empty($_POST['priceFilter'])) {
        $selectedPrice = intval($_POST['priceFilter']);
        $sql = "SELECT * FROM Product  WHERE size = 'L' && price <= :selectedPrice";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':selectedPrice', $selectedPrice, PDO::PARAM_INT);
        $stmt->execute();
        $filteredProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } elseif (isset($_POST['keyword']) && !empty($_POST['keyword'])) {
        $keyword = '%' . $_POST['keyword'] . '%';
        $sql = $pdo->prepare('SELECT * FROM Product WHERE size="L" && name LIKE ?');
        $sql->execute([$keyword]);
        $filteredProducts = $sql->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $sql = $pdo->query('SELECT DISTINCT REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(id,"-S",""),"-M",""),"-L",""),"-XL",""),"-XS","") ID,name,price,image,stocks,good_counts FROM `Product`;');
        $filteredProducts = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    foreach ($filteredProducts as $row) {
        $id = $row['ID'];
        echo '<div class="shohin">';
        echo '<a href="P_detail-input.php?id=', $id, '">';
        echo '<img src="/MISKM/img/',$row['image'], '" class="shohin-img">';
        echo '</a>';
        echo '<div class="shohin-item">';
        echo '<div class="shohin-item-name">';
        echo $row['name']; 
        echo '</div>';
        echo '￥', $row['price'], ' JPY';
        echo '</div>';
        echo '</div>';
    }
?>
</html>
