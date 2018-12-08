<?php
    require_once __DIR__.'/../lib/session.php';
    require_once __DIR__.'/../config.php';

    function loginUser($email, $password) {
        global $pdo;
        $sth = $pdo->prepare('SELECT * FROM user WHERE email = :email AND password = :password');
        $sth->execute(array(
            'email' => $email,
            'password' => sha1($password)
        ));
        return $sth->rowCount() > 0;
    }

    function createUser($username, $email, $password, $role, $detail_id) {
        global $pdo;
        $sth = $pdo->prepare('INSERT INTO user(username, email, password, role, detail_id) VALUES(:username, :email, :password, :role, :detail_id)');
        return $sth->execute(array(
            'username' => $username,
            'email' => $email,
            'password' => sha1($password),
            'role' => $role,
            'detail_id' => $detail_id
        ));
    }

    function findUserByUsername($username = null) {
        global $pdo;
        if (is_null($username)) {
            $username = getUsername();
        }
        $sth = $pdo->prepare('SELECT * FROM user WHERE username = :username');
        $sth->execute(array('username' => $username));

        return $sth->fetch();
    }
?>
