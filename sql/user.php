<?php

require_once __DIR__.'/../config.php';
require_once __DIR__.'/../lib/session.php';

function ipLogin($username, $ip){
    global $pdo;
    $sth = $pdo->prepare('UPDATE user SET ip_login = :ip
								WHERE username = :username');
    return $sth->execute(array(
        'username' => $username,
        'ip' => $ip
    ));
}

function findUserByUsername($username = null) {
    global $pdo;

    if (is_null($username)) {
        $username = getUsername();
    }
    $sth = $pdo->prepare('
        SELECT u.*, b.nama nama_bank, p.nama jenis_paket FROM user u
	INNER JOIN paket p ON p.id = u.id_paket
        LEFT JOIN bank b ON u.id_bank = b.id
        WHERE u.username = :username AND u.id_pusat IS NULL
    ');
    $sth->execute(array('username' => $username));

    return $sth->fetch();
}

function login($username, $password, $ip) {
    if (strlen($username) > 0 && strlen($password) > 0) {
        global $pdo;
        $isAdmin = isAdmin($username);
        $adminCondition = "";
        if ($isAdmin) $adminCondition = " AND admin = 1";
		$encryptPassword = sha1($password);
        $sth = $pdo->prepare('SELECT id FROM user WHERE username = :user AND password = :password' . $adminCondition);
        $sth->execute(array(
            'user' => $username,
            'password' => $encryptPassword
        ));
        ipLogin($username, $ip);
        return $sth->rowCount() > 0;
    }
    return false;
}

function isAdmin($username) {
    global $pdo;

    $sth = $pdo->prepare('SELECT id FROM user WHERE username = :username AND admin = 1');
    $sth->execute(array('username' => $username));

    return $sth->rowCount() > 0;
}

function gantiPassword($passwordLama, $password) {
    global $pdo;

    $username = getUsername();
    $user = findMemberByUsername($username);
    if ($user->password != sha1($passwordLama)) return false;

    $sth = $pdo->prepare('UPDATE user SET password = :password WHERE username = :username');

    return $sth->execute(array(
        'password' => sha1($password),
        'username' => $username
    ));
}

function getUsernameById($id) {
    global $pdo;

    $sth = $pdo->prepare('SELECT username FROM user WHERE id = :id');
    $sth->execute(array('id' => $id));
    $user = $sth->fetch();

    return $user->username;
}

?>
