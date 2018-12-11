<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ryan</title>
    <link rel="stylesheet" href="<?php echo css('bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo css('doctor-detail.css') ?>">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">

    <style>
        .container-fluid {
            margin-top: 4em;
        }
    </style>
</head>

<body>
    <header>
        <?php include $GLOBALS['layoutDirectory'].'front/nav.php' ?>
        <?php include __DIR__.'/../../flash.php'; ?>
    </header>

    <!--Main container. Everything must be contained within a top-level container.-->
    <div class="container-fluid">

        <!--First row (only row)-->
        <div class="row extra_margin">

            <!-- First column (smaller of the two). Will appear on the left on desktop and on the top on mobile. -->
            <div class="col-md-4 col-sm-12 col-xs-12">

                <!-- Div to center the header image/name/social buttons -->
                <div class="text-center">

                    <!-- Placeholder image using Placeholder.com -->
                    <img src="http://via.placeholder.com/300x250" class="img-rounded" />

                    <!-- Header text (Person's name) -->
                    <h2><?php echo $doctor->name ?></h2>
                    <h3><?php echo $doctor->specialist ?></h3>

                    <!-- Social buttons using anchor elements and btn-primary class to style -->
                    <p>
                        <a class="btn btn-primary btn-xs" href="#" role="button">Book Now!</a>
                        <a class="btn btn-primary btn-xs" href="#" role="button">Back to CariDokter</a>
                    </p>
                </div>
            </div> <!-- End Col 1 -->

            <!-- Second column - for small and extra-small screens, will use whatever # cols is available -->
            <div class="col-md-8 col-sm-* col-xs-*">

                <!-- "Lead" text at top of column. -->
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ac purus lacus.
                    Curabitur lobortis iaculis porta. Nullam vel condimentum dolor. Etiam tempor arcu ut urna mattis,
                    at tristique sapien fringilla. Fusce viverra, odio sed efficitur dapibus, turpis orci posuere
                    tellus, sed gravida dui risus at sapien. Duis faucibus non elit et interdum. Nam placerat nunc id
                    massa placerat efficitur. Maecenas ac felis et elit vulputate posuere a non urna. Suspendisse
                    mattis vitae nisl sed scelerisque. Duis eu risus varius, laoreet est nec, maximus dolor.</p>

                <!-- Horizontal rule to add some spacing between the "lead" and body text -->
            </div> <!-- End column 2 -->
        </div> <!-- End row 1 -->
    </div> <!-- End main container -->

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