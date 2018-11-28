<?php

require_once __DIR__.'/../config.php';
require_once __DIR__.'/../lib/http.php';
require_once __DIR__.'/../lib/security.php';
require_once __DIR__.'/../lib/routing.php';

if (isset($_POST['submit'])) {

    if (authenticate($_POST['username'], $_POST['password'],$_SERVER['REMOTE_ADDR'])) {
        redirect(path('index.php'));
    } else {
        addFlash('error', 'Username atau password anda salah.');
    }
}

redirect(path('login.php'));
