<?php
$pdo = new PDO ($connect,USER,PASS);
$sql=$pdo->prepare('select * from Product where id=?');
$sql->execute([$_GET['id'].'-L']);
foreach($sql as $row){
    $id = $row['id'];

    echo '<div class="shohin-detail">';
    echo '<div class="carousel">';
    //スライドのリスト
    echo '<div class="contains">';
    //スライドを選択するためのラジオボタンリスト。
    //数は増減しても構わないです。 最初は1番目を選択状態(checked)にします。-->';
    //Slide各ラジオボタンに個別のidを定義して、nameはすべて同じ値にします。
    echo '<input class="slide_select" type="radio" id="SlideA" name="slide_check" checked />';
    echo '<input class="slide_select" type="radio" id="SlideB" name="slide_check" />';
    //スライド
    //上のラジオボックスと同じ数だけ記述します。-->';
    echo '<div class="slide">';
    //スライドの前へ、次へとスクロールさせるボタン
    echo '<div class="scroll_controler">';
    //前へボタン forで戻る先のラジオボタンのidを書きます。-->';
    //先頭要素なので、最後のスライドのidである"SlideB"を書いています。
    echo '<label class="scroll_button scroll_prev" for="SlideB"></label>';
    //次へボタン 上と同様にforで進む先のラジオボタンのidを書きます。-->';
    //進み先は2番目の要素なので、2番目のスライドのid"SlideB"を書いています。
    echo '<label class="scroll_button scroll_next" for="SlideB"></label>';
    echo '</div>';
    //スライドの内容（ここでは画像）を記述します。
    //div要素に変えれば文字を加えることもできます。
    $imagePath = $row['image'];
    
    // "front"を"back"に置換
    $newImagePath1 = str_replace("back", "front", $imagePath);

    if (file_exists("../../img/" . $newImagePath1)) {
        echo '<img src="/MISKM/img/',$newImagePath1 ,'" class="shohin-img" alt="Image">';
    } else {
        echo '<div class="back-nai">';
        echo '前面は無地です';
        echo '</div>';
    }
    echo '</div>';
    //スライド（2番目）内容は1個めと同じ
    echo '<div class="slide">';
    echo '<div class="controler_scroll">';
    echo '<label class="scroll_button scroll_prev" for="SlideA"></label>';
    echo '<label class="scroll_button scroll_next" for="SlideA"></label>';

    //backの画像があれば画像表示なければ背面無地とかく
    // 画像が存在するか確認して表示
    
    // "front"を"back"に置換
    $newImagePath2 = str_replace("front", "back", $imagePath);

    if (file_exists("../../img/" . $newImagePath2)) {
        echo '</div>';
        echo '<img src="/MISKM/img/',$newImagePath2 ,'" class="shohin-img" alt="Image">';
        echo '</div>';
    } else {
        echo '</div>';
        echo '<div class="back-nai">';
        echo '背面は無地です';
        echo '</div>';
        echo '</div>';
    }

    //スライド移動用ボタン
    echo '<div class="move_controler">';
    //1個目のスライドのボタン
    //一番上のラジオボタンの1個目のスライドのid”A”をforに定義します-->';
    echo '<label class="button_move" for="SlideA"></label>';
    echo '<label class="button_move" for="SlideB"></label>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '<div class="shohin-name">';
    echo $row['name'];
    echo '</div>';
    echo '<div class="shohin-money">';
    echo '￥',$row['price'];
    echo '</div>';
}
?>