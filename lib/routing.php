<?php

    require_once __DIR__.'/../config.php';

    function path($controller, $parameters = array()) {
        if (isset($_GET['ref'])) 
            $parameters += array('ref' => $_GET['ref']);

        $queryString = '';
        // remove extension .php
    $length = strpos($controller, '.php') ? strpos($controller, '.php') : strlen($controller);
        //$controller = substr($controller, 0, $length);
        if (count($parameters) > 0) {
            $queryString = '?';
            foreach ($parameters as $key => $value) {
                $queryString .= $key.'='.$value.'&';
            }
            // buang karakter '&' di bagian paling akhir
            $queryString = substr($queryString, 0, strlen($queryString)-1);
        }
        return $GLOBALS['controllerDirectory'].$controller.$queryString;
    }

    function url($controller) {
        $host = '/sman1new/web/admin';
        $length = strlen($controller)-strlen($host)-5;
        $controller = substr($controller, 20, $length);
        return $controller;
    }

    function active($controller, $link) {
        $str='';
        if($controller == $link)
            $str='active';
        return $str;
    }

?>
