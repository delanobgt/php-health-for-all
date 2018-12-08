<?php
    require_once __DIR__.'/../config.php';

    function createPatient($name, $age, $gender) {
        global $pdo;
        $stmt = $pdo->prepare('INSERT INTO patient(name, age, gender) VALUES (:name, :age :gender)');
        $success = $stmt->execute(array(
            'name' => $name,
            'age' => $age,
            'gender' => $gender
        ));
        return $success ? $this->pdo->lastInsertId() : 0;
    }

    function findAllPatient() {
        global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM patient');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function findPatientById($id) {
        global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM patient WHERE id = :id');
        $stmt->execute(array('id' => $id));
        return $stmt->fetch();
    }

    function updatePatientById($id, $name, $age, $specialist, $gender) {
        global $pdo;
        $stmt = $pdo->prepare('UPDATE patient SET name = :name, age = :age, gender = :gender WHERE id = :id');
        return $stmt->execute(array(
            'id' => $id,
            'name' => $name,
            'age' => $age,
            'gender' => $gender
        ));
    }

    function deletePatientById($id) {
        global $pdo;
        $stmt = $pdo->prepare('DELETE FROM patient WHERE id = :id');
        return $stmt->execute(array('id' => $id));
    }
?>
