<?php

require_once __DIR__.'/../config.php';
require_once __DIR__.'/../lib/layout.php';
require_once __DIR__.'/../lib/http.php';
require_once __DIR__.'/../lib/security.php';

if (isAuthenticated()) {
 	redirect(path('logout.php'));
} else {
	render('login.php');
}
