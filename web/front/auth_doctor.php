<?php
    require_once __DIR__.'/../../config.php';
    require_once __DIR__.'/../../lib/http.php';
    require_once __DIR__.'/../../lib/layout.php';
    require_once __DIR__.'/../../lib/security.php';
    require_once __DIR__.'/../../lib/asset.php';
    require_once __DIR__.'/../../sql/doctor.php';
    require_once __DIR__.'/../../sql/user.php';

    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $queryStrings = getQueryStrings();

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {    
        if ($queryStrings['page'] === 'login') {
            render('front/login_doctor.php');
        } else if ($queryStrings['page'] === 'signup') {
            render('front/signup_doctor.php');
        }
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($queryStrings['page'] === 'login') {
            if (authenticate($_POST['email'], $_POST['password'])) {
                redirect(path('front/index.php'));
            } else {
                redirect(path('front/auth_doctor.php?page=login'));
            }
        } else if ($queryStrings['page'] === 'signup') {
            $doctorId = createDoctor($_POST['name'], $_POST['age'], $_POST['specialist'], $_POST['gender']);
            if ($doctorId && 
                createUser($_POST['email'], $_POST['password'], 'doctor', $doctorId) &&
                authenticate($_POST['email'], $_POST['password'])) {
                    redirect(path('front/index.php'));
            } else {
                redirect(path('front/auth_doctor.php?page=signup'));
            }
        }
    }
?>