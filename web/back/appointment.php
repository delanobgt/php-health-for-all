<?php
    require_once __DIR__.'/../../config.php';
    require_once __DIR__.'/../../lib/http.php';
    require_once __DIR__.'/../../lib/layout.php';
    require_once __DIR__.'/../../lib/security.php';
    require_once __DIR__.'/../../lib/session.php';
    require_once __DIR__.'/../../lib/asset.php';
    require_once __DIR__.'/../../sql/doctor.php';
    require_once __DIR__.'/../../sql/patient.php';
    require_once __DIR__.'/../../sql/appointment.php';
    require_once __DIR__.'/../../sql/user.php';

    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $queryStrings = getQueryStrings();

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {    
        $appointments = findAllAppointment();
        $patientMap = getPatientMap();
        $doctorMap = getDoctorMap();
        render('back/appointment.php', array(
            'appointments' => $appointments,
            'patientMap' => $patientMap,
            'doctorMap' => $doctorMap
        ));
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($_POST['submit'] === 'Delete') {
            addFlash('success', "Appointment deleted!");
            deleteAppointmentById($_POST['appointment_id']);
        }
        redirect(path('back/appointment.php'));
    }
?>