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

function slide($path) {
    return $GLOBALS['host'].'/uploads/slide/'.$path;
}

function foto($path) {
    return $GLOBALS['host'].'/uploads/foto/'.$path;
}
function foto_siswa($path) {
    return $GLOBALS['host'].'/uploads/siswa/'.$path;
}
function foto_staf($path) {
    return $GLOBALS['host'].'/uploads/staf/'.$path;
}

function fotosiswa($filename) {
    $webPath = $GLOBALS['host'].'/uploads/siswa/'.$filename;
    $localPath = $GLOBALS['rootDirectory'].'/uploads/siswa/'.$filename;
    if (file_exists($localPath)  && !is_null($filename)) {
        return $webPath;
    }

    return img('siswa/usersiswa.png');
}


function download($filename) {
    return $GLOBALS['host'].'/uploads/'.$filename;
}
