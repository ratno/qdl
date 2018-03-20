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
    function comment($comment="")
    {
        return new \QDL\Comment($comment,false);
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

if (!function_exists('prepare_file_column_save')) {
    function prepare_file_column_save($value)
    {
        $out = [];
        if(count($value)) {
            foreach($value as $item) {
                $item['url'] = substr($item['url'],stripos($item['url'],"api/upload"));
                $out[] = $item;
            }
        }
        return json_encode($out);
    }
}

if (!function_exists('prepare_file_column_read')) {
    function prepare_file_column_read($value)
    {
        $array = json_decode($value,true);
        $out = [];
        if($array) {
            foreach ($array as $item) {
                // check kalau urlnya
                if(preg_match("/(api\/upload)/",$item['url'])) {
                    $item['url'] = request()->getSchemeAndHttpHost() . "/" . $item['url'];
                }

                $out[] = $item;
            }
        }
        return $out;
    }
}
