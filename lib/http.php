<?php

function redirect($path) {
    header('Location: '.$path);
    die(); 
}

function accessDenied($message = '') {
    header('HTTP/1.1 401 Unauthorized');
    include __DIR__.'/../layout/admin/401.php';
    exit();
}
