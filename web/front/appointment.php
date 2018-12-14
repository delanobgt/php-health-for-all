<?php
    require_once __DIR__.'/../../config.php';
    require_once __DIR__.'/../../lib/http.php';
    require_once __DIR__.'/../../lib/layout.php';
    require_once __DIR__.'/../../lib/security.php';
    require_once __DIR__.'/../../lib/session.php';
    require_once __DIR__.'/../../lib/asset.php';
    require_once __DIR__.'/../../sql/doctor.php';
    require_once __DIR__.'/../../sql/patient.php';
    require_once __DIR__.'/../../sql/discussion.php';
    require_once __DIR__.'/../../sql/answer.php';
    require_once __DIR__.'/../../sql/comment.php';
    require_once __DIR__.'/../../sql/appointment.php';
    require_once __DIR__.'/../../sql/user.php';

    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $queryStrings = getQueryStrings();

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {    
        if (isset($queryStrings['page']) && $queryStrings['page'] === 'new') { 
            if (!isAuthenticated()) redirect(path('front/pre-login.php'));
            $email = getSession('email');
            $profile = getProfileByEmail($email);
            $doctor_id = $queryStrings['doctor_id'];
            $patient_id = $profile->id;
            render('front/appointment/new.php', array(
                'profile' => $profile,
                'doctor_id' => $doctor_id,
                'patient_id' => $patient_id
            ));
        } else {
            $email = getSession('email');
            $profile = getProfileByEmail($email);
            $patientMap = getPatientMap();
            $doctorMap = getDoctorMap();
            if ($profile->role === 'patient') {
                $appointments = findAppointmentByPatientId($profile->id);
                render('front/appointment/index.php', array(
                    'profile' => $profile,
                    'appointments' => $appointments,
                    'patientMap' => $patientMap,
                    'doctorMap' => $doctorMap
                ));
            } else if ($profile->role === 'doctor') {
                $appointments = findAppointmentByDoctorId($profile->id);
                render('front/appointment/index.php', array(
                    'profile' => $profile,
                    'appointments' => $appointments,
                    'patientMap' => $patientMap,
                    'doctorMap' => $doctorMap
                ));
            }
        }
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($queryStrings['page']) && $queryStrings['page'] === 'new') {
            $timestamp = $_POST['date']." ".$_POST['time'].":00";
            $todayDate = new Datetime();
            if (new Datetime($timestamp) < $todayDate) {
                addFlash('danger', "Appointment date invalid (past date)");
                redirect(path('front/appointment.php?page=new'));
            } else {
                addFlash('success', "New appointment created!");
                createAppointment($_POST['doctor_id'], $_POST['patient_id'], $_POST['symptom'], $timestamp);
                redirect(path('front/appointment.php'));
            }
        } else if (isset($queryStrings['page']) && $queryStrings['page'] === 'modify') {
            if ($_POST['submit'] === 'Approve') {
                addFlash('success', "Appointment approved!");
                approveAppointmentById($_POST['appointment_id'], $_POST['info']);
            } else if ($_POST['submit'] === 'Delete') {
                addFlash('success', "Appointment deleted!");
                deleteAppointmentById($_POST['appointment_id']);
            }
            redirect(path('front/appointment.php'));
        } else {
            redirect(path('front/appointment.php'));
        }
    }
?>