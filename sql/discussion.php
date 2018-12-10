<?php
    require_once __DIR__.'/../config.php';

    function createDiscussion($title, $description, $posted_by) {
        global $pdo;
        $stmt = $pdo->prepare('INSERT INTO discussion(title, description, posted_by) VALUES(:title, :description, :posted_by)');
        $success = $stmt->execute(array(
            'title' => $title,
            'description' => $description,
            'posted_by' => $posted_by
        ));
        return $success ? $pdo->lastInsertId() : 0;
    }

    function findAllDiscussion() {
        global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM discussion');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function findDiscussionById($id) {
        global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM discussion WHERE id = :id');
        $stmt->execute(array('id' => $id));
        return $stmt->fetch();
    }

    function updateDiscussionById($id, $title, $description) {
        global $pdo;
        $stmt = $pdo->prepare('UPDATE discussion SET title = :title, description = :description WHERE id = :id');
        return $stmt->execute(array(
            'id' => $id,
            'title' => $title,
            'description' => $description
        ));
    }

    function deleteDiscussionById($id) {
        global $pdo;
        $stmt = $pdo->prepare('DELETE FROM doctor WHERE id = :id');
        return $stmt->execute(array('id' => $id));
    }
?>
