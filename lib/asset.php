<?php
    function assetPath($path) {
        return $GLOBALS['assetDirectory'].$path;
    }

    function css($path) {
        return assetPath('css/'.$path);
    }

    function font($path) {
        return assetPath('fonts/'.$path);
    }

    function files($path) {
        return assetPath('files/'.$path);
    }

    function js($path) {
        return assetPath('js/'.$path);
    }

    function img($path) {
        return assetPath('images/'.$path);
    }
?>