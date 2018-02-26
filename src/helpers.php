<?php
if (!function_exists('from_camel_case')) {
    function from_camel_case($str)
    {
        $str[0] = strtolower($str[0]);
        $func = function ($c) {
            return "_" . strtolower($c[1]);
        };
        return preg_replace_callback('/([A-Z])/', $func, $str);
    }
}

if (!function_exists('comment')) {
    function comment($comment)
    {
        return new \QDL\Comment($comment);
    }
}

if (!function_exists('read_comment')) {
    function read_comment($comment,$index=null) {
        $objComment = new \QDL\Comment($comment,true);
        if(is_null($index)) {
            return $objComment;
        } else {
            return $objComment->getByIndex($index);
        }
    }
}