<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = 'Admin~Cases';
$case_page = 'active';
$dropshow = "show";
require_once('db-head.php');
?>

<body>
    <?php
    require_once('../../classes/database.php');
    require_once('db-navbar.php');
    require_once('db-sidenav.php');
    ?>
    <main>
        <div class="container-fluid">
            <div class="row d-flex align-items-center mb-3">
                <h1 class="col-sm-12 col-lg-4 d-flex justify-content-center" style="font-weight: 700;">List of Cases
                </h1>
                <button
                    class="btn btn-add btn-outline-secondary col-sm-12 col-lg-8 d-flex justify-content-center align-items-center ms-auto me-5"
                    style="max-width: 100px; min-height: 46px; border-radius: 25px;" id="addbutt"
                    onclick="location.href='addcase.php';">
                    <i class="fa fa-plus brand-color me-2" aria-hidden="true"></i>
                    Case</button>
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
                                    <?php
                                        if(isset( $_SESSION['role'])){
                                            if( $_SESSION['role'] == "Admin") {
                                    ?>
                                    <a href="editcase.php?id=<?php echo $item['caseID']; ?>"><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i></a>
                                    <a href="deletecase.php?id=<?php echo $item['caseID']; ?>"
                                        onclick="return confirm('Are you sure you want to delete case #<?php echo $item['caseID'] . ' ' . $item['caseName'] ?>?')"><i
                                            class="fa fa-trash" aria-hidden="true"></i></a>
                                    <?php
                                            }
                                        }
                                    ?>
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
            $('#case').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf'
                ]
            });
        });
    </script>
</body>

</html>