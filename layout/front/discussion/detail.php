<?php
    require_once __DIR__.'/../../../lib/routing.php';
    require_once __DIR__.'/../../../lib/http.php';
    require_once __DIR__.'/../../../lib/security.php';
?>

<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Health For All - Forum</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo css('forum.css') ?>">
    <link rel="stylesheet" href="<?php echo css('home.css') ?>">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">

    <style>
        .btn{
            margin-left: 7.3em;
            margin-bottom: 1em;
        }
        .author-trace {
            display: block;
            text-align: right;
        }
    </style>
</head>
<body>
    <header class="header">
        <?php include $GLOBALS['layoutDirectory'].'front/nav.php' ?>
    </header>

    <main class="main">

        <section class="chat">
            <section class="isichat">
                <section class="name">
                    <p><?php echo $discussion->title ?></p>
                </section>
                <section class="comment">
                    <p><?php echo $discussion->description ?></p>
                </section>
                <span class="author-trace">
                    Posted By 
                    <?php echo $userProfileMap[$discussion->posted_by]->name ?>
                    (<?php echo $userProfileMap[$discussion->posted_by]->role ?>)
                    at <?php echo date('d-M-Y (h:i:s)', strtotime($discussion->created_at)) ?>
                </span>
            </section>
        </section>
        
        <hr>
        <span> Answer: </span>

        <?php foreach ($answers as $answer) { ?>
            <section class="chat">
                <section class="isichat">
                    <section class="comment">
                        <p><?php echo $answer->content ?></p>
                        <span class="author-trace">
                            Posted By 
                            <?php echo $userProfileMap[$answer->posted_by]->name ?>
                            (<?php echo $userProfileMap[$answer->posted_by]->role ?>)
                            at <?php echo date('d-M-Y (h:i:s)', strtotime($answer->created_at)) ?>
                        </span>
                    </section>

                    <?php if (array_key_exists($answer->id, $comments)) { ?>
                        <?php foreach ($comments[$answer->id] as $comment) { ?>
                            <p><?php echo $comment->content ?></p>
                            <span class="author-trace">
                                Posted By 
                                <?php echo $userProfileMap[$comment->posted_by]->name ?>
                                (<?php echo $userProfileMap[$comment->posted_by]->role ?>)
                                at <?php echo date('d-M-Y (h:i:s)', strtotime($comment->created_at)) ?>
                            </span>
                        <?php } ?>
                    <?php } ?>
                    
                    <?php if (!isAuthenticated()) { ?>
                        <p><a href="<?php echo path('front/pre-login.php') ?>">Login </a>to Comment</p>
                    <?php } else { ?>
                        <form action="<?php echo path('front/discussion.php?page=new_comment') ?>" method="POST">
                            <input type="hidden" name="discussion_id" value="<?php echo $discussion->id ?>"/>
                            <input type="hidden" name="answer_id" value="<?php echo $answer->id ?>"/>
                            Answer: <br/>
                            <textarea name="content" rows="5" cols="33" placeholder="no description yet"></textarea><br/>
                            <input type="submit" name="submit" value="Reply"/>
                        </form>
                    <?php } ?>
                </section>
            </section>
        <?php } ?>
    </main>

    <br/>

    <?php if (!isAuthenticated()) { ?>
        <p><a href="<?php echo path('front/pre-login.php') ?>">Login </a>to Answer</p>
    <?php } else { ?>
        <form action="<?php echo path('front/discussion.php?page=new_answer') ?>" method="POST">
            <input type="hidden" name="discussion_id" value="<?php echo $discussion->id ?>"/>
            Answer: <br/>
            <textarea name="content" rows="5" cols="33" placeholder="no description yet"></textarea> <br/>
            <input type="submit" name="submit" value="Submit"/>
        </form>
    <?php } ?>
    
</body>
</html>