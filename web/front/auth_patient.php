<?php
    require_once __DIR__.'/../../config.php';
    require_once __DIR__.'/../../lib/http.php';
    require_once __DIR__.'/../../lib/layout.php';
    require_once __DIR__.'/../../lib/security.php';
    require_once __DIR__.'/../../lib/asset.php';
    require_once __DIR__.'/../../lib/session.php';
    require_once __DIR__.'/../../sql/patient.php';
    require_once __DIR__.'/../../sql/user.php';

    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $queryStrings = getQueryStrings();

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {    
        if ($queryStrings['page'] === 'login') {
            render('front/login_patient.php');
        } else if ($queryStrings['page'] === 'signup') {
            render('front/signup_patient.php');
        }
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($queryStrings['page'] === 'login') {
            $authStatus = authenticate($_POST['email'], $_POST['password']);
            if ($authStatus) {
                addFlash('success', 'Login successfull!');
                redirect(path('front/index.php'));
            } else if (is_null($authStatus)) {
                addFlash('danger', 'Account doesn\'t exist!');
                redirect(path('front/auth_patient.php?page=login'));
            } else {
                addFlash('danger', 'Account banned/not approved!');
                redirect(path('front/auth_patient.php?page=login'));
            }
        } else if ($queryStrings['page'] === 'signup') {
            if (hasUserByEmail($_POST['email'])) {
                addFlash('danger', 'Duplicate email!');
                redirect(path('front/auth_patient.php?page=signup'));
            }

            $patientId = createPatient($_POST['name'], $_POST['age'], $_POST['gender']);
            if ($patientId && 
                createUser($_POST['email'], $_POST['password'], 'patient', $patientId) &&
                authenticate($_POST['email'], $_POST['password'])) {
                    addFlash('success', 'Signup successful!');
                    redirect(path('front/index.php'));
            } else {
                addFlash('danger', 'Signup failed!');
                redirect(path('front/auth_patient.php?page=signup'));
            }
        }
    }
?>