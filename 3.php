<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="get">
    <input type="text" name="input">
</form>
</body>
</html>
<?php

if (!empty($_GET['input'])){
    if (correctBrackets($_GET['input'])){
        echo "Правлиьно";
    } else echo "Не правильно";
}

function correctBrackets($input){
    $input = preg_replace('/[^(){}\[\]\'\"`]/','',$input);
    echo $input . "<br>";
    $brackets = str_split($input);
    $stack = new SplStack();
    $map = [']' => '[', ')' => '(', '}' => '{'];
    $closing = array_keys($map);
    foreach ($brackets as $bracket){
        if (!in_array($bracket,$closing)){
            $stack->push($bracket);
        } else{
            if ($stack->isEmpty()){
                return false;
            }
            $stack->pop();
        }
    }
    return $stack->isEmpty();
}


