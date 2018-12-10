<?php
    require_once __DIR__.'/../config.php';

    function createDoctor($name, $age, $specialist, $gender) {
        global $pdo;
        $stmt = $pdo->prepare('INSERT INTO doctor(name, age, specialist, gender) VALUES(:name, :age, :specialist, :gender)');
        $success = $stmt->execute(array(
            'name' => $name,
            'age' => $age,
            'specialist' => $specialist,
            'gender' => $gender,
        ));
        return $success ? $pdo->lastInsertId() : 0;
    }

    function findAllDoctor() {
        global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM doctor');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function findDoctorById($id) {
        global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM doctor WHERE id = :id');
        $stmt->execute(array('id' => $id));
        return $stmt->fetch();
    }

    function updateDoctorById($id, $name, $age, $specialist, $gender, $description='') {
        global $pdo;
        $stmt = $pdo->prepare('UPDATE doctor SET name = :name, age = :age, specialist = :specialist, gender = :gender, description = :description WHERE id = :id');
        return $stmt->execute(array(
            'id' => $id,
            'name' => $name,
            'age' => $age,
            'specialist' => $specialist,
            'gender' => $gender,
            'description' => $description
        ));
    }

    function deleteDoctorById($id) {
        global $pdo;
        $stmt = $pdo->prepare('DELETE FROM doctor WHERE id = :id');
        return $stmt->execute(array('id' => $id));
    }
?>
