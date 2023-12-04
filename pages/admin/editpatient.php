<?php
    
    require_once '../../classes/patient.class.php';
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
        $patient =  new Patient();
        $record = $patient->fetch($_GET['id']);
        $patient->id = $record['patientID'];
        $patient->pFName = $record['pFName'];
        $patient->pLName = $record['pLName'];
        $patient->patientType = $record['patientType'];
        $patient->bloodType = $record['bloodType'];
        $patient->birthdate = $record['birthdate'];
        $patient->address = $record['address'];
        $patient->contactNo = $record['contactNo'];
        $patient->civilStatus = $record['civilStatus'];
        $patient->nationality = $record['nationality'];
        $patient->sex = $record['sex'];
        $patient->occupation = $record['occupation'];
    }

    if(isset($_POST['save'])){
        $patient = new Patient();
        //sanitize
        $patient->id = $_GET['id'];
        $patient->pFName = htmlentities($_POST['pFName']);
        $patient->pLName = htmlentities($_POST['pLName']);
        $patient->patientType = htmlentities($_POST['patientType']);
        $patient->bloodType = htmlentities($_POST['bloodType']);
        $patient->birthdate = htmlentities($_POST['birthdate']);
        $patient->address = htmlentities($_POST['address']);
        $patient->contactNo = htmlentities($_POST['contactNo']);
        $patient->civilStatus = htmlentities($_POST['civilStatus']);
        $patient->nationality = htmlentities($_POST['nationality']);
        $patient->sex = htmlentities($_POST['sex']);
        $patient->occupation = htmlentities($_POST['occupation']);
        //validate
        if (validate_field($patient->pFName) &&
        validate_field($patient->pLName) &&
        validate_field($patient->patientType) &&
        validate_field($patient->bloodType) &&
        validate_field($patient->birthdate) &&
        validate_field($patient->address) &&
        validate_field($patient->contactNo) &&
        validate_field($patient->civilStatus) &&
        validate_field($patient->nationality) &&
        validate_field($patient->sex) &&
        validate_field($patient->occupation)
        ){
                    if($patient->edit()){
                        header('location: patient.php');
                    }else{
                        echo 'An error occured while adding in the database.';
                    } 
                }
            }
?>
<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'Edit Patient';
    $patient_page = 'active';
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
                        <h2 class="h3 brand-color pt-3 pb-2">Edit Patient</h2>
                        <a href="patient.php" class="text-primary text-decoration-none"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                    </div>
                    <div class="col-12 col-lg-6">
                        <form method="post" action="">
                            <div class="mb-2">
                                <label for="pFName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="pFName" name="pFName" required value="<?php if(isset($_POST['pFName'])) { echo $_POST['pFName']; }else if(isset($patient->pFName)) { echo $patient->pFName; } ?>">
                                <?php
                                    if(isset($_POST['pFName']) && !validate_field($_POST['pFName'])){
                                ?>
                                        <p class="text-danger my-1">First name is required</p>
                                <?php
                                    }
                                ?>
                            </div>

                            <div class="mb-2">
                                <label for="pLName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="pLName" name="pLName" required value="<?php if(isset($_POST['pLName'])) { echo $_POST['pLName']; }else if(isset($patient->pLName)) { echo $patient->pLName; } ?>">
                                <?php
                                    if(isset($_POST['pLName']) && !validate_field($_POST['pLName'])){
                                ?>
                                        <p class="text-danger my-1">Last name is required</p>
                                <?php
                                    }
                                ?>
                            </div>

                            <div class="form-group mb-2">
                                <label class="form-label">Patient Type</label>
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="inpatient" name="patientType" value="Inpatient" <?php if(isset($_POST['patientType']) && $_POST['patientType'] == 'Inpatient') { echo 'checked'; } else if(isset($patient->patientType) && $patient->patientType == 'Inpatient') { echo 'checked'; } ?>>
                                        <label class="form-check-label" for="inpatient">Inpatient</label>
                                    </div>
                                    <div class="form-check ms-3">
                                        <input type="radio" class="form-check-input" id="outpatient" name="patientType" value="Outpatient" <?php if(isset($_POST['patientType']) && $_POST['patientType'] == 'Outpatient') { echo 'checked'; }else if(isset($patient->patientType) && $patient->patientType == 'Outpatient') { echo 'checked'; } ?>>
                                        <label class="form-check-label" for="outpatient">Outpatient</label>
                                    </div>
                                </div>
                                <?php
                                    if((!isset($_POST['patientType']) && isset($_POST['save'])) || (isset($_POST['patientType']) && !validate_field($_POST['patientType']))){
                                ?>
                                        <p class="text-danger my-1">Select Patient Type</p>
                                <?php
                                    }
                                ?>
                            </div>

                            
                            <div class="form-group mb-2">
                                <label for="bloodType" class="form-label">Blood Type</label>
                                <select name="bloodType" id="bloodType" class="form-select">
                                    <option value="">Select Blood Type</option>
                                    <option value="A" <?php if(isset($_POST['bloodType']) && $_POST['bloodType'] == 'A') { echo 'selected'; }else if(isset($patient->bloodType) && $patient->bloodType == 'A') { echo 'selected'; } ?>>A</option>
                                    <option value="AB" <?php if(isset($_POST['bloodType']) && $_POST['bloodType'] == 'AB') { echo 'selected'; }else if(isset($patient->bloodType) && $patient->bloodType == 'AB') { echo 'selected'; }  ?>>AB</option>
                                    <option value="AB+" <?php if(isset($_POST['bloodType']) && $_POST['bloodType'] == 'AB+') { echo 'selected'; }else if(isset($patient->bloodType) && $patient->bloodType == 'AB+') { echo 'selected'; } ?>>AB Positive</option>
                                    <option value="AB-" <?php if(isset($_POST['bloodType']) && $_POST['bloodType'] == 'AB-') { echo 'selected'; }else if(isset($patient->bloodType) && $patient->bloodType == 'AB-') { echo 'selected'; } ?>>AB Negative</option>
                                    <option value="B" <?php if(isset($_POST['bloodType']) && $_POST['bloodType'] == 'B') { echo 'selected'; }else if(isset($patient->bloodType) && $patient->bloodType == 'B') { echo 'selected'; }  ?>>B</option>
                                    <option value="B+" <?php if(isset($_POST['bloodType']) && $_POST['bloodType'] == 'B+') { echo 'selected'; }else if(isset($patient->bloodType) && $patient->bloodType == 'B+') { echo 'selected'; } ?>>B Positive</option>
                                    <option value="B-" <?php if(isset($_POST['bloodType']) && $_POST['bloodType'] == 'B-') { echo 'selected'; }else if(isset($patient->bloodType) && $patient->bloodType == 'B-') { echo 'selected'; } ?>>B Negative</option>
                                    <option value="O" <?php if(isset($_POST['bloodType']) && $_POST['bloodType'] == 'O') { echo 'selected'; }else if(isset($patient->bloodType) && $patient->bloodType == 'O') { echo 'selected'; }  ?>>O</option>
                                    <option value="O+" <?php if(isset($_POST['bloodType']) && $_POST['bloodType'] == 'O+') { echo 'selected'; }else if(isset($patient->bloodType) && $patient->bloodType == 'O+') { echo 'selected'; } ?>>O Positive</option>
                                    <option value="O-" <?php if(isset($_POST['bloodType']) && $_POST['bloodType'] == 'O-') { echo 'selected'; }else if(isset($patient->bloodType) && $patient->bloodType == 'O-') { echo 'selected'; } ?>>O Negative</option>
                                </select>
                                <?php
                                    if(isset($_POST['role']) && !validate_field($_POST['role'])){
                                ?>
                                        <p class="text-danger my-1">Select staff role</p>
                                <?php
                                    }
                                ?>
                            </div>

                            <div class="mb-2">
                                <label for="birthdate" class="form-label">Birthdate</label>
                                <input type="date" class="form-control" id="birthdate" name="birthdate" required value="<?php if(isset($_POST['birthdate'])) { echo $_POST['birthdate']; }else if(isset($patient->birthdate)) { echo $patient->birthdate; } ?>">
                                <?php
                                    if(isset($_POST['pLName']) && !validate_field($_POST['pLName'])){
                                ?>
                                        <p class="text-danger my-1">Last name is required</p>
                                <?php
                                    }
                                ?>
                            </div>

                            
                            <div class="mb-2">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" required value="<?php if(isset($_POST['address'])) { echo $_POST['address']; }else if(isset($patient->address)) { echo $patient->address; } ?>">
                                <?php
                                    if(isset($_POST['address']) && !validate_field($_POST['address'])){
                                ?>
                                        <p class="text-danger my-1">Addess is required</p>
                                <?php
                                    }
                                ?>
                            </div>

                            <div class="mb-2">
                                <label for="contactNo" class="form-label">Contact Number</label>
                                <input type="text" class="form-control" id="contactNo" name="contactNo" required value="<?php if(isset($_POST['contactNo'])) { echo $_POST['contactNo']; }else if(isset($patient->contactNo)) { echo $patient->contactNo; } ?>">
                                <?php
                                    if(isset($_POST['contactNo']) && !validate_field($_POST['contactNo'])){
                                ?>
                                        <p class="text-danger my-1">Addess is required</p>
                                <?php
                                    }
                                ?>
                            </div>

                            <div class="form-group mb-2">
                                <label for="civilStatus" class="form-label">Civil Status</label>
                                <select name="civilStatus" id="civilStatus" class="form-select">
                                    <option value="">Select Civil Status</option>
                                    <option value="Married" <?php if(isset($_POST['civilStatus']) && $_POST['civilStatus'] == 'Married') { echo 'selected'; }else if(isset($patient->civilStatus) && $patient->civilStatus == 'Married') { echo 'selected'; } ?>>Married</option>
                                    <option value="Single" <?php if(isset($_POST['civilStatus']) && $_POST['civilStatus'] == 'Single') { echo 'selected'; }else if(isset($patient->civilStatus) && $patient->civilStatus == 'Single') { echo 'selected'; }  ?>>Single</option>
                                    <option value="Divorced" <?php if(isset($_POST['civilStatus']) && $_POST['civilStatus'] == 'Divorced') { echo 'selected'; }else if(isset($patient->civilStatus) && $patient->civilStatus == 'Divorced') { echo 'selected'; } ?>>Divorced</option>
                                    <option value="Widowed" <?php if(isset($_POST['civilStatus']) && $_POST['civilStatus'] == 'Widowed') { echo 'selected'; }else if(isset($patient->civilStatus) && $patient->civilStatus == 'Widowed') { echo 'selected'; } ?>>Widowed</option>
                                </select>
                                <?php
                                    if(isset($_POST['civilStatus']) && !validate_field($_POST['civilStatus'])){
                                ?>
                                        <p class="text-danger my-1">Select Civil Status</p>
                                <?php
                                    }
                                ?>
                            </div>


                            <div class="mb-2">
                                <label for="nationality" class="form-label">Nationality</label>
                                <input type="text" class="form-control" id="nationality" name="nationality" required value="<?php if(isset($_POST['nationality'])) { echo $_POST['nationality']; }else if(isset($patient->nationality)) { echo $patient->nationality; } ?>">
                                <?php
                                    if(isset($_POST['nationality']) && !validate_field($_POST['nationality'])){
                                ?>
                                        <p class="text-danger my-1">Addess is required</p>
                                <?php
                                    }
                                ?>
                            </div>

                            <div class="form-group mb-2">
                                <label class="form-label">Sex</label>
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="male" name="sex" value="Male" <?php if(isset($_POST['sex']) && $_POST['sex'] == 'Male') { echo 'checked'; } else if(isset($patient->sex) && $patient->sex == 'Male') { echo 'checked'; } ?>>
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    <div class="form-check ms-3">
                                        <input type="radio" class="form-check-input" id="female" name="sex" value="Female" <?php if(isset($_POST['sex']) && $_POST['sex'] == 'Female') { echo 'checked'; }else if(isset($patient->sex) && $patient->sex == 'Female') { echo 'checked'; } ?>>
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                                </div>
                                <?php
                                    if((!isset($_POST['sex']) && isset($_POST['save'])) || (isset($_POST['sex']) && !validate_field($_POST['sex']))){
                                ?>
                                        <p class="text-danger my-1">Select Sex</p>
                                <?php
                                    }
                                ?>
                            </div>

                            
                            <div class="mb-2">
                                <label for="occupation" class="form-label">Occupation</label>
                                <input type="text" class="form-control" id="occupation" name="occupation" required value="<?php if(isset($_POST['occupation'])) { echo $_POST['occupation']; }else if(isset($patient->occupation)) { echo $patient->occupation; } ?>">
                                <?php
                                    if(isset($_POST['occupation']) && !validate_field($_POST['occupation'])){
                                ?>
                                        <p class="text-danger my-1">Address is required</p>
                                <?php
                                    }
                                ?>
                            </div>
                        
                            <button type="submit" name="save" class="btn btn-primary mt-2 mb-3 brand-bg-color" id="addPatientButton"> Save Patient</button>
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