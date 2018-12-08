<?php
    require_once __DIR__.'/../../sql/doctor.php';
    require_once __DIR__.'/../../lib/layout.php';

    // echo $doctorModel->create('Horlina', 50, 'Unknown', 'M');
    var_dump($doctorModel->create('Irvin', 19, 'Heart', 'M'));

    render('admin/index.php', array());
?>