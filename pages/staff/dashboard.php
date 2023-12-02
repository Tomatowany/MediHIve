<!DOCTYPE html>
<html lang="en">
<?php
$title = 'Staff Overview';
$dashboard_page = 'active';
require_once('staff-head.php');
?>

<body>
    <?php
    require_once('staff-navbar.php');
    ?>
    <?php
    require_once('staff-sidenav.php');
    ?>
    <main class="mt-2">
        <div class="container-fluid mt-4 mb-2">
            <div class="row">
                <h1 class="col-sm-12 col-lg-3 mb-4 d-flex justify-content-center">Overview</h1>
            </div>
            <div class="row">
                <div class="col-sm-4 col-md-4 mb-2">
                    <div class="card mb-3 h-100">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h2 class="card-title text-center">Total Staff Count</h2>
                            <p class="card-text text-center">There are</p>
                            <h1 class="card-title text-center" id="staffcount">67</h1>
                            <p class="card-text text-center">active medical staff members</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 mb-2">
                    <div class="card mb-3 h-100">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h2 class="card-title text-center">Staff-to-Patient Ratio</h2>
                            <p class="card-text text-center">As of current date</p>
                            <h1 class="card-title text-center" id="ratio">0.67</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 mb-2">
                    <div class="card mb-3 h-100">
                        <div class="card-body d-flex flex-column justify-content-center mt-3">
                            <h2 class="card-title text-center">Total Patient Count</h2>
                            <p class="card-text text-center">You have served</p>
                            <h1 class="card-title text-center" id="patientcount">227</h1>
                            <p class="card-text text-center">Patients</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        require_once '../../classes/case.class.php';
        require_once '../../tools/functions.php';

        $case = new Casee();

        // Fetch staff data (you should modify this to retrieve data from your database)
        $caseArray = $case->show();
        $counter = 1;

        ?>
        <div class="container-fluid px-4">
            <div class="row">
                <h1 class="col-sm-12 col-lg-3 mb-1 d-flex justify-content-center">Patients</h1>
            </div>
            <div class="datatable table-responsive">
                <table id="staff" class="table table-striped table-sm table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Case Name</th>
                            <th scope="col">Case Description</th>
                            <th scope="col" width="5%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
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
                                        <a href="editcase.php?id=<?php echo $item['caseID']; ?>"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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
            </div>

        </div>

    </main>

    <script>new DataTable('#staff');</script>

    <?php
    require_once('../../includes/js.php');
    ?>
</body>

</html>