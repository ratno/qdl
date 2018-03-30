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
                $item['url'] = substr($item['url'],stripos($item['url'],"api/uploads"));
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
                if(preg_match("/(api\/uploads)/",$item['url'])) {
                    $item['url'] = request()->getSchemeAndHttpHost() . "/" . $item['url'];
                }

                $out[] = $item;
            }
        }
        return $out;
    }
}

if (!function_exists('upload_store')) {
    function upload_store($table_name, $column_name)
    {
        $upload_file = $column_name. '_file';
        if (request()->file($upload_file)->isValid()) {
            $folder = "/$table_name/" . date("Y/m/d") . "/$column_name/";
            request()->$upload_file->store("uploads/" . $folder);

            return [
                "status" => "ok",
                "name" => request()->$upload_file->getClientOriginalName(),
                "path" => url("/api/uploads/" . str_replace("/", "____", $folder . request()->$upload_file->hashName()))
            ];
        } else {
            return [
                "status" => "error",
                "message" => "File gagal di-upload",
                "http_status_code" => 500
            ];
        }
    }
}

if (!function_exists('upload_read')) {
    function upload_read($filename)
    {
        $path = storage_path('app/uploads/' . str_replace("____", "/", $filename));

        if (!\File::exists($path)) abort(404);

        return $path;
    }
}
