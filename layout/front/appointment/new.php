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
    <title>Health For All - Edit Profile</title>
    <link rel="stylesheet" href="Bootstrap.css">
    <link rel="stylesheet" href="<?php echo css('formappointment.css') ?>">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
</head>

<body>
    <header class="header">
        <?php include $GLOBALS['layoutDirectory'].'front/nav.php' ?>
    </header>

    <div class="form-wrap">

        <form>
            <h1 class="form-title">Appointment Form</h1>

            <label>Name</label> <input type="text" placeholder="Enter Name">
            <label>Age</label> <input type="text" placeholder="Enter Age">
            <label>Gender</label> <input type="text" placeholder="Enter Gender">
            <label>Symptom</label> <input type="text" placeholder="Enter Symptom">
            <label>Hospital</label> <input type="text" placeholder="Enter Hospital">
            <label>Date</label> <input type="date" placeholder="">
            <label>Time</label> <input type="time" placeholder="">
            <input type="button" value="Make Your Appointment">
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

</body>

</html>