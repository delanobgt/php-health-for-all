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
        if (isset($queryStrings['id'])) {
            $doctor = findDoctorById($queryStrings['id']);
            render('front/doctor/detail.php', array('doctor' => $doctor));
        } else {
            $doctors = findAllDoctor();
            $email = getSession('email', '');
            $profile = getProfileByEmail($email);
            render('front/doctor/index.php', array(
                'doctors' => $doctors,
                'profile' => $profile
            ));
        }
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
    }
?>