<?php 
    require_once __DIR__.'/../../lib/security.php';
    require_once __DIR__.'/../../lib/session.php'; 
?>

<a href="<?php echo path('back/index.php') ?>" class="header-brand">Health For All | - Admin </a>

<nav>
    <ul>
        <li><a href="<?php echo path('back/doctor.php') ?>">Doctor</a></li>
        <li><a href="<?php echo path('back/patient.php') ?>">Patient</a></li>
        <li><a href="<?php echo path('back/appointment.php') ?>">Appointment</a></li>

        <?php 
            $email = getSession('email');
            $profile = getProfileByEmail($email);
            $logoutPath = path('logout.php');
            echo "
                <li><a href='#'>$profile->name ($profile->role)</a></li>
                <li><a href='{$logoutPath}'>Logout</a></li>
            ";
        ?>
    </ul>
</nav>