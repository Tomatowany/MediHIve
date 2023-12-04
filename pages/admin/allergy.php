<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = 'Admin~Allergies';
$allergy_page = 'active';
require_once('db-head.php');
?>

<body>
    <?php
    require_once('../../classes/database.php');
    require_once('db-navbar.php');
    require_once('db-sidenav.php');
    ?>
    <main class="mt-2">
        <div class="container-fluid mt-4 mb-1">
            <div class="row">
                <h1 class="col-sm-12 col-lg-4 d-flex justify-content-center" style="font-weight: 700;">Allergy List
                </h1>
                <button class="btn btn-add btn-outline-secondary col-sm-12 col-lg-12 w-25 ms-auto me-3 mb-2"
                    style="max-width: 115px; border-radius: 25px;" type="button"
                    onclick="location.href='addallergy.php';">
                    <i class="fa fa-plus brand-color me-2" aria-hidden="true"></i>
                    Allergy</button>
            </div>
        </div>

        <?php
        require_once '../../classes/allergy.class.php';
        require_once '../../tools/functions.php';
        ?>

        <?php
        $allergy = new Allergy();

        // Fetch staff data (you should modify this to retrieve data from your database)
        $allergyArray = $allergy->show();
        ?>
        <div class="lamesa table-responsive-lg mx-auto">
            <table id="allergy" class="table mx-auto table-responsive-lg table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Allergy ID</th>
                        <th scope="col">Allergy Name</th>
                        <th scope="col">Allergy Description</th>
                        <th scope="col" width="5%">Action</th>
                    </tr>
                </thead>
                <tbody id="allergyTableBody">
                    <?php
                    if ($allergyArray) {
                        foreach ($allergyArray as $item) {
                            ?>
                            <tr>
                                <td>
                                    <?= $item['allergyID'] ?>
                                </td>
                                <td>
                                    <?= $item['allergyName'] ?>
                                </td>
                                <td>
                                    <?= $item['allergyDescription'] ?>
                                </td>
                                <td class="text-center">
                                    <a href="editallergy.php?id=<?php echo $item['allergyID']; ?>"><i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="deleteallergy.php?id=<?php echo $item['allergyID']; ?>"
                                        onclick="return confirm('Are you sure you want to delete allergy #<?php echo $item['allergyID'] . ' ' . $item['allergyName'] ?>?')"><i
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
            $('#allergy').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf'
                ]
            });
        });
    </script>
</body>

</html>