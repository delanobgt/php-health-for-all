<?php
    function redirect($path) {
        header('Location: '.$path);
        die(); 
    }

    function getQueryStrings() {
        $queryStrings = array();
        parse_str($_SERVER['QUERY_STRING'], $queryStrings);
        return $queryStrings;
    }

    function accessDenied($message = '') {
        header('HTTP/1.1 401 Unauthorized');
        include __DIR__.'/../layout/admin/401.php';
        die();
    }
?>