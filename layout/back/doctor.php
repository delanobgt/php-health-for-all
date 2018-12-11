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
    <link rel="stylesheet" href="<?php echo css('home.css') ?>">
    <link rel="stylesheet" href="<?php echo css('datatable.min.css') ?>">
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
                    <th>Specialist</th>
                    <th>Gender</th>
                    <th>Description</th>
                    <th>Approved</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($doctors as $doctor) {
                        $submitPath = path('back/doctor.php');
                        $approvedStatus = $doctor->approved ? 'APPROVED' : 'DISAPPROVED';
                        $approvedForm = $doctor->approved ? "
                            <td>
                                <form action='$submitPath' method='POST'>
                                    <input type='hidden' name='doctor_id' value='$doctor->id'/>
                                    <input type='submit' name='submit' value='Disapprove'/>
                                </form>
                            </td>
                        " : "
                            <td>
                                <form action='$submitPath' method='POST'>
                                    <input type='hidden' name='doctor_id' value='$doctor->id'/>
                                    <input type='submit' name='submit' value='Approve'/>
                                </form>
                            </td>
                        ";
                        echo "
                            <tr>
                                <td>$doctor->id</td>
                                <td>$doctor->name</td>
                                <td>$doctor->email</td>
                                <td>$doctor->age</td>
                                <td>$doctor->specialist</td>
                                <td>$doctor->gender</td>
                                <td>$doctor->description</td>
                                <td>$approvedStatus</td>
                                <td>$doctor->created_at</td>
                                <td>$doctor->updated_at</td>
                                $approvedForm
                                <td>
                                    <form action='$submitPath' method='POST'>
                                        <input type='hidden' name='doctor_id' value='$doctor->id'/>
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