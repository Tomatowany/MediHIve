<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = 'Admin P-Record';
$patient_page = 'active';
require_once('db-head.php');
?>

<body>
    <?php
    require_once('../../classes/database.php');
    require_once('db-navbar.php');
    ?>
    <?php
    require_once('db-sidenav.php');
    ?>
    <main class="mt-2">
        <div class="container-fluid mt-4 mb-1">
            <div class="row">
                <h1 class="col-sm-12 col-lg-3 d-flex justify-content-center" style="font-weight: 700;">Patient List
                </h1>
                <!-- <button class="btn btn-add btn-outline-secondary col-sm-12 col-lg-12 w-25 ms-auto me-3 mb-2"
                    style="max-width: 110px; border-radius: 25px;" type="button" data-bs-toggle="modal"><i
                        class="fa fa-plus brand-color me-2" aria-hidden="true"></i>
                    Patient</button> -->
                <a href="addpatient.php" class="btn btn-primary brand-bg-color mb-3">Add Patient</a>
            </div>
        </div>

        <?php
        require_once '../../classes/patient.class.php';
        require_once '../../tools/functions.php';
        ?>

        <?php
        $patient = new Patient();

        // Fetch staff data (you should modify this to retrieve data from your database)
        $patientArray = $patient->show();
        ?>
        <div class="lamesa table-responsive-lg mx-auto">
            <table id="patient" class="table mx-auto table-responsive-lg table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Patient ID</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Patient Type</th>
                        <th scope="col">Blood Type</th>
                        <th scope="col">Birthdate</th>
                        <th scope="col">Sex</th>
                        <th scope="col" width="5%">Action</th>

                    </tr>
                </thead>
                <tbody id="patientTableBody">
                    <?php
                    if ($patientArray) {
                        foreach ($patientArray as $item) {
                            ?>
                            <tr>
                                <td>
                                    <?= $item['patientID'] ?>
                                </td>
                                <td>
                                    <?= $item['pLName']. ", " .$item['pFName']?>
                                </td>
                                <td>
                                    <?= $item['patientType'] ?>
                                </td>
                                <td>
                                    <?= $item['bloodType'] ?>
                                </td>
                                <td>
                                    <?= $item['birthdate'] ?>
                                </td>
                                <td>
                                    <?= $item['sex'] ?>
                                </td>
                                <td class="text-center">
                                    <a href="editpatient.php?id=<?php echo $item['patientID']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="deletepatient.php?id=<?php echo $item['patientID']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <?php
    require_once('../../includes/js.php');
    ?>
    <script>
        $(document).ready(function () {
            $('#overview').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf'
                ]
            });
        });
    </script>
</body>

</html>