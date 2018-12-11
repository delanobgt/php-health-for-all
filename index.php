<?php
    require_once __DIR__.'/lib/routing.php';
    require_once __DIR__.'/lib/security.php';
    require_once __DIR__.'/lib/http.php';
    require_once __DIR__.'/sql/patient.php';
    require_once __DIR__.'/sql/doctor.php';
    require_once __DIR__.'/sql/user.php';

    redirect(path('front/index.php'));
?>