<?php
    require_once __DIR__.'/../../lib/asset.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login for HFA (Doctor)</title>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo css('bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo css('login.css') ?>">
</head>

<body>

    <header>
        <!-- <?php include __DIR__.'/nav.php'; ?> -->
        <?php include __DIR__.'/../flash.php'; ?>
    </header>

    <div class="form-wrap">

        <form action="<?php echo path('front/auth_doctor.php?page=login') ?>" method="POST">

            <h1 class="form-title">Login (Doctor)</h1>

            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">

            <h1 class="form-footer"> If you are new doctor, <a href="<?php echo path('front/auth_doctor.php?page=signup') ?>"> signup here.</a> </h1>
        </form>

    </div>

    <footer>
        <div class="footer-text">
            <p> Address: <br> Lorem, ipsum dolor.</p>
            <P> Contact Number: <br> Lorem ipsum dolor sit.</P>
            <P> Lorem ipsum dolor sit amet.</P>
        </div>

        <div class="footer-brand">
            <h1> Heatlh For All | </h1>
        </div>
    </footer>
    <script src="<?php echo js('jquery.min.js');?>"></script>
	<script>
		$('.close').click(function() {
			$('.alert').slideUp()
		})
	</script>
</body>

</html>