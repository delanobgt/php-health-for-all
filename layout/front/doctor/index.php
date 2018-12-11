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
    <title>Health For All - CariDokter!</title>
    <link rel="stylesheet" href="<?php echo css('bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo css('doctor-index.css') ?>">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
</head>

<body>
    <header>
        <?php include $GLOBALS['layoutDirectory'].'front/nav.php' ?>
        <?php include __DIR__.'/../../flash.php'; ?>
    </header>

    <main>
        <!-- <section class="index-banner">
            <h1> Doctor Stephen Strange </h1>
            <h2> I can teach you magic.</h2>
            <a href="#"> <button type="submit"> View Profile </button> </a>
            <a href="#"> <button type="submit"> Book Now! </button> </a>
        </section> -->
        <?php foreach ($doctors as $doctor) { ?>
            <section class="index-banner">
                <h1> <?php echo $doctor->name ?> </h1>
                <h2> <?php echo $doctor->specialist ?> </h2>
                <a href="<?php echo path("front/doctor.php?id=$doctor->id") ?>"> <button type="submit"> View Profile </button> </a>
                <?php if (!isset($profile) || $profile->role === 'patient') { ?>
                    <a href="<?php echo path("front/appointment.php?page=new&doctor_id=$doctor->id") ?>"> <button type="submit"> Book Now! </button> </a>
                <?php } ?>
            </section>
        <?php } ?>
    </main>

    <footer>
        <div class="footer-text">
            <p> Address: <br> Lorem, ipsum dolor.</p>
            <P> Contact Number: <br> Lorem ipsum dolor sit.</P>
            <P> Lorem ipsum dolor sit amet.</P>
        </div>

        <div class="footer-brand">
            <h1> Health For All | </h1>
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