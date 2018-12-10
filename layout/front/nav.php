<?php 
    require_once __DIR__.'/../../lib/security.php';
    require_once __DIR__.'/../../lib/session.php'; 
?>

<a href="<?php echo path('front/index.php') ?>" class="header-brand">Health For All | - Home </a>

<nav>
    <ul>
        <li><a href="<?php echo path('front/discussion.php') ?>">Forum Diskusi</a></li>
        <li><a href="#">Cari Dokter</a></li>

        <?php 
            if (hasSession('email')) {
                $email = getSession('email');
                $profile = getProfileByEmail($email);
                $logoutPath = path('logout.php');
                $profilePath = path('front/profile.php');
                echo "
                    <li><a href='{$profilePath}'>$email ($profile->role)</a></li>
                    <li><a href='{$logoutPath}'>Logout</a></li>
                ";
            } else {
                $preLoginPath = path('front/pre-login.php');
                echo "<li><a href='$preLoginPath'>Login</a></li>";
            }
        ?>
    </ul>
</nav>