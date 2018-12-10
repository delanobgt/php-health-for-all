<?php 
    require_once __DIR__.'/../../lib/security.php';
    require_once __DIR__.'/../../lib/session.php'; 
?>

<a href="<?php echo path('front/index.php') ?>" class="header-brand">Health For All | - Home </a>

<nav>
    <ul>
        <li><a href="<?php echo path('front/discussion.php') ?>">Forum Diskusi</a></li>
        <li><a href="<?php echo path('front/doctor.php') ?>">Cari Dokter</a></li>
        <?php if (isAuthenticated()) { ?>
            <li><a href="<?php echo path('front/appointment.php') ?>">My Appointment</a></li>
        <?php } ?>

        <?php 
            if (hasSession('email')) {
                $email = getSession('email');
                $profile = getProfileByEmail($email);
                $logoutPath = path('logout.php');
                $profilePath = path('front/profile.php');
                echo "
                    <li><a href='{$profilePath}'>$profile->name ($profile->role)</a></li>
                    <li><a href='{$logoutPath}'>Logout</a></li>
                ";
            } else {
                $preLoginPath = path('front/pre-login.php');
                echo "<li><a href='$preLoginPath'>Login</a></li>";
            }
        ?>
    </ul>
</nav>