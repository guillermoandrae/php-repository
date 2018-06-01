<?php

if (!function_exists('dd')) {
    function dd($expression)
    {
        var_dump($expression);
        exit;
    }
}
