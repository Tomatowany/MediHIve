<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = 'Admin~Medicines';
$medicine_page = 'active';
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
                <h1 class="col-sm-12 col-lg-4 d-flex justify-content-center" style="font-weight: 700;">Medicine List
                </h1>
                <a href="addmedicine.php" class="btn btn-primary brand-bg-color mb-3">Add Medicine</a>
            </div>
        </div>

        <?php
        require_once '../../classes/medicine.class.php';
        require_once '../../tools/functions.php';
        ?>

        <?php
        $medicine = new Medicine();

        // Fetch staff data (you should modify this to retrieve data from your database)
        $medicineArray = $medicine->show();
        ?>
        <div class="lamesa table-responsive-lg mx-auto">
            <table id="overview" class="table mx-auto table-responsive-lg table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Medicine ID</th>
                        <th scope="col">Medicine Name</th>
                        <th scope="col">Medicine Description</th>
                        <th scope="col" width="5%">Action</th>
                    </tr>
                </thead>
                <tbody id="medicineTableBody">
                    <?php
                    if ($medicineArray) {
                        foreach ($medicineArray as $item) {
                            ?>
                            <tr>
                                <td>
                                    <?= $item['medicineID'] ?>
                                </td>
                                <td>
                                    <?= $item['medicineName'] ?>
                                </td>
                                <td>
                                    <?= $item['medicineDescription'] ?>
                                </td>
                                <td class="text-center">
                                    <a href="editmedicine.php?id=<?php echo $item['medicineID']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="deletemedicine.php?id=<?php echo $item['medicineID']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
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