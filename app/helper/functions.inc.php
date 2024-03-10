<?php

function dd($data)
{
    die(var_dump($data));
}
function old($collection, $key, $default_value = "")
{
    //the partial values which are correct toh woh udar hi rehne ka
    return trim(isset($collection[$key]) ? $collection[$key] : $default_value);
}
function redirect($url)
{
    header("Location:$url");
}
function getCurrentTimeInMillis(): int
{
    return round(microtime(true) * 1000);
}
