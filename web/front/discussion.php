<?php
    require_once __DIR__.'/../../config.php';
    require_once __DIR__.'/../../lib/http.php';
    require_once __DIR__.'/../../lib/layout.php';
    require_once __DIR__.'/../../lib/security.php';
    require_once __DIR__.'/../../lib/asset.php';
    require_once __DIR__.'/../../sql/doctor.php';
    require_once __DIR__.'/../../sql/discussion.php';
    require_once __DIR__.'/../../sql/answer.php';
    require_once __DIR__.'/../../sql/comment.php';
    require_once __DIR__.'/../../sql/user.php';

    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $queryStrings = getQueryStrings();

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {    
        if (isset($queryStrings['id'])) {
            $discussion_id = $queryStrings['id'];
            $discussion = findDiscussionById($discussion_id);
            $answers = findAnswerByDiscussionId($discussion_id);

            $comments = array();
            foreach ($answers as $answer) {
                $comments[$answer->id] = findCommentByAnswerId($answer->id);
            }
            
            render('front/discussion/detail.php', array(
                'discussion' => $discussion,
                'answers' => $answers,
                'comments' => $comments,
                'userProfileMap' => getUserProfileMap()
            ));
        } else if (isset($queryStrings['page']) && $queryStrings['page'] === 'new') { 
            render('front/discussion/new.php');
        } else {
            $discussions = findAllDiscussion();
            render('front/discussion/index.php', array('discussions' => $discussions));
        }
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($queryStrings['page']) && $queryStrings['page'] === 'new') { 
            $email = getSession('email');
            createDiscussion($_POST['title'], htmlspecialchars($_POST['description']), $email);
            redirect(path('front/discussion.php'));
        } else if (isset($queryStrings['page']) && $queryStrings['page'] === 'new_answer') { 
            $email = getSession('email');
            $discussion_id = $_POST['discussion_id'];
            createAnswer(htmlspecialchars($_POST['content']), $discussion_id, $email);
            redirect(path("front/discussion.php?id=$discussion_id"));
        } else if (isset($queryStrings['page']) && $queryStrings['page'] === 'new_comment') { 
            $email = getSession('email');
            $discussion_id = $_POST['discussion_id'];
            $answer_id = $_POST['answer_id'];
            createComment(htmlspecialchars($_POST['content']), $answer_id, $email);
            redirect(path("front/discussion.php?id=$discussion_id"));
        } else {
            render('front/discussion/index.php');
        }
    }
?>