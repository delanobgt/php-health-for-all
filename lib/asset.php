<?php

    require_once __DIR__.'/../config.php';

    function asset($path) {
        return $GLOBALS['assetDirectory'].$path;
    }

    function css($path) {
        return asset('css/'.$path);
    }
    function font($path) {
        return asset('fonts/'.$path);
    }

    function files($path) {
        return asset('files/'.$path);
    }

    function js($path) {
        return asset('js/'.$path);
    }

    function img($path) {
        return asset('images/'.$path);
    }

?>