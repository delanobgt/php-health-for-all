<?php
    require_once __DIR__.'/../../lib/asset.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up for HFA (Doctor)</title>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo css('signup.css') ?>">
</head>

<body>

    <header>
        <nav>
            <ul>
                <li><a href="contact.html">Customer Help</a></li>
            </ul>
        </nav>
    </header>

    <div class="form-wrap">

        <form action="<?php echo path('front/auth_doctor.php?page=signup') ?>" method="POST">

            <h1 class="form-title">Sign Up (Doctor)</h1>

            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="confirm_password" placeholder="Confirm Password">

            <input type="text" name="name" placeholder="Name">
            <input type="text" name="age" placeholder="Age">
            <input type="text" name="specialist" placeholder="Specialist">
            <select name="gender">
                <option value="Select your gender" disabled selected>Select your gender</option>
                <option value="F">Female</option>
                <option value="M">Male</option>
            </select>
            <br/><br/>
            
            <input type="submit" name="signup" value="Sign Up">

            <h1 class="form-footer"> If you already sign up, <a href="<?php echo path('front/auth_doctor.php?page=login') ?>"> login here.</a> </h1>
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

</body>

</html>