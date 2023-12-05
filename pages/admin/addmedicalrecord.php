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
if (!isset($_SESSION['user']) || $_SESSION['user'] != 'staff') {
    header('location: ./index.php');
}

//if the above code is false then html below will be displayed

if (isset($_POST['save'])) {

    $medicalrecord = new MedicalRecord();
    //sanitize
    $medicalrecord->patientID = htmlentities($_POST['patientID']);
    $medicalrecord->staffID = htmlentities($_POST['staffID']);
    $medicalrecord->diagnosis = htmlentities($_POST['diagnosis']);
    $medicalrecord->datetime = htmlentities($_POST['datetime']);

    //validate
    if (
        validate_field($medicalrecord->patientID) &&
        validate_field($medicalrecord->staffID) &&
        validate_field($medicalrecord->diagnosis) &&
        validate_field($medicalrecord->datetime)
    )
        // validate_field($staff->role) &&
        // validate_field($staff->email) &&
        // validate_field($staff->password) &&
        // validate_field($staff->status) &&
        // validate_password($staff->password) &&
        // validate_email($staff->email) && !$staff->is_email_exist()){
        if ($medicalrecord->add()) {
            header('location: medical-record.php');
        } else {
            echo 'An error occured while adding in the database.';
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
$title = 'Add Record';
$record_page = 'active';
require_once('db-head.php');
?>

<body>
    <?php
    require_once('../../classes/database.php');
    require_once('db-navbar.php');
    require_once('db-sidenav.php');
    $db = new Database();
    ?>
    <main>
        <div class="container-fluid">
            <div class="row d-flex align-items-center mb-5">
                <h1 class="col-sm-12 col-lg-8 d-flex justify-content-center"
                    style="font-weight: 700; margin-bottom: 0;">Add Medical Record Data
                </h1>
                <a href="medical-record.php"
                    class="text-primary text-decoration-none col-sm-12 col-lg-2 d-flex align-items-center justify-content-end"><i
                        class="fa fa-arrow-left me-1" aria-hidden="true"></i>Back</a>
            </div>
            <div class="row d-flex justify-content-center align-items-center">
                <form method="post" action="">
                    <div class="row d-flex justify-content-center w-50 mx-auto">
                        <div class="mb-2">
                            <label for="patientID" class="form-label">Patient ID</label>
                            <select class="form-control" id="patientID" name="patientID">
                            <option value="0">SELECT PATIENT</option>
                            <?php
                             $stmt = $db->connect()->query("SELECT * FROM patient");
                             while ($row = $stmt->fetch()) {
                                 echo "<option value='".$row["patientID"]."'>".$row["pFName"].", ".$row["pLName"]."</option>";
                             }
                            if (isset($_POST['patientID']) && !validate_field($_POST['patientID'])) {
                                ?>
                                <p class="text-danger my-1">Patient ID is required</p>
                                <?php
                            }
                            ?>
                            </select>
                        </div>

                        <div class="mb-2">
                            <?php if(isset($_SESSION['data'])):
                                if($_SESSION['role'] == "Admin"){
                            ?>
                            <label for="staffID" class="form-label">Staff ID</label>
                            <select class="form-control" id="staffID" name="staffID">
                                <option value="0">SELECT STAFF</option>
                            <?php
                                $stmt = $db->connect()->query("SELECT * FROM staff where role != 'Admin'");
                                while ($row = $stmt->fetch()) {
                                    echo "<option value='".$row["staffId"]."'>".$row["lastName"].", ".$row["firstName"]."</option>";
                                }
                            ?>
                            </select>
                            <?php
                                } else {
                            ?>
                            <input type="hidden" id="staffID" name="staffID" value="<?php echo $_SESSION['data']['staffID']; ?>" >
                            <?php }
                            endif; ?>
                        </div>

                        <div class="mb-2">
                            <label for="diagnosis" class="form-label">Diagnosis</label>
                            
                            <textarea class="form-control" id="diagnosis" name="diagnosis" required value="<?php if (isset($_POST['diagnosis'])) {
                                echo $_POST['diagnosis'];
                            } ?>">
                            </textarea>
                            <?php
                            if (isset($_POST['diagnosis']) && !validate_field($_POST['diagnosis'])) {
                                ?>
                                <p class="text-danger my-1">Diagnosis is required</p>
                                <?php
                            }
                            ?>
                        </div>

                        <div class="mb-2">
                            <label for="datetime" class="form-label">Datetime</label>
                            <input type="datetime-local" class="form-control" id="datetime" name="datetime" required
                                value="<?php if (isset($_POST['datetime'])) {
                                    echo $_POST['datetime'];
                                } ?>">
                            <?php
                            if (isset($_POST['datetime']) && !validate_field($_POST['datetime'])) {
                                ?>
                                <p class="text-danger my-1">Datetime is required</p>
                                <?php
                            }
                            ?>
                        </div>

                        <div class="row d-flex justify-content-center">
                            <button onclick="history.back()"
                                class="btn btn-primary mt-2 mb-3 brand-bg-color col-sm-4 col-md-3 me-4">Cancel</button>
                            <button type="submit" name="save"
                                class="btn btn-primary mt-2 mb-3 brand-bg-color col-sm-4 col-md-3 ms-4"
                                id="addMedicalRecordButton">Add Record</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php
    require_once('../../includes/js.php')
        ?>
</body>

</html>