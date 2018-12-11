<?php

    require_once __DIR__.'/../../config.php';
    require_once __DIR__.'/../../lib/http.php';
    require_once __DIR__.'/../../lib/layout.php';
    require_once __DIR__.'/../../lib/asset.php';
    require_once __DIR__.'/../../lib/security.php';
    require_once __DIR__.'/../../lib/session.php';
    require_once __DIR__.'/../../sql/user.php';

    if (isAuthenticated()) {
        $email = getSession('email');
        $profile = getProfileByEmail($email);
        if ($profile->role === 'admin') {
            redirect(path('back/index.php'));
        } else {
            render('front/index.php');    
        }
    } else {
        render('front/index.php');
    }
    
    // $email = getSession('email');
    // $profile = getProfileByEmail($email);
    // render('front/index.php', array(
    //     'profile' => $profile
    // ));
    
?>