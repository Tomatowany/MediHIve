<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = $_SESSION['role'].'~ Overview';
$dashboard_page = 'active';
require_once('db-head.php');
?>

<body>
    <?php
    require_once('../../classes/database.php');
    require_once('db-navbar.php');
    require_once('db-sidenav.php');
    $db = new Database();
    
    ?>
    <main>
        <div class="container-fluid">
            <div class="row">
                <h1 class="col-sm-12 col-lg-3 d-flex justify-content-center"
                    style="font-weight: 800;">Dashboard
                </h1>
            </div>
            <div class="row my-3">
                <div class="col-sm-12 col-md-4 my-1">
                    <div class="card mb-3 w-auto h-100">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h2 class="card-title text-center fs-4" style="font-weight: 600;">Total Staff Count</h2>
                            <p class="card-text text-center">Active medical staff members</p>
                            <?php
                            $sql = "SELECT COUNT(staffID) FROM staff;";
                            $query = $db->connect()->prepare($sql);
                            $query->execute();
                            $num_of_cols = $query->fetchColumn();
                            echo ' <h1 class="card-title text-center" style="font-weight: 700; margin-bottom: 0;">'.$num_of_cols.'</h1>';
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 my-1">
                    <div class="card mb-3 w-auto h-100">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h2 class="card-title text-center fs-4" style="font-weight: 600;">Staff-to-Patient Ratio</h2>
                            <p class="card-text text-center">As of :
                                <span class="card-text text-center" id="demo" style="font-weight: 700;">
                                <?php
                                    echo date("m-d-Y");
                                ?>
                                </span>
                            </p>
                            <?php
                            $sql = "SELECT ((
                                (SELECT COUNT(s.staffID)
                                 FROM staff AS s) /
                                (SELECT COUNT(p.patientID)
                                 FROM patient AS p) )) AS ratio";
                            $query = $db->connect()->prepare($sql);
                            $query->execute();
                            $result = $query->fetch(PDO::FETCH_ASSOC);
                            echo '<h1 class="card-title text-center" style="font-weight: 700;">'.round($result['ratio'], 2).'</h1>';
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 my-1">
                    <div class="card mb-3 w-auto h-100">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h2 class="card-title text-center fs-4" style="font-weight: 600;">Total Patient Count</h2>
                            
                            <?php
                            $sql = "";
                            if(isset($_SESSION['data'])){
                                if($_SESSION['data']['role'] == "Admin"){
                                    echo '<p class="card-text text-center">All staff</p>';
                                    $sql = "SELECT COUNT(patientID) FROM patient";
                                } else {
                                    echo '<p class="card-text text-center">Of '.$_SESSION['data']['lastName'].'</p>';
                                    $sql = "SELECT COUNT(patientID) FROM patient WHERE staffID = ".$_SESSION['data']['staffID'];
                                }
                            }
                            
                            $query = $db->connect()->prepare($sql);
                            $query->execute();
                            $num_of_cols = $query->fetchColumn();
                            echo '<h1 class="card-title text-center" style="font-weight: 700;">'.$num_of_cols.'</h1>';
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
        <div class="lamesa table-responsive-lg mx-auto" >
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
                                    <?= $item['consultationID'] ?>
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