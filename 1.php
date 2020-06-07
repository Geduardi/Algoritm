<?php

if (!empty($_GET['path'])){
    renderPath($_GET['path']);
} else{
    renderPath('/');
}

function renderPath($path){
    $dir = new DirectoryIterator(realpath($path));
    foreach ($dir as $item){
        if ($item->isDot()){
            if ($item == '..'){
                echo "<a href='?path={$item->getPathname()}'>Back</a><br>";
            }
            continue;
        };
        if ($item->isDir()){
            echo "<a href='?path={$item->getPathname()}'>{$item}</a><br>";
        } else{
            echo "{$item}<br>";
        }
    }
}