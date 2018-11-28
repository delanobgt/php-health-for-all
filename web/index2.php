<?php

require_once __DIR__.'/../config.php';
require_once __DIR__.'/../lib/http.php';
require_once __DIR__.'/../lib/layout.php';
require_once __DIR__.'/../lib/security.php';
require_once __DIR__.'/../lib/asset.php';
require_once __DIR__.'/../sql/idcard.php';
require_once __DIR__.'/../sql/setting.php';

if (isAuthenticated()){
    authorize('admin');
    $setting = getSetting();
    $sekolahArray = findAllSekolah();
    $sekolahGuruArray = findAllSekolahGuru();
    
    render('index.php',array('sekolahArray' => $sekolahArray,'setting' => $setting, 'sekolahGuruArray' => $sekolahGuruArray));

}
else{
    redirect(path('login.php'));
}
