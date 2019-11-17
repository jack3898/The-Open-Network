<?php

spl_autoload_register('autoLoad');

function autoLoad($name){
    $path = 'classes/';
    $ext = '.class.php';
    $full = $path . $name . $ext;

    if(!file_exists($full)){
        return false;
    }

    include_once $full;
}