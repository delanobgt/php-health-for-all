<?php
    require_once __DIR__.'/../../lib/routing.php';
    require_once __DIR__.'/../../lib/http.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Healt For All</title>
        <link rel="stylesheet" href="<?php echo css('choosejob.css') ?>">
        <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    </head>

    <body>
        <main>
            <section class="first-button">
                <a href='<?php echo path('front/auth_patient.php?page=login') ?>'>
                    <button type="submit"> Login as Patient </button>
                </a>
                <a href='<?php echo path('front/auth_doctor.php?page=login') ?>'>
                    <button type="submit"> Login as Doctor </button>
                </a>
            </section>
        </main>

        <footer>
            <div class="footer-text">
                <p> Address: <br> Lorem, ipsum dolor.</p>
                <P> Contact Number: <br> Lorem ipsum dolor sit.</P>
                <P> Lorem ipsum dolor sit amet.</P>
            </div>
            
            <div  class="footer-brand">
                <h1> Health For All | </h1>
            </div>
        </footer>
    </body>
</html>