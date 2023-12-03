<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = 'Admin M-Record';
$record_page = 'active';
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
                <h1 class="col-sm-12 col-lg-5 d-flex justify-content-center" style="font-weight: 700;">Medical Record List
                </h1>
                <a href="addmedicalrecord.php" class="btn btn-primary brand-bg-color mb-3">Add Medical Record</a>
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
            <table id="medicalrecord" class="table mx-auto table-responsive-lg table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Medical Record ID</th>
                        <th scope="col">Patient ID</th>
                        <th scope="col">Staff ID</th>
                        <th scope="col">Diagnosis</th>
                        <th scope="col">Date Time</th>
                        <th scope="col" width="5%">Action</th>
                    </tr>
                </thead>
                <tbody id="medicalrecordTableBody">
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
                                <td class="text-center">
                                    <a href="editmedicalrecord.php?id=<?php echo $item['medical_recordID']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="deletemedicalrecord.php?id=<?php echo $item['medical_recordID']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
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