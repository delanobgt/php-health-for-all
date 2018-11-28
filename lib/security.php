<?php

require_once __DIR__.'/session.php';
require_once __DIR__.'/http.php';
require_once __DIR__.'/routing.php';
require_once __DIR__.'/../sql/user.php';

function isAuthenticated() {
    return hasSession('username') === true;
}

function getRole() {
    return getSession('role', 'user');
}

function getUsername($default = '') {
    return isAuthenticated() ? getSession('username') : $default;
}

function logout() {
    unset($_SESSION['ct']);
    unset($_SESSION['ct_flash']);
    session_destroy();
}

/**
 * Mengecek apakah boleh mengakses resource
 *
 * @param array roles/status yang boleh mengakses
 */
function authorize($roles) {
    if (!is_array($roles)) $roles = (array)$roles;
    if (in_array(getRole(), $roles)) return true;
    accessDenied();
}

function authenticate($username, $password, $ip, $isAdmin = false) {

    $isLogedIn = login($username, $password, $ip);
    if ($isLogedIn) {
        setSession('username', $username);
        setSession('role', isAdmin($username) ? 'admin' : 'member');
        //setSession('role', 'admin');

        return true;
    }

    return false;
}
