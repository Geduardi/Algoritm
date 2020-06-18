<?php
$array = [1, 2 ,3, 4, 5, 6, 8, 9, 10, 11, 12, 13, 14, 15, 16];

function findMissedNumber($array,$indexIncrease = 0){
    if (end($array) - count($array) == 0){
        echo 'Нет пропущенных чисел';
        return;
    }
    $baseIndex = floor(count($array)/2);
    if ($array[$baseIndex] - $baseIndex  == 1 + $indexIncrease){
        if ($array[$baseIndex+1] - $baseIndex == 2 + $indexIncrease){
            $indexIncrease = $array[$baseIndex];
            $array = array_slice($array,$indexIncrease);
            findMissedNumber($array,$indexIncrease);
        } else {
            echo $array[$baseIndex]+1;
            return;
        }
    } else {
        if ($array[$baseIndex-1] - $baseIndex == 1 +$indexIncrease){
            $array = array_slice($array,0,$baseIndex);
            findMissedNumber($array,$indexIncrease);
        } else {
            echo $array[$baseIndex]-1;
            return;
        }
    }
}

findMissedNumber($array);