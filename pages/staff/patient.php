<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = 'Patients';
$patient_page = 'active';
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
        <div class="container-fluid my-5">
            <div class="row">
                <h1 class="col-sm-12 col-lg-3 mb-4 d-flex justify-content-center">Patients</h1>

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
        <div id="MyButtons" class="d-flex mb-md-2 mb-lg-0 col-12 col-md-auto"></div>
        <div class="container-fluid px-4" style="margin-top: 10rem;">
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
        </div>

    </main>



    <?php
    require_once('../../includes/js.php');
    ?>
</body>

</html>