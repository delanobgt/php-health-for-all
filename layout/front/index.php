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
    <title>Healt For All</title>
    <link rel="stylesheet" href="<?php echo css('index.css') ?>">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
</head>

<body>
    <header>
        <a href="index.html" class="header-brand">Health For All | </a>

        <nav>
            <ul>
                <li><a href="<?php echo path('front/pre-login.php') ?>">Login</a></li>
                <li><a href="contact.html">Customer Help</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="index-banner">
            <h1> We serve you with heart </h1>
        </section>

        <section class="index-secondbanner">
            <h1> Lorem ipsum dolor sit amet. </h1>
            <a href="signup.html"> <button type="submit"> Sign Up Now </button> </a>
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