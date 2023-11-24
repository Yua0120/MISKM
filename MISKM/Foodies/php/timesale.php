<!--タイムセール-->
<?php
if (date("H") >= 18 and date("H") <= 21) {
    echo "<div class='time-sale-box'>";
    echo "<img src='/MISKM/img/time_sale.jpg' class='time-sale'>";    
    echo "</div>";
} else{
    echo "";
}
?>