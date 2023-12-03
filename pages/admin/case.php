<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = 'Admin~Cases';
$case_page = 'active';
$cond = 'true';
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
                <h1 class="col-sm-12 col-lg-3 d-flex justify-content-center" style="font-weight: 700;">Case List
                </h1>
                <!-- <button class="btn btn-add btn-outline-secondary col-sm-12 col-lg-12 w-25 ms-auto me-3 mb-2"
                    style="max-width: 110px; border-radius: 25px;" type="button" data-bs-toggle="modal"
                    data-bs-target="#addStaffModal"><i class="fa fa-plus brand-color me-2" aria-hidden="true"></i>
                    Case</button> -->
                    <a href="addcase.php" class="btn btn-primary brand-bg-color mb-3">Add Case</a>
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
        ?>
        <div class="lamesa table-responsive-lg mx-auto">
            <table id="case" class="table mx-auto table-responsive-lg table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Case ID</th>
                        <th scope="col">Case Name ID</th>
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
                                    <?= $item['caseID'] ?>
                                </td>
                                <td>
                                    <?= $item['caseName'] ?>
                                </td>
                                <td>
                                    <?= $item['caseDescription'] ?>
                                </td>
                                <td class="text-center">
                                    <a href="editcase.php?id=<?php echo $item['caseID']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="deletecase.php?id=<?php echo $item['caseID']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
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