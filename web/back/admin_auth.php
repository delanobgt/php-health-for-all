<?php
    require_once __DIR__.'/../../config.php';
    require_once __DIR__.'/../../sql/user.php';
    require_once __DIR__.'/../../sql/admin.php';
    require_once __DIR__.'/../../lib/http.php';
    require_once __DIR__.'/../../lib/layout.php';
    require_once __DIR__.'/../../lib/security.php';
    require_once __DIR__.'/../../lib/session.php';
    require_once __DIR__.'/../../lib/asset.php';

    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $queryStrings = getQueryStrings();

    // $adminId = createAdmin('The Only Admin');
    // createUser('admin@admin.com', 'admin', 'admin', $adminId);

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {    
        if ($queryStrings['page'] === 'login') {
            render('back/login.php');
        } else {
            redirect(path('front/index.php'));
        }
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($queryStrings['page'] === 'login') {
            if (authenticate($_POST['email'], $_POST['password'])) {
                addFlash('success', "Login success!");
                redirect(path('back/index.php'));
            } else {
                addFlash('danger', "Login failed!");
                redirect(path('back/admin_auth.php?page=login'));
            }
        } else {
            redirect(path('front/index.php'));
        }
    }
?>