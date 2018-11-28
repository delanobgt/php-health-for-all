<?php

require_once __DIR__.'/../config.php';
require_once __DIR__.'/../lib/http.php';
require_once __DIR__.'/../lib/security.php';

logout();

redirect($GLOBALS['host']);