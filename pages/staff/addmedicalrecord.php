<?php
    
    require_once '../../classes/medicalrecord.class.php';
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

    if(isset($_POST['save'])){

        $medicalrecord = new MedicalRecord();
        //sanitize
        $medicalrecord->patientID = htmlentities($_POST['patientID']);
        $medicalrecord->staffID = htmlentities($_POST['staffID']);
        $medicalrecord->diagnosis = htmlentities($_POST['diagnosis']);
        $medicalrecord->datetime = htmlentities($_POST['datetime']);

        //validate
        if (validate_field($medicalrecord->patientID) &&
        validate_field($medicalrecord->staffID) &&
        validate_field($medicalrecord->diagnosis) &&
        validate_field($medicalrecord->datetime))
        // validate_field($staff->role) &&
        // validate_field($staff->email) &&
        // validate_field($staff->password) &&
        // validate_field($staff->status) &&
        // validate_password($staff->password) &&
        // validate_email($staff->email) && !$staff->is_email_exist()){
            if($medicalrecord->add()){
                header('location: medical-record.php');
            }else{
                echo 'An error occured while adding in the database.';
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'Add Case';
    $record_page = 'active';
    require_once('staff-head.php');
?>
<body>
    <?php
        require_once('../../classes/database.php');
        require_once('staff-navbar.php');
    ?>
    <main>
        <div class="container-fluid">
            <div class="row">
                <?php
                    require_once('staff-sidenav.php');
                ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="col-12 col-lg-6 d-flex justify-content-between align-items-center">
                        <h2 class="h3 brand-color pt-3 pb-2">Add Medical Record</h2>
                        <a href="medical-record.php" class="text-primary text-decoration-none"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                    </div>
                    <div class="col-12 col-lg-6">
                        <form method="post" action="">
                            <div class="mb-2">
                                <label for="patientID" class="form-label">Patient ID</label>
                                <input type="text" class="form-control" id="patientID" name="patientID" required value="<?php if(isset($_POST['patientID'])) { echo $_POST['patientID']; } ?>">
                                <?php
                                    if(isset($_POST['patientID']) && !validate_field($_POST['patientID'])){
                                ?>
                                        <p class="text-danger my-1">Patient ID is required</p>
                                <?php
                                    }
                                ?>
                            </div>

                            <div class="mb-2">
                                <label for="staffID" class="form-label">Staff ID</label>
                                <input type="text" class="form-control" id="staffID" name="staffID" required value="<?php if(isset($_POST['staffID'])) { echo $_POST['staffID']; } ?>">
                                <?php
                                    if(isset($_POST['staffID']) && !validate_field($_POST['staffID'])){
                                ?>
                                        <p class="text-danger my-1">Staff ID is required</p>
                                <?php
                                    }
                                ?>
                            </div>

                            <div class="mb-2">
                                <label for="diagnosis" class="form-label">Diagnosis</label>
                                <input type="text" class="form-control" id="diagnosis" name="diagnosis" required value="<?php if(isset($_POST['diagnosis'])) { echo $_POST['diagnosis']; } ?>">
                                <?php
                                    if(isset($_POST['diagnosis']) && !validate_field($_POST['diagnosis'])){
                                ?>
                                        <p class="text-danger my-1">Diagnosis is required</p>
                                <?php
                                    }
                                ?>
                            </div>

                            <div class="mb-2">
                                <label for="datetime" class="form-label">Datetime</label>
                                <input type="datetime-local" class="form-control" id="datetime" name="datetime" required value="<?php if(isset($_POST['datetime'])) { echo $_POST['datetime']; } ?>">
                                <?php
                                    if(isset($_POST['datetime']) && !validate_field($_POST['datetime'])){
                                ?>
                                        <p class="text-danger my-1">Datetime is required</p>
                                <?php
                                    }
                                ?>
                            </div>
  
                            <button type="submit" name="save" class="btn btn-primary mt-2 mb-3 brand-bg-color" id="addMedicalRecordButton">Add Medical Record</button>
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