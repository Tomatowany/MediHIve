<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = $_SESSION['role'].'~ List of Allergies';
$allergy_page = 'active';
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
                <h1 class="col-sm-12 col-lg-4 d-flex justify-content-center" style="font-weight: 700;">List of Allergies
                </h1>
                <button class="btn btn-add btn-outline-secondary col-sm-12 col-lg-7 d-flex justify-content-center align-items-center ms-auto me-5"
                    style="max-width: 115px; min-height: 46px; border-radius: 25px;" id="addbutt"
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
                                    <?php
                                        if(isset( $_SESSION['role'])){
                                            if( $_SESSION['role'] == "Admin") {
                                    ?>
                                    <a href="editallergy.php?id=<?php echo $item['allergyID']; ?>"><i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="deleteallergy.php?id=<?php echo $item['allergyID']; ?>"
                                        onclick="return confirm('Are you sure you want to delete allergy #<?php echo $item['allergyID'] . ' ' . $item['allergyName'] ?>?')"><i
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