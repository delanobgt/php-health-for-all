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
    <title>Health For All - Forum</title>
    <link rel="stylesheet" href="<?php echo css('forum.css') ?>">
    <link rel="stylesheet" href="<?php echo css('home.css') ?>">
    <link rel="stylesheet" href="<?php echo css('bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <style>
        /* body {
            background-color: gainsboro;
        } */
        .btn{
            margin-left: 7.3em;
            margin-bottom: 1em;
        }
    </style>
</head>
<body>
    <header class="header">
        <?php include $GLOBALS['layoutDirectory'].'front/nav.php' ?>
        <?php include __DIR__.'/../../flash.php'; ?>
    </header>

    <main class="main">
        
        <br/><br/><br/><br/><br/><br/><br/>

        *You can only delete an appointment maximum 3 days before D-Day.<br/><br/>

        <?php if (count($appointments) === 0) { ?>
            <p>No appointments yet!</p>
        <?php } else { ?>
            <?php foreach ($appointments as $ap) { ?>
                <section style="background-color:gainsboro; padding: 1em; border-radius: 10px;">
                    <?php if ($profile->role === 'doctor') { ?>
                        <p>Patient: <?php echo $patientMap[$ap->patient_id]->name ?></p>
                    <?php } else if ($profile->role === 'patient') { ?>
                        <p>Doctor: <?php echo $doctorMap[$ap->doctor_id]->name ?></p>
                    <?php } ?>

                    <p>Status: <?php echo $ap->approved ? 'APPROVED' : 'NOT APPROVED' ?></p>    

                    <p>Time: <?php echo date('d M Y (H:i:s)', strtotime($ap->timestamp)) ?></p>

                    <p>Symptom: <?php echo $ap->symptom ?></p>

                    <?php if ($ap->approved) { ?>
                        <p>Info: <?php echo $ap->info ?></p>
                    <?php } ?>

                    <form action="<?php echo path('front/appointment.php?page=modify') ?>" method="POST">
                        <input type="hidden" name="appointment_id" value="<?php echo $ap->id ?>"/>
                        <?php
                            $dateNow = new Datetime((new DateTime())->format('Y-m-d')."00:00:00");
                            $dateTs = new DateTime(substr($ap->timestamp, 0, 10)."00:00:00");
                            $interval = $dateTs->diff($dateNow);
                            
                            if ($dateTs < $dateNow) {
                                echo "<p>*Appointment expired</p>";
                                echo '<input type="submit" name="submit" value="Delete"/>';
                            } else {
                                if ($profile->role === 'doctor' && !$ap->approved) {
                                    echo '
                                        Info: <br/>
                                        <textarea name="info" rows="5" cols="33" placeholder="no description yet"></textarea><br/>
                                        <input type="submit" name="submit" value="Approve"/>
                                    ';
                                }
                                if ($interval->d >= 3 || !$ap->approved) {
                                    echo '<input type="submit" name="submit" value="Delete"/>';
                                } else {
                                    echo "<p>*You can't cancel an appointment 3 days before D-Day</p>";
                                }
                            }  
                        ?>
                    </form>
                </section>
                <br/>
                <hr/>
            <?php } ?>
        <?php } ?>
    </main>
    <script src="<?php echo js('jquery.min.js');?>"></script>
	<script>
		$('.close').click(function() {
			$('.alert').slideUp()
		})
	</script>
</body>
</html>