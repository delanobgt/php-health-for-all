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
        $patients = findAllPatientComplete();
        render('back/patient.php', array(
            'patients' => $patients
        ));
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($_POST['submit'] === 'Delete') {
            deleteWholePatientById($_POST['patient_id']);
            addFlash('success', "Patient deleted!");
        } else if ($_POST['submit'] === 'Ban') {
            setBanPatientById($_POST['patient_id'], 1);
            addFlash('success', "Patient banned!");
        } else if ($_POST['submit'] === 'Unban') {
            setBanPatientById($_POST['patient_id'], 0);
            addFlash('success', "Patient unbanned!");
        }
        redirect(path('back/patient.php'));
    }
?>