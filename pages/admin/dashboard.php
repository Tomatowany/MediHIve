<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = 'Admin Overview';
$dashboard_page = 'active';
require_once('db-head.php');
?>

<body>
    <?php
    require_once('../../classes/database.php');
    require_once('db-navbar.php');
    require_once('db-sidenav.php');
    ?>
    <main>
        <div class="container-fluid my-1">
            <div class="row">
                <h1 class="col-sm-12 col-lg-3 d-flex justify-content-center"
                    style="font-weight: 700;">Overview
                </h1>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4 mb-2">
                    <div class="card mb-3 w-auto h-100 p-0">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h2 class="card-title text-center fs-3">Total Staff Count</h2>
                            <p class="card-text text-center">Active medical staff members</p>
                            <?php
                            $this->db=new Database();
                            $sql = "SELECT COUNT(staffID) FROM staff;";
                            $result = $query-fetch($dbc, $sql);
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <h1 class="card-title text-center" style="font-weight: 700; margin-bottom: 0;">
                                    <?php echo $row['COUNT(staffID)'] . "<br>"; ?>
                                </h1>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 mb-2">
                    <div class="card mb-3 w-auto h-100">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h2 class="card-title text-center fs-3">Staff-to-Patient Ratio</h2>
                            <p class="card-text text-center">As of :
                                <span class="card-text text-center" id="demo" style="font-weight: 700;"></span>
                            </p>
                            <script>
                                const d = new Date();
                                const datetime = d.toLocaleString("en-US", "short");
                                document.getElementById("demo").innerHTML = datetime;
                            </script>
                            <?php
                            $sql = "SELECT ((
                                (SELECT COUNT(s.staffID)
                                 FROM staff AS s) /
                                (SELECT COUNT(p.patientID)
                                 FROM patient AS p) )) AS ratio";
                            $result = mysqli_query($dbc, $sql);
                            while ($row = $result->fetch_assoc()) {
                                $ratio = $row["ratio"];
                                ?>
                                <h1 class="card-title text-center" style="font-weight: 700;">
                                    <?php echo round($ratio, 2) . "<br>"; ?>
                                </h1>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 mb-2">
                    <div class="card mb-3 w-auto h-100">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h2 class="card-title text-center fs-3">Total Patient Count</h2>
                            <p class="card-text text-center">By Staff</p>
                            <?php
                            $sql = "SELECT COUNT(patientID) FROM patient;";
                            $result = mysqli_query($dbc, $sql);
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <h1 class="card-title text-center" style="font-weight: 700;">
                                    <?php echo $row['COUNT(patientID)'] . "<br>"; ?>
                                </h1>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
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