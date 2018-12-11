<?php
    require_once __DIR__.'/../../../lib/routing.php';
    require_once __DIR__.'/../../../lib/http.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Health For All - Forum</title>
    <link rel="stylesheet" href="<?php echo css('bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo css('forum.css') ?>">
    <link rel="stylesheet" href="<?php echo css('home.css') ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <style>
        .btn{
            margin-bottom: 1em;
        }
    </style>
</head>
<body>
    <header class="header">
        <?php include $GLOBALS['layoutDirectory'].'front/nav.php' ?>
        <?php include __DIR__.'/../../flash.php'; ?>
    </header>

    <main class="main">
        <br/>
        <div class="newpost">
            <a href="<?php echo path('front/discussion.php?page=new') ?>">
                <button type="button" class="btn btn-primary">
                    Post a discussion
                </button>
            </a>
        </div>
            
        <?php if (count($discussions) === 0) { ?>
            <p>No Discussion yet!</p>
        <?php } else { ?>
            <?php foreach ($discussions as $d) { ?>
                <section class="chat">
                    <section class="isichat">
                        <section class="name">
                            <p><?php echo $d->title ?></p>
                        </section>
                        <section class="comment">
                            <p><?php echo $d->description ?></p>
                        </section>
                        <a href='<?php echo path("front/discussion.php?id=$d->id") ?>'>More</a>
                    </section>
                </section>
            <?php } ?>
        <?php } ?>
    </main>
    <script src="<?php echo js('jquery.min.js');?>"></script>
	<script>
		$('.close').click(function() {
			$('.alert').slideUp()
		})
	</script>
</body>
</html>