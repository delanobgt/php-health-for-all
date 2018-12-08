<?php
    require_once __DIR__.'/../../lib/routing.php';
    require_once __DIR__.'/../../lib/http.php';
?>

<html>
    <body>
        <a href='<?php echo path('front/auth_patient.php?page=login') ?>'>Login Patient</a>
        <a href='<?php echo path('front/auth_doctor.php?page=login') ?>'>Login Doctor</a>
    </body>
</html>