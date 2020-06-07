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
    echo maxDelitel((int)$_GET['input']);
}

function maxDelitel($number){
    if ($number === 1){
        $result = 1;
    } else $result = 2;
    while (!($number % 2)){
        $number /= 2;
    }

    for ($i = 3; $i<sqrt($number);$i+=2){
        while (!($number % $i)){
            $number /= $i;
        }
    }

    if ($result<$number){
        $result = $number;
    }

    return $result;
}

