<?php
    require_once __DIR__.'/../../lib/routing.php';
    require_once __DIR__.'/../../lib/http.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Health For All - Home</title>
    <link rel="stylesheet" href="<?php echo css('bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo css('home.css') ?>">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
</head>

<body>
    <header>
        <?php include 'nav.php' ?>
        <?php include __DIR__.'/../flash.php'; ?>
    </header>

    <main>
        <section class="index-banner">
            <h1>
                <?php echo isset($profile) && $profile->role === 'doctor' ? 'Jawab Pertanyaan Pasien!' : 'Diskusi dengan Dokter!'?>
            </h1>
            <a href="<?php echo path('front/discussion.php') ?>"><button type="submit"> Diskusi di forum! </button></a>
        </section>

        <section class="index-thirdbanner">
            <h1>
                <?php echo isset($profile) && $profile->role === 'doctor' ? 'Lihat Dokter!' : 'Cari Dokter!'?>
            </h1>
            <a href="<?php echo path('front/doctor.php') ?>"> 
                <button type="submit"> 
                    <?php echo isset($profile) && $profile->role === 'doctor' ? 'Lihat' : 'Book appointment disini!' ?>
                </button>
            </a>
        </section>
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