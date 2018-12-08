<?php
    function addFlash($key, $val) {
        if ($key == 'error') $key = 'danger';
        if (!isset($_SESSION['ct_flash'][$key])) {
            $_SESSION['ct_flash'][$key] = array();
        }
        $_SESSION['ct_flash'][$key][] = $val;
    }

    function getFlash($key = '') {
        $flashes = array();
        if ($key === '') {
            $flashes = $_SESSION['ct_flash'];
            $_SESSION['ct_flash'] = array();
        } 
        if (isset($_SESSION['ct_flash'][$key])) {
            $flashes = $_SESSION['ct_flash'][$key];
            unset($_SESSION['ct_flash'][$key]);
        }

        return $flashes;
    }

    function hasFlash($key) {
        return isset($_SESSION['ct_flash'][$key]); 
    }

    
    function hasSession($key) {
        return isset($_SESSION['ct'][$key]); 
    }

    function setSession($key, $value) {
        $_SESSION['ct'][$key] = $value;
    }

    function getSession($key, $default = '') {
        return hasSession($key) ? $_SESSION['ct'][$key] : $default;
    }
?>