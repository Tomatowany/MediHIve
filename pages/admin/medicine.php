<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = $_SESSION['role'].'~ List of Medicines';
$medicine_page = 'active';
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
                <h1 class="col-sm-12 col-lg-5 d-flex justify-content-center" style="font-weight: 700;">List of Medicines
                </h1>
                <button class="btn btn-add btn-outline-secondary col-sm-12 col-lg-7 d-flex justify-content-center align-items-center ms-auto me-5"
                    style="max-width: 130px; min-height: 46px; border-radius: 25px;" id="addbutt"
                    onclick="location.href='addmedicine.php';">
                    <i class="fa fa-plus brand-color me-2" aria-hidden="true"></i>
                    Medicine</button>
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
                                    <?php
                                        if(isset( $_SESSION['role'])){
                                            if( $_SESSION['role'] == "Admin") {
                                    ?>
                                    <a href="editmedicine.php?id=<?php echo $item['medicineID']; ?>"><i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="deletemedicine.php?id=<?php echo $item['medicineID']; ?>"
                                        onclick="return confirm('Are you sure you want to delete medicine #<?php echo $item['medicineID'].' '.$item['medicineName'] ?>?')"><i
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