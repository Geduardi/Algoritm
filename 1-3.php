<?php

function add($a,$b){
    $result = [];
    $remain = false;
    if (count($a) >= count($b)){
        $count = count($a);
    } else {
        $count = count($b);
    }
    for ($i = 0; $i < $count; $i++){
        $result[$i] = $a[$i] + $b[$i];
        if ($remain){
            $result[$i]++;
            $remain = false;
        }
        if ($result[$i] > 9){
            $result[$i] -= 10;
            $remain = true;
        }
    }
    if ($remain){
        $result[$count] = 1;
    }
    return $result;
//    return strrev(implode('',$result));
}

function mult($a,$b){
    $result = [];
    $remain = 0;
    for ($i=0; $i<count($b); $i++){
        $temp = [];
        for ($j=0; $j<count($a); $j++){
            $temp[$j+$i] = $a[$j]*$b[$i];
            if ($remain){
                $temp[$i+$j]+=$remain;
                $remain=0;
            }
            while ($temp[$j+$i] > 9){
                $temp[$j+$i] -= 10;
                $remain++;
            }
        }
        if ($remain){
            $temp[$i+count($a)] +=$remain;
            $remain = 0;
        }
        $j = 0;
        while ($temp[$j] === null){
            $temp[$j++] = 0;
        }
        $result = add($result,$temp);
    }
    return $result;
}

function powNum($a,$n){
    $result = [];
    if ($n == 0){
        $result[] = 1;
    } elseif ($n == 1){
        $result = $a;
    } else {
        if ($n % 2 === 0){
            $result = powNum(mult($a,$a),$n/2);
        } else {
            $result = mult($a,powNum($a,$n-1));
        }
    }
    return $result;
}

function strToArray($str){
    $str = strrev(trim($str));
    $str = preg_split('//', $str, -1, PREG_SPLIT_NO_EMPTY);
    return $str;
}

function arrToStr($array){
    return strrev(implode('',$array));
}

$file = fopen('chisla.txt', 'r+');
$a = strToArray(fgets($file));
$b = strToArray(fgets($file));
$n = 5;
fputs($file,PHP_EOL . arrToStr(add($a,$b)));
fclose($file);
file_put_contents('otvet.txt',arrToStr(mult($a,$b)));
echo arrToStr(powNum($a,$n));
