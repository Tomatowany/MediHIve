<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = 'Admin~Medicines';
$medicine_page = 'active';
require_once('staff-head.php');
?>

<body>
    <?php
    require_once('../../classes/database.php');
    require_once('staff-navbar.php');
    require_once('staff-sidenav.php');
    ?>
    
    <main>
        <div class="container-fluid mb-1">
            <div class="row">
                <h1 class="col-sm-12 col-lg-4 d-flex justify-content-center" style="font-weight: 700;">Medicine List
                </h1>
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
            <table id="medicine" class="table mx-auto table-responsive-lg table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Medicine ID</th>
                        <th scope="col">Medicine Name</th>
                        <th scope="col">Medicine Description</th>
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
            $('#medicine').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf'
                ]
            });
        });
    </script>
</body>

</html>