<?php
$array = [2, 6, 7, 8,[6,8,'5g'],6,[1,['k6']],'h'];


function sum($array, $sum = 0){
    echo $sum.'<br>';
    if(is_array($array)){
        foreach ($array as $elem){
            $sum += sum($elem);
        }
    }elseif(is_integer($array)){
        $sum += $array;       
    }

    return $sum;
}

echo sum($array);
?>