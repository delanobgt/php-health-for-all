<?php
    session_start();
    $host = 'http://localhost:80/universitas/mvc';
    $rootDirectory = '/opt/lampp/htdocs/universitas/mvc';
    date_default_timezone_set('Asia/Jakarta');
    $emailAdmin = 'admin@uph.edu';

    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'health_for_all';
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        // PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO('mysql:dbname='.$dbname, $dbuser, $dbpass, $options);
        echo "Berhasil connect ke DB"
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $controllerDirectory = $host . '/web/';
    $layoutDirectory = $rootDirectory . '/layout/';
    $assetDirectory = $host . '/assets/';
    $uploadDirectory = $rootDirectory . '/uploads/';
?>
