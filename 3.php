<?php

function render($cols,$rows){
    $beginCol = 0;
    $beginRow = 0;
    $endCol = $cols;
    $endRow = $rows;
    $array = [];
    $count = 1;
    $size = $cols * $rows;
    while ($beginCol < $endCol || $beginRow < $endRow){
        for ($col = $beginCol; $col < $endCol; $col++){
            $array[$beginRow][$col] = $count++;
        }

        if ($count > $size){
            break;
        }

        for ($row = $beginRow+1; $row < $endRow; $row++){
            $array[$row][$endCol-1] = $count++;
        }

        if ($count > $size){
            break;
        }

        for ($col = $endCol-2; $col >= $beginCol; $col--){
            $array[$endRow-1][$col] = $count++;
        }

        if ($count > $size){
            break;
        }

        for ($row = $endRow-2; $row > $beginRow; $row--){
            $array[$row][$beginCol] = $count++;
        }
        
        $beginRow++;
        $endCol--;
        $endRow--;
        $beginCol++;
    }
    for ($i=0;$i<$rows;$i++){
        for ($j=0;$j<$cols;$j++){
            echo $array[$i][$j].' ';
        }
        echo PHP_EOL;
    }
}


render(5,3);


