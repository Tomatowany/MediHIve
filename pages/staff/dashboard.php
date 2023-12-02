<!DOCTYPE html>
<html lang="en">
<?php
$title = 'MediHive ~ Staff';
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

    <main class="mt-5 pt-3">
        <h1 class="mt-5" style="margin-left: 3rem;">Overview</h1>
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title">Total Staff Count</h1>
                            <p class="card-text">active medical staff members</p>
                            <h1 class="card-title" id="staffcount">67</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title">Staff-to-Patient Ratio</h1>
                            <p class="card-text">As of current date</p>
                            <h1 class="card-title" id="ratio">0.67</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title">Total Patient Count</h1>
                            <p class="card-text">Patients</p>
                            <h1 class="card-title" id="staffcount">227</h1>
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
                                        <td><?= $counter ?></td>
                                        <td><?= $item['caseName'] ?></td> 
                                        <td><?= $item['caseDescription'] ?></td>
                                        <td class="text-center">
                                            <a href="editcase.php?id=<?php echo $item['caseID']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            <a href="deletecase.php?id=<?php echo $item['caseID']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
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

    </main>



    <?php
    require_once('../../includes/js.php');
    ?>
</body>

</html>