<?php
    require_once __DIR__.'/../../config.php';
    require_once __DIR__.'/../../lib/http.php';
    require_once __DIR__.'/../../lib/layout.php';
    require_once __DIR__.'/../../lib/security.php';
    require_once __DIR__.'/../../lib/asset.php';
    require_once __DIR__.'/../../lib/session.php';
    require_once __DIR__.'/../../sql/doctor.php';
    require_once __DIR__.'/../../sql/user.php';

    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $queryStrings = getQueryStrings();

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {    
        $doctors = findAllDoctorComplete();
        render('back/doctor.php', array(
            'doctors' => $doctors
        ));
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($_POST['submit'] === 'Delete') {
            deleteWholeDoctorById($_POST['doctor_id']);
            addFlash('success', "Doctor deleted!");
        } else if ($_POST['submit'] === 'Approve') {
            setApprovedDoctorById($_POST['doctor_id'], 1);
            addFlash('success', "Doctor Approved!");
        } else if ($_POST['submit'] === 'Disapprove') {
            setApprovedDoctorById($_POST['doctor_id'], 0);
            addFlash('success', "Doctor Disapproved!");
        }
        redirect(path('back/doctor.php'));
    }
?>