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

        <div id="table-container">
            <?php
            require_once '../classes/staff.class.php';
            require_once '../tools/functions.php';

            $staff = new Staff();

            // Fetch staff data (you should modify this to retrieve data from your database)
            $staffArray = $staff->show();
            $counter = 1;

            ?>
            <table id="staff" class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Staff Name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col" width="5%">Action</th>
                    </tr>
                </thead>
                <tbody id="staffTableBody">
                    <?php
                    if ($staffArray) {
                        foreach ($staffArray as $item) {
                            ?>
                            <tr>
                                <td>
                                    <?= $counter ?>
                                </td>
                                <td>
                                    <?= $item['lastname'] . ', ' . $item['firstname'] ?>
                                </td>
                                <td>
                                    <?= $item['role'] ?>
                                </td>
                                <td>
                                    <?= $item['email'] ?>
                                </td>
                                <td>
                                    <?= $item['status'] ?>
                                </td>
                                <td class="text-center"><a href="editstaff.php?id=<?php echo $item['id']; ?>"><i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
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