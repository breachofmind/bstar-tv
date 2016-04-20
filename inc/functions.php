<?php

function base_path($path="")
{
    return BASE_PATH.$path;
}

function public_path($path="")
{
    return base_path('public'.DS.$path);
}

function load_class($class)
{
    require(base_path('src'.DS.$class.".php"));
}

function dd($var)
{
    var_dump($var);
    exit();
}

function view($name,$data=[])
{
    ob_start();
    foreach ($data as $prop=>$value) {
        $$prop = $value;
    }
    include(base_path('assets'.DS.'views'.DS.$name.".php"));
    return ob_get_clean();
}