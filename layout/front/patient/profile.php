<?php 
    require_once __DIR__.'/../../../lib/security.php';
    require_once __DIR__.'/../../../lib/session.php'; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Health For All - Edit Profile</title>
    <link rel="stylesheet" href="Bootstrap.css">
    <link rel="stylesheet" href="<?php echo css('bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo css('editprofile.css') ?>">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
</head>

<body>
    <header>
        <?php include $GLOBALS['layoutDirectory'].'front/nav.php' ?>
        <?php include __DIR__.'/../../flash.php'; ?>
    </header>

    <div class="block">
        <h1 class="avatar"><?php echo strtoupper(substr($profile->name, 0, 1)) ?></h1>
    </div>

    <div class="form-wrap">

        <form action="<?php echo path('front/profile.php') ?>" method="POST">
            <h1 class="form-title">Edit Profile</h1>

            <label>Name</label> 
            <input type="text" name="name" value="<?php echo $profile->name ?>" placeholder="Enter Name">

            <label>Age</label> 
            <input type="text" name="age" value="<?php echo $profile->age ?>" placeholder="Enter Age">
            
            <label>Gender</label> 
            <input type="text" name="gender" value="<?php echo $profile->gender ?>" placeholder="Enter Gender">
            
            <input type="submit" value="Save Profile">
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