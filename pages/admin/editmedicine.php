<?php
    
    require_once '../../classes/medicine.class.php';
    require_once '../../tools/functions.php';

    //resume session here to fetch session values
    session_start();
    /*
        if user is not login then redirect to login page,
        this is to prevent users from accessing pages that requires
        authentication such as the dashboard
    */
    if (!isset($_SESSION['user']) || $_SESSION['user'] != 'staff'){
        header('location: ./index.php');
    }
    
    //if the above code is false then html below will be displayed

    if(isset($_GET['id'])){
        $medicine =  new Medicine();
        $record = $medicine->fetch($_GET['id']);
        $medicine->id = $record['medicineID'];
        $medicine->medicineName = $record['medicineName'];
        $medicine->medicineDescription = $record['medicineDescription'];
    }

    if(isset($_POST['save'])){
        $medicine = new Medicine();
        //sanitize
        $medicine->id = $_GET['id'];
        $medicine->medicineName = htmlentities($_POST['medicineName']);
        $medicine->medicineDescription = htmlentities($_POST['medicineDescription']);
        //validate
        if (validate_field($medicine->medicineName) &&
        validate_field($medicine->medicineDescription)
        ){
                    if($medicine->edit()){
                        header('location: medicine.php');
                    }else{
                        echo 'An error occured while adding in the database.';
                    } 
                }
            }
?>
<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'Edit Medicine';
    $medicine_page = 'active';
    require_once('db-head.php');
?>
<body>
    <?php
        require_once('../../classes/database.php');
        require_once('db-navbar.php');
    ?>
    <main>
        <div class="container-fluid">
            <div class="row">
                <?php
                    require_once('db-sidenav.php');
                ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="col-12 col-lg-6 d-flex justify-content-between align-items-center">
                        <h2 class="h3 brand-color pt-3 pb-2">Edit Medicine</h2>
                        <a href="medicine.php" class="text-primary text-decoration-none"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                    </div>
                    <div class="col-12 col-lg-6">
                        <form method="post" action="">
                            <div class="mb-2">
                                <label for="medicineName" class="form-label">Medicine Name</label>
                                <input type="text" class="form-control" id="medicineName" name="medicineName" required value="<?php if(isset($_POST['medicineName'])) { echo $_POST['medicineName']; }else if(isset($medicine->medicineName)) { echo $medicine->medicineName; } ?>">
                                <?php
                                    if(isset($_POST['medicineName']) && !validate_field($_POST['medicineName'])){
                                ?>
                                        <p class="text-danger my-1">Medicine name is required</p>
                                <?php
                                    }
                                ?>
                            </div>

                            <div class="mb-2">
                                <label for="medicineDescription" class="form-label">Medicine Description</label>
                                <input type="text" class="form-control" id="medicineDescription" name="medicineDescription" required value="<?php if(isset($_POST['medicineDescription'])) { echo $_POST['medicineDescription']; }else if(isset($medicine->medicineDescription)) { echo $medicine->medicineDescription; } ?>">
                                <?php
                                    if(isset($_POST['medicineDescription']) && !validate_field($_POST['medicineDescription'])){
                                ?>
                                        <p class="text-danger my-1">Medicine Description is required</p>
                                <?php
                                    }
                                ?>
                            </div>
                        
                            <button type="submit" name="save" class="btn btn-primary mt-2 mb-3 brand-bg-color" id="addMedicineButton"> Save Medicine</button>
                        </form>
                    </div>
                </main>
            </div>
        </div>
    </main>
    <?php
        require_once('../../includes/js.php')
    ?>
</body>
</html>