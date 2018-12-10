<?php
    require_once __DIR__.'/session.php';
    require_once __DIR__.'/http.php';
    require_once __DIR__.'/routing.php';
    require_once __DIR__.'/../sql/user.php';

    function isAuthenticated() {
        return hasSession('email') === true;
    }

    function logout() {
        unset($_SESSION['ct']);
        unset($_SESSION['ct_flash']);
        session_destroy();
    }

    function authenticate($email, $password) {
        $isLoggedIn = loginUser($email, $password);
        if ($isLoggedIn) {
            setSession('email', $email);
            return true;
        }
        return false;
    }
?>