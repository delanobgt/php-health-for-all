<?php
    require_once __DIR__.'/../../sql/user.php';
    require_once __DIR__.'/../../lib/http.php';
    require_once __DIR__.'/../../lib/session.php';
    require_once __DIR__.'/../../lib/routing.php';
    require_once __DIR__.'/../../lib/layout.php';
    require_once __DIR__.'/../../lib/security.php';

    if (!isAuthenticated()) {
        redirect(path('back/admin_auth.php?page=login'));
    } else if (getProfileByEmail(getSession('email'))->role !== 'admin') {
        redirect(path('front/index.php'));
    } else {
        render('back/index.php', array());
    }
    
?>