<?php
    require_once __DIR__.'/../config.php';

    function createAnswer($content, $discussion_id, $posted_by) {
        global $pdo;
        $stmt = $pdo->prepare('INSERT INTO answer(content, discussion_id, posted_by) VALUES(:content, :discussion_id, :posted_by)');
        $success = $stmt->execute(array(
            'content' => $content,
            'discussion_id' => $discussion_id,
            'posted_by' => $posted_by
        ));
        return $success ? $pdo->lastInsertId() : 0;
    }

    function findAnswerByDiscussionId($discussion_id) {
        global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM answer WHERE discussion_id = :discussion_id');
        $stmt->execute(array(
            'discussion_id' => $discussion_id
        ));
        return $stmt->fetchAll();
    }
?>
