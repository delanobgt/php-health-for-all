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
    <link rel="stylesheet" href="<?php echo css('bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo css('datatable.min.css') ?>">
    <link rel="stylesheet" href="<?php echo css('home.css') ?>">
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Ban</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($patients as $patient) {
                        $submitPath = path('back/patient.php');
                        $banStatus = $patient->ban ? 'BANNED' : '-';
                        $banForm = $patient->ban ? "
                            <td>
                                <form action='$submitPath' method='POST'>
                                    <input type='hidden' name='patient_id' value='$patient->id'/>
                                    <input type='submit' name='submit' value='Unban'/>
                                </form>
                            </td>
                        " : "
                            <td>
                                <form action='$submitPath' method='POST'>
                                    <input type='hidden' name='patient_id' value='$patient->id'/>
                                    <input type='submit' name='submit' value='Ban'/>
                                </form>
                            </td>
                        ";
                        echo "
                            <tr>
                                <td>$patient->id</td>
                                <td>$patient->name</td>
                                <td>$patient->email</td>
                                <td>$patient->age</td>
                                <td>$patient->gender</td>
                                <td>$banStatus</td>
                                <td>$patient->created_at</td>
                                <td>$patient->updated_at</td>
                                $banForm
                                <td>
                                    <form action='$submitPath' method='POST'>
                                        <input type='hidden' name='patient_id' value='$patient->id'/>
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