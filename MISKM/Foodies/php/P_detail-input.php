<?php session_start(); ?>
<?php require 'header.php'?>
<?php require 'connect.php'?>
<?php require 'return.php'?>
<link rel="stylesheet" href="../css/template.css">
<link rel="stylesheet" href="../css/header.css">
<link rel="stylesheet" href="../css/P_detail.css">
<title>商品詳細</title>
</header>
<?php require 'Foodiesall.php' ?>
<?php
    $pdo = new PDO ($connect,USER,PASS);
    $sql=$pdo->prepare('select * from Product where id=?');
    $sql->execute([$_GET['id']]);
    foreach($sql as $row){
        $id = $row['id'];
?>
    <?php require_once 'slide.php'?>
    <div shohin-size-number-box>
        <div class="size-box">
            <select name="size" id ="size">
                <option value="XS">XS</option>
                <option value="S">S</option>
                <option value="M">M<option>
                <option value="L">L</option>
                <option value="XL">XL<option>
            </select>
        </div>
        
        <div id="app" class="number-box">
            <button @click="decrement" class="number-button" id="button">-</button>
            <p class="number-button">{{ count }}</p>
            <button @click="increment" class="number-button" id="button">+</button>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="/MISKM/Foodies/script/P_detail.js"></script>
    </div>

        <div class="size-img-box">
        <img src="/MISKM/img/size-kakunin.jpg" class="size-img">
        </div>

        <div class="description-text-box">
        <input type="text" placeholder="Description Of Item" class="description-text">
        </div>

        <div class="cart-button-box">
        <button type="submit" class="cart-button">Add to cart</button>
        </div>
        </form>
    <?php
    }
    ?>
</body>
</html>