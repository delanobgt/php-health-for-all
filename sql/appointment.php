<?php
    require_once __DIR__.'/../config.php';

    function createAppointment($doctor_id, $patient_id, $symptom, $timestamp) {
        global $pdo;
        $stmt = $pdo->prepare('INSERT INTO appointment(doctor_id, patient_id, symptom, timestamp) VALUES(:doctor_id, :patient_id, :symptom, :timestamp)');
        $success = $stmt->execute(array(
            'doctor_id' => $doctor_id,
            'patient_id' => $patient_id,
            'symptom' => $symptom,
            'timestamp' => $timestamp
        ));
        return $success ? $pdo->lastInsertId() : 0;
    }

    function findAllAppointment() {
        global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM appointment');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function findAppointmentByPatientId($id) {
        global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM appointment WHERE patient_id = :id');
        $stmt->execute(array('id' => $id));
        return $stmt->fetchAll();
    }

    function findAppointmentByDoctorId($id) {
        global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM appointment WHERE doctor_id = :id');
        $stmt->execute(array('id' => $id));
        return $stmt->fetchAll();
    }
    
    function findAppointmentById($id) {
        global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM appointment WHERE id = :id');
        $stmt->execute(array('id' => $id));
        return $stmt->fetch();
    }

    function approveAppointmentById($id, $info) {
        global $pdo;
        $stmt = $pdo->prepare('UPDATE appointment SET info = :info, approved = 1 WHERE id = :id');
        return $stmt->execute(array(
            'id' => $id,
            'info' => $info
        ));
    }

    function deleteAppointmentById($id) {
        global $pdo;
        $stmt = $pdo->prepare('DELETE FROM appointment WHERE id = :id');
        return $stmt->execute(array('id' => $id));
    }
?>
