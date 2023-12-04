<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = 'Admin~Staff';
$staff_page = 'active';
require_once('db-head.php');
?>

<body>
    <?php
    require_once('../../classes/database.php');
    require_once('db-navbar.php');
    require_once('db-sidenav.php');
    ?>
    <main>
        <div class="container-fluid mt-4 mb-1">
            <div class="row">
                <h1 class="col-sm-12 col-lg-4 d-flex justify-content-center" style="font-weight: 700;">Staff Master List
                </h1>
                <button class="btn btn-add btn-outline-secondary col-sm-12 col-lg-12 w-25 ms-auto me-3 mb-2"
                    style="max-width: 100px; border-radius: 25px;" type="button"
                    onclick="location.href='addstaff.php';">
                    <i class="fa fa-plus brand-color me-2" aria-hidden="true"></i>
                    Staff</button>
            </div>
        </div>

        <?php
        require_once '../../classes/staff.class.php';
        require_once '../../tools/functions.php';
        ?>

        <?php
        $staff = new Staff();

        // Fetch staff data (you should modify this to retrieve data from your database)
        $staffArray = $staff->show();
        ?>
        <div class="lamesa table-responsive-lg mx-auto">
            <table id="staff" class="table mx-auto table-responsive-lg table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Staff ID</th>
                        <th scope="col">Staff Name</th>
                        <th scope="col">Contact Info</th>
                        <th scope="col">Address</th>
                        <th scope="col">Email</th>
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
                                    <?= $item['staffID'] ?>
                                </td>
                                <td>
                                    <?= $item['firstName'] . " " . $item['lastName'] ?>
                                </td>
                                <td>
                                    <?= $item['contact'] ?>
                                </td>
                                <td>
                                    <?= $item['address'] ?>
                                </td>
                                <td>
                                    <?= $item['email'] ?>
                                </td>
                                <td class="text-center">
                                    <a href="editstaff.php?id=<?php echo $item['staffID']; ?>"><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i></a>
                                    <a href="deletestaff.php?id=<?php echo $item['staffID']; ?>"
                                        onclick="return confirm('Are you sure you want to delete <?php echo $item['lastName'] ?> as staff?')"><i
                                            class="fa fa-trash" aria-hidden="true"></i></a>
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
            $('#staff').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf'
                ]
            });
        });
    </script>
</body>

</html>