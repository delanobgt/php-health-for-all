<?php
    require_once __DIR__.'/../config.php';

    function createPatient($name, $age, $gender) {
        global $pdo;
        $stmt = $pdo->prepare('INSERT INTO patient(name, age, gender) VALUES(:name, :age, :gender)');
        $success = $stmt->execute(array(
            'name' => $name,
            'age' => $age,
            'gender' => $gender
        ));
        return $success ? $pdo->lastInsertId() : 0;
    }

    function findAllPatientComplete() {
        global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM patient INNER JOIN user ON user.detail_id = patient.id WHERE user.role = "patient"');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function findAllPatient() {
        global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM patient');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getPatientMap() {
        $patientMap = array();
        $patients = findAllPatient();
        foreach ($patients as $patient) {
            $patientMap[$patient->id] = $patient;
        }
        return $patientMap;
    }

    function findPatientById($id) {
        global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM patient WHERE id = :id');
        $stmt->execute(array('id' => $id));
        return $stmt->fetch();
    }

    function updatePatientById($id, $name, $age, $gender) {
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

    function deleteWholePatientById($id) {
        global $pdo;
        $stmt_1 = $pdo->prepare('DELETE FROM patient WHERE id = :id');
        $stmt_2 = $pdo->prepare('DELETE FROM user WHERE detail_id = :id AND role ="patient"');
        return $stmt_1->execute(array('id' => $id)) && $stmt_2->execute(array('id' => $id));
    }

    function setBanPatientById($id, $ban) {
        global $pdo;
        $stmt = $pdo->prepare('UPDATE patient SET ban = :ban WHERE id = :id');
        return $stmt->execute(array(
            'id' => $id,
            'ban' => $ban
        ));
    }
?>
