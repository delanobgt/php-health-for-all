<?php
    require_once __DIR__.'/../config.php';

    function createComment($content, $answer_id, $posted_by) {
        global $pdo;
        $stmt = $pdo->prepare('INSERT INTO comment(content, answer_id, posted_by) VALUES(:content, :answer_id, :posted_by)');
        $success = $stmt->execute(array(
            'content' => $content,
            'answer_id' => $answer_id,
            'posted_by' => $posted_by
        ));
        return $success ? $pdo->lastInsertId() : 0;
    }

    function findCommentByAnswerId($answer_id) {
        global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM comment WHERE answer_id = :answer_id');
        $stmt->execute(array(
            'answer_id' => $answer_id
        ));
        return $stmt->fetchAll();
    }
?>
