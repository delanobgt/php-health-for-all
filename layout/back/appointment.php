<?php
    require_once __DIR__.'/../../lib/routing.php';
    require_once __DIR__.'/../../lib/http.php';
    require_once __DIR__.'/../../lib/asset.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Health For All - Home</title>
    <link rel="stylesheet" href="<?php echo css('home.css') ?>">
    <link rel="stylesheet" href="<?php echo css('datatable.min.css') ?>">
    <link rel="stylesheet" href="<?php echo css('bootstrap.min.css') ?>">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
</head>

<body>
    <header>
        <?php include 'nav.php' ?>
        <?php include __DIR__.'/../flash.php'; ?>
    </header>

    <br/><br/><br/><br/>
    <h1>Patient List</h1>
    <br/><br/>
    <main>
        <table id="table" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Doctor Name</th>
                    <th>Patient Name</th>
                    <th>Timestamp</th>
                    <th>Approved</th>
                    <th>Symptom</th>
                    <th>Info</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($appointments as $ap) {
                        $submitPath = path('back/appointment.php');
                        $approvedStatus = $ap->approved ? 'APPROVED' : 'NOT APPROVED';
                        echo "
                            <tr>
                                <td>$ap->id</td>
                                <td>{$doctorMap[$ap->doctor_id]->name}</td>
                                <td>{$patientMap[$ap->patient_id]->name}</td>
                                <td>$ap->timestamp</td>
                                <td>$approvedStatus</td>
                                <td>$ap->symptom</td>
                                <td>$ap->info</td>
                                <td>$ap->created_at</td>
                                <td>$ap->updated_at</td>
                                <td>
                                    <form action='$submitPath' method='POST'>
                                        <input type='hidden' name='appointment_id' value='$ap->id'/>
                                        <input type='submit' name='submit' value='Delete'/>
                                    </form>
                                </td>
                            </tr>
                        ";
                    } 
                ?>
            </tbody>
        </table>
    </main>

    <script src="<?php echo js('jquery.min.js');?>"></script>
    <script src="<?php echo js('datatable.min.js');?>"></script>
    <script>
        $(document).ready(function () {
            $('#table').DataTable({
                dom: 'Bfrtip',
                // buttons: [
                //     'copy', 'csv', 'excel', 'pdf', 'print'
                // ]
            });
            $('.close').click(function() {
                $('.alert').slideUp()
            })
        });
    </script>
</body>

</html>