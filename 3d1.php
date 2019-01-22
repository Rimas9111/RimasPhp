<?php
// $a = 2;
// $b = 3;
// $c = 4;

// $max = 0;
// if ($a > $b){
//     if ($a > $c){
//         $max = $a;
//     } else {
//         $max = $c;
//     }
// } else {
//     if ($b > $c){
//         $max = $b;
//     } else {
//         $max = $c;
//     }
// }
// echo $max;


$randomNr = (rand(1,3));

if (isset($_POST["submit"])){
    $value = $_POST["box"];
    if ($value == $randomNr){
        echo "draw";       
    }else{
        if ($value == '1' and $randomNr == '2'){
           echo 'win';
        } elseif ($value == '2' and $randomNr == '3'){
            echo 'win';
        } elseif ($value == '3' and $randomNr == '1'){
            echo 'win';
        } else {
            echo "lost";
        }
    }
}
echo "<br>" . $value . " " . $randomNr; 
?>
<form method="POST" action="">
        <input type="radio" name="box" value="1" >Zirkles<br>
        <input type="radio" name="box" value="2" >Popierius<br>
        <input type="radio" name="box" value="3" >Sulnys<br>
    <input type="submit" name="submit" value="Play">   
</form>