<?php
    require_once __DIR__.'/../config.php';

    function createAdmin($name, $age, $gender) {
        global $pdo;
        $stmt = $pdo->prepare('INSERT INTO admin(name, age, gender) VALUES (:name, :age :gender)');
        $success = $stmt->execute(array(
            'name' => $name,
            'age' => $age,
            'gender' => $gender
        ));
        return $success ? $this->pdo->lastInsertId() : 0;
    }

    function findAllAdmin() {
        global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM admin');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function findAdminById($id) {
        global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM admin WHERE id = :id');
        $stmt->execute(array('id' => $id));
        return $stmt->fetch();
    }

    function updateAdminById($id, $name, $age, $specialist, $gender) {
        global $pdo;
        $stmt = $pdo->prepare('UPDATE admin SET name = :name, age = :age, gender = :gender WHERE id = :id');
        return $stmt->execute(array(
            'id' => $id,
            'name' => $name,
            'age' => $age,
            'gender' => $gender
        ));
    }

    function deleteAdminById($id) {
        global $pdo;
        $stmt = $pdo->prepare('DELETE FROM admin WHERE id = :id');
        return $stmt->execute(array('id' => $id));
    }
?>
