<?php

    function displayDate($input) {
        $output = DateTime::createFromFormat('Y-m-d H:i:s', $input);

        return $output->format('d F Y');
    }
    
?>