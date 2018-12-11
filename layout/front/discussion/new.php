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
    <link rel="stylesheet" href="<?php echo css('new-discussion.css') ?>">
    <link rel="stylesheet" href="<?php echo css('home.css') ?>">
    <link rel="stylesheet" href="<?php echo css('bootstrap.min.css') ?>">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
</head>
<body>
    <header class="header">
        <?php include $GLOBALS['layoutDirectory'].'front/nav.php' ?>
        <?php include __DIR__.'/../../flash.php'; ?>
    </header>

    <br/><br/><br/><br/>
    <div class="box">
    <form action="<?php echo path('front/discussion.php?page=new') ?>" method="POST">
        Title: <input type="text" name="title" value=""/><br/>
        Description: <br/>
        <textarea name="description" rows="5" cols="33" placeholder="no description yet"></textarea><br/>
        <input type="submit" name="submit" value="Create"/>
    </form>
    </div>

    <script src="<?php echo js('jquery.min.js');?>"></script>
	<script>
		$('.close').click(function() {
			$('.alert').slideUp()
		})
	</script>
</body>
</html>