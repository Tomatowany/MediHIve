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
                <button class="btn btn-add btn-outline-secondary col-sm-12 col-lg-12 w-25 ms-auto me-3 mb-2"
                    style="max-width: 110px; border-radius: 25px;" type="button" data-bs-toggle="modal" data-bs-target="#addStaffModal"><i
                        class="fa fa-plus brand-color me-2" aria-hidden="true"></i>
                    Patient</button>
            </div>
        </div>

        <?php
        require_once '../../classes/overview.show.php';
        require_once '../../tools/functions.php';
        ?>

        <?php
        $overview = new Overview();

        // Fetch staff data (you should modify this to retrieve data from your database)
        $overviewArray = $overview->show();
        ?>
        <div class="lamesa table-responsive-lg mx-auto">
            <table id="overview" class="table mx-auto table-responsive-lg table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Medical Record ID</th>
                        <th scope="col">Patient ID</th>
                        <th scope="col">Staff ID</th>
                        <th scope="col">Diagnosis</th>
                        <th scope="col">Date Time</th>
                    </tr>
                </thead>
                <tbody id="overTableBody">
                    <?php
                    if ($overviewArray) {
                        foreach ($overviewArray as $item) {
                            ?>
                            <tr>
                                <td>
                                    <?= $item['medical_recordID'] ?>
                                </td>
                                <td>
                                    <?= $item['patientID'] ?>
                                </td>
                                <td>
                                    <?= $item['staffID'] ?>
                                </td>
                                <td>
                                    <?= $item['diagnosis'] ?>
                                </td>
                                <td>
                                    <?= $item['datetime'] ?>
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