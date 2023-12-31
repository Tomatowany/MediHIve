<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = $_SESSION['role'].'~ Patient List';
$patient_page = 'active';
require_once('db-head.php');
?>

<body>
    <?php
    require_once('../../classes/database.php');
    require_once('db-navbar.php');
    require_once('db-sidenav.php');
    ?>
    <main>
        <div class=" container-fluid">
            <div class="row d-flex align-items-center mb-3">
                <h1 class="col-sm-10 col-lg-4 d-flex justify-content-center" style="font-weight: 700;">List of Patients
                </h1>
                <button class="btn btn-add btn-outline-secondary col-sm-12 col-lg-7 d-flex justify-content-center align-items-center ms-auto me-5"
                    style="max-width: 110px; min-height: 46px; border-radius: 25px;" id="addbutt"
                    onclick="location.href='addpatient.php';">
                    <i class="fa fa-plus brand-color me-2" aria-hidden="true"></i>
                    Patient</button>
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
                        <th scope="col">Email</th>
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
                                    <?= $item['pFName'] . " " . $item['pLName'] ?>
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
                                    <?= $item['email'] ?>
                                </td>
                                <td>
                                    <?= $item['sex'] ?>
                                </td>
                                <td class="text-center">
                                    <?php
                                        if(isset( $_SESSION['role'])){
                                            if( $_SESSION['role'] == "Admin") {
                                    ?>
                                    <a href="editpatient.php?id=<?php echo $item['patientID']; ?>"><i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="deletepatient.php?id=<?php echo $item['patientID']; ?>"
                                        onclick="return confirm('Are you sure you want to delete <?php if($item['sex']!= 'Female'){echo 'Mr. '; }else{echo 'Ms. ';} echo $item['pFName'] . ' ' . $item['pLName'] ?>?')"><i
                                            class="fa fa-trash" aria-hidden="true"></i></a>
                                    <?php
                                            }
                                        }
                                    ?>
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
            $('#patient').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf'
                ]
            });
        });
    </script>
</body>

</html>