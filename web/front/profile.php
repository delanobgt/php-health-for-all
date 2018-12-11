<?php
    require_once __DIR__.'/../../config.php';
    require_once __DIR__.'/../../lib/http.php';
    require_once __DIR__.'/../../lib/routing.php';
    require_once __DIR__.'/../../lib/session.php';
    require_once __DIR__.'/../../lib/layout.php';
    require_once __DIR__.'/../../lib/security.php';
    require_once __DIR__.'/../../lib/asset.php';
    require_once __DIR__.'/../../sql/doctor.php';
    require_once __DIR__.'/../../sql/patient.php';
    require_once __DIR__.'/../../sql/user.php';

    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $queryStrings = getQueryStrings();
    $email = getSession('email');
    $profile = getProfileByEmail($email);

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {    
        if ($profile->role === 'doctor') {
            render('front/doctor/profile.php', array('profile' => $profile));
        } else if ($profile->role === 'patient') {
            render('front/patient/profile.php', array('profile' => $profile));
        }
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($profile->role === 'doctor') {
            addFlash('success', 'Profile updated!');
            updateDoctorById($profile->id, $_POST['name'], $_POST['age'], $_POST['specialist'], $_POST['gender'], htmlspecialchars($_POST['description']));
        } else if ($profile->role === 'patient') {
            addFlash('success', 'Profile updated!');
            updatePatientById($profile->id, $_POST['name'], $_POST['age'], $_POST['gender']);
        }
        redirect(path('front/profile.php'));
    }
?>