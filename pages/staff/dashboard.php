<!DOCTYPE html>
<html lang="en">
<?php
$title = 'MediHive ~ Staff';
$dashboard_page = 'active';
require_once('staff-head.php');
?>

<body>
    <?php
    require_once('../../classes/database.php');
    require_once('staff-navbar.php');
    ?>
    <?php
    require_once('staff-sidenav.php');
    ?>

    <main class="mt-5 pt-3">
        <div class="container-fluid mt-4">
            <div class="row">
                <h1 class="my-3" style="margin-left: 3rem;">Overview</h1>
            </div>
            <div class="row">
                <div class="col-sm-4 col-md-4 mb-2">
                    <div class="card mb-3 h-100">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h2 class="card-title text-center">Total Staff Count</h2>
                            <p class="card-text text-center">There are</p>
                            <?php
                                $sql = "SELECT COUNT(staffID) FROM staff;";                       
                                $result = mysqli_query($dbc, $sql);
                                while ($row = $result->fetch_assoc()) {
                            ?>
                            <h1 class="card-title text-center"><?php echo $row['COUNT(staffID)']."<br>";?></h1>
                            <?php
                                }
                            ?>
                            <p class="card-text text-center">active medical staff members</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 mb-2">
                    <div class="card mb-3 h-100">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h2 class="card-title text-center">Staff-to-Patient Ratio</h2>
                            <p class="card-text text-center">As of <p class="card-text text-center" id="demo"></p></p>
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
                                <h1 class="card-title text-center"><?php echo round($ratio, 2) ."<br>";?></h1>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 mb-2">
                    <div class="card mb-3 h-100">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h2 class="card-title text-center">Total Patient Count</h2>
                            <p class="card-text text-center">You have served</p>
                            <?php
                                $sql = "SELECT COUNT(patientID) FROM patient;";                       
                                $result = mysqli_query($dbc, $sql);
                                while ($row = $result->fetch_assoc()) {
                            ?>
                            <h1 class="card-title text-center"><?php echo $row['COUNT(patientID)']."<br>";?></h1>
                            <?php
                                }
                            ?>
                            <p class="card-text text-center">patients</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        require_once '../../classes/case.class.php';
        require_once '../../tools/functions.php';
        ?>

        <?php
        $case = new Casee();

        // Fetch staff data (you should modify this to retrieve data from your database)
        $caseArray = $case->show();
        $counter = 1;
        ?>
        
        <table id="staff" class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Case Name</th>
                    <th scope="col">Case Description</th>
                    <th scope="col" width="5%">Action</th>
                </tr>
            </thead>
            <tbody id="caseTableBody">
                <?php
                if ($caseArray) {
                    foreach ($caseArray as $item) {
                        ?>
                        <tr>
                            <td>
                                <?= $counter ?>
                            </td>
                            <td>
                                <?= $item['caseName'] ?>
                            </td>
                            <td>
                                <?= $item['caseDescription'] ?>
                            </td>
                            <td class="text-center">
                                <a href="editcase.php?id=<?php echo $item['caseID']; ?>"><i class="fa fa-pencil-square-o"
                                        aria-hidden="true"></i></a>
                                <a href="deletecase.php?id=<?php echo $item['caseID']; ?>"><i class="fa fa-trash"
                                        aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <?php
                        $counter++;
                    }
                }
                ?>
            </tbody>
        </table>

    </main>



    <?php
    require_once('../../includes/js.php');
    ?>
</body>

</html>