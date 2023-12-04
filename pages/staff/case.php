<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = 'Admin~Cases';
$case_page = 'active';
$cond = 'true';
require_once('staff-head.php');
?>

<body>
    <?php
    require_once('../../classes/database.php');
    require_once('staff-navbar.php');
    require_once('staff-sidenav.php');
    ?>
    <main>
        <div class="container-fluid">
            <div class="row d-flex align-items-center mb-3">
                <h1 class="col-sm-12 col-lg-4 d-flex justify-content-center" style="font-weight: 700;">List of Cases
                </h1>
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