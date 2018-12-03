<?php

    require_once __DIR__.'/../config.php';

    function render($layout, $parameters = array()) {
        foreach ($parameters as $key => $value) {
            $$key = $value;
        }

        include $GLOBALS['layoutDirectory'].$layout;
    }

?>