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
    <link rel="stylesheet" href="<?php echo css('bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo css('formappointment.css') ?>">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <style>
    .without_ampm::-webkit-datetime-edit-ampm-field {
        display: none;
    }
    input[type=time]::-webkit-clear-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        -o-appearance: none;
        -ms-appearance:none;
        appearance: none;
        margin: -10px; 
    }
    </style>
</head>

<body>
    <header class="header">
        <?php include $GLOBALS['layoutDirectory'].'front/nav.php' ?>
        <?php include __DIR__.'/../../flash.php'; ?>
    </header>

    <div class="form-wrap">

        <form action="<?php echo path('front/appointment.php?page=new') ?>" method="POST">
            <input type="hidden" name="doctor_id" value="<?php echo $doctor_id ?>" />
            <input type="hidden" name="patient_id" value="<?php echo $patient_id ?>" />

            <h1 class="form-title">Appointment Form</h1>
            
            <label>Name</label> <input type="text" value="<?php echo $profile->name ?>" placeholder="Enter Name" required readonly />
            <label>Age</label> <input type="text" value="<?php echo $profile->age ?>" placeholder="Enter Age" required readonly />
            <label>Gender</label> <input type="text" value="<?php echo $profile->gender ?>" placeholder="Enter Gender" required readonly/>
            <label>Symptom</label> <input type="text" name="symptom" placeholder="Enter Symptom" required>
            <label>Date</label> <input type="date" name="date" placeholder="" required>
            <label>Time</label> <input type="time" name="time" placeholder="" required>
            <input type="submit" value="Make Your Appointment">
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