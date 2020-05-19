<?php

if (!function_exists('asset_with_version')) {
    function asset_with_version($path = null, $secure = null)
    {
        static $version = null;
        if (!$version) {
            if (file_exists(base_path() . '/version.txt')) {
                $version = file_get_contents(base_path() . '/version.txt');
                $version = $version == time() ? $version : time();
            } else {
                $version = time();
            }
        }

        if (strpos($path, '?') !== false) {
            $path .= '&v=' . $version;
        } else {
            $path .= '?v=' . $version;
        }
        return asset($path, $secure);
    }
}

function hello_world() {
    echo 'hello world';
}
