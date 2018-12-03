<?php
    require_once 'env.php';

    session_start();
    
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        // PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO('mysql:dbname='.$dbname, $dbuser, $dbpass, $options);
        echo "Berhasil connect ke DB";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $controllerDirectory = $GLOBALS['host'].'/web/';
    $layoutDirectory = $GLOBALS['rootDirectory'].'/layout/';
    $assetDirectory = $GLOBALS['host'].'/assets/';
    $uploadDirectory = $GLOBALS['rootDirectory'].'/uploads/';
?>
