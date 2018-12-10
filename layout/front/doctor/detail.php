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
    <link rel="stylesheet" href="<?php echo css('editprofile.css') ?>">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
</head>

<body>
    <header>
        <?php include $GLOBALS['layoutDirectory'].'front/nav.php' ?>
    </header>

    <div class="block">
        <h1 class="avatar"><?php echo strtoupper(substr($doctor->name, 0, 1)) ?></h1>
    </div>

    <div class="form-wrap">

        <form action="<?php echo path('front/profile.php') ?>" method="POST">
            <h1 class="form-title">
                <?php echo $doctor->name ?>'s Profile
            </h1>

            <label>Name</label> 
            <input readonly type="text" name="name" value="<?php echo $doctor->name ?>" placeholder="Enter Name">

            <label>Age</label> 
            <input readonly type="text" name="age" value="<?php echo $doctor->age ?>" placeholder="Enter Age">
            
            <label>Gender</label> 
            <input readonly type="text" name="gender" value="<?php echo $doctor->gender ?>" placeholder="Enter Gender">
            
            <label>Specialist</label> 
            <input readonly type="text" name="specialist" value="<?php echo $doctor->specialist ?>" placeholder="Enter Specialist">
            
            <label>Description</label> 
            <textarea readonly name="description" rows="5" cols="33" placeholder="no description yet"><?php echo isset($doctor->description) ? $doctor->description : '' ?></textarea>
            
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