<?php
    require_once __DIR__.'/session.php';
    require_once __DIR__.'/http.php';
    require_once __DIR__.'/routing.php';
    require_once __DIR__.'/../sql/user.php';

    function isAuthenticated() {
        return hasSession('username') === true;
    }

    function getRole() {
        return getSession('role');
    }

    function getUsername($default = '') {
        return isAuthenticated() ? getSession('username') : $default;
    }

    function logout() {
        unset($_SESSION['ct']);
        unset($_SESSION['ct_flash']);
        session_destroy();
    }

    function authenticate($email, $password) {
        $isLoggedIn = loginUser($email, $password);
        if ($isLoggedIn) {
            setSession('username', $email);
            // setSession('role', isAdmin($email) ? 'admin' : 'member');
            return true;
        }
        return false;
    }
?>