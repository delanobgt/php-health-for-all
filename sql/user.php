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

        if ($sth->rowCount() <= 0) return NULL;

        $profile = getProfileByEmail($email);
        if ($profile->role === 'admin') {
            return true;
        } else if (isset($profile->ban) && $profile->ban) {
            return false;
        } else if (isset($profile->approved) && !$profile->approved) {
            return false;
        } else {
            return true;
        }
    }

    function createUser($email, $password, $role, $detail_id) {
        global $pdo;
        $sth = $pdo->prepare('INSERT INTO user(email, password, role, detail_id) VALUES(:email, :password, :role, :detail_id)');
        return $sth->execute(array(
            'email' => $email,
            'password' => sha1($password),
            'role' => $role,
            'detail_id' => $detail_id
        ));
    }

    function hasUserByEmail($email) {
        global $pdo;
        $sth = $pdo->prepare('SELECT * FROM user WHERE email = :email');
        $sth->execute(array('email' => $email));
        return $sth->rowCount() > 0;
    }

    function findUserByEmail($email) {
        global $pdo;
        $sth = $pdo->prepare('SELECT * FROM user WHERE email = :email');
        $sth->execute(array('email' => $email));
        return $sth->fetch();
    }

    function findAllUser() {
        global $pdo;
        $sth = $pdo->prepare('SELECT * FROM user');
        $sth->execute();
        return $sth->fetchAll();
    }

    function getUserProfileMap() {
        $userProfileMap = array();
        $users = findAllUser();
        foreach ($users as $user) {
            $userProfileMap[$user->email] = getProfileByEmail($user->email);
        }
        return $userProfileMap;
    }

    function getProfileByEmail($email) {
        if ($email === '') return NULL;
        global $pdo;

        $sth = $pdo->prepare('SELECT * FROM user WHERE email = :email');
        $sth->execute(array('email' => $email));
        $user = $sth->fetch();
        $sth = $pdo->prepare("SELECT * FROM user INNER JOIN $user->role as r WHERE r.id = :detail_id AND user.email = :email");
        $sth->execute(array(
            'detail_id' => $user->detail_id,
            'email' => $email
        ));
        $ret = $sth->fetch();
        return $ret;
    }
?>
