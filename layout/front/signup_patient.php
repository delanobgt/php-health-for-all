<?php
    require_once __DIR__.'/../../lib/asset.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up for HFA (Patient)</title>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo css('bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo css('signup.css') ?>">
</head>

<body>

    <header>
        <?php include __DIR__.'/../flash.php'; ?>
    </header>

    <div class="form-wrap">

        <form action="<?php echo path('front/auth_patient.php?page=signup') ?>" method="POST">

            <h1 class="form-title">Sign Up (Patient)</h1>

            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <!-- <input type="password" name="confirm_password" placeholder="Confirm Password"> -->
            
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="age" placeholder="age" required>
            <select name="gender" required>
                <option value="Select your gender" disabled selected>Select your gender</option>
                <option value="F">Female</option>
                <option value="M">Male</option>
            </select>
            <br/><br/>
            
            <input type="submit" value="Sign Up">

            <h1 class="form-footer"> If you already sign up, <a href="<?php echo path('front/auth_patient.php?page=login') ?>"> login here.</a> </h1>
        </form>

    </div>

    <footer>
        <div class="footer-text">
            <p> Address: <br> Lorem, ipsum dolor.</p>
            <P> Contact Number: <br> Lorem ipsum dolor sit.</P>
            <P> Lorem ipsum dolor sit amet.</P>
        </div>

        <div class="footer-brand">
            <h1> Health For All |</h1>
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