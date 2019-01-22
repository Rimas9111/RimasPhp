<form method="POST" action="">
    <input type="number" name="money" require>Eur<br>
    <input type="number" name="month" require>Month<br>
    <input type="number" name="percent" require>Percent<br>
    <input type="submit" name="count">   
</form>

<?php

$x = $_POST['money'];
$y = $_POST['month'];
$z = $_POST['percent'];

if (isset($_POST['count'])){
    $answer = ($x * $y + ($x * $y) * $z/1200 *$y);
    echo $answer;
}
?>