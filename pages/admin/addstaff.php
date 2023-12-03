<?php
    
    require_once '../../classes/staff.class.php';
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

        $staff = new Staff();
        //sanitize
        $staff->firstName = htmlentities($_POST['firstName']);
        $staff->lastName = htmlentities($_POST['lastName']);
        $staff->contact = htmlentities($_POST['contact']);
        $staff->password = htmlentities($_POST['password']);
        $staff->address = htmlentities($_POST['address']);
        $staff->email = htmlentities($_POST['email']);

        //validate
        if (validate_field($staff->firstName) &&
        validate_field($staff->lastName) &&
        validate_field($staff->contact) &&
        validate_field($staff->password) &&
        validate_field($staff->address) &&
        validate_field($staff->email))
        // validate_field($staff->role) &&
        // validate_field($staff->email) &&
        // validate_field($staff->password) &&
        // validate_field($staff->status) &&
        // validate_password($staff->password) &&
        // validate_email($staff->email) && !$staff->is_email_exist()){
            if($staff->add()){
                header('location: staff.php');
            }else{
                echo 'An error occured while adding in the database.';
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'Add Staff';
    $staff_page = 'active';
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
                        <h2 class="h3 brand-color pt-3 pb-2">Add Staff</h2>
                        <a href="staff.php" class="text-primary text-decoration-none"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                    </div>
                    <div class="col-12 col-lg-6">
                        <form method="post" action="">
                            <div class="mb-2">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" required value="<?php if(isset($_POST['firstName'])) { echo $_POST['firstName']; } ?>">
                                <?php
                                    if(isset($_POST['firstName']) && !validate_field($_POST['firstName'])){
                                ?>
                                        <p class="text-danger my-1">First name is required</p>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="mb-2">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" required value="<?php if(isset($_POST['lastName'])) { echo $_POST['lastName']; } ?>">
                                <?php
                                    if(isset($_POST['lastName']) && !validate_field($_POST['lastName'])){
                                ?>
                                        <p class="text-danger my-1">Last Name is required</p>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="mb-2">
                                <label for="contact" class="form-label">Staff Contact</label>
                                <input type="text" class="form-control" id="contact" name="contact" required value="<?php if(isset($_POST['contact'])) { echo $_POST['contact']; } ?>">
                                <?php
                                    if(isset($_POST['contact']) && !validate_field($_POST['contact'])){
                                ?>
                                        <p class="text-danger my-1">Staff Contact is required</p>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="mb-2">
                                <label for="password" class="form-label">Staff Password</label>
                                <input type="text" class="form-control" id="password" name="password" required value="<?php if(isset($_POST['password'])) { echo $_POST['password']; } ?>">
                                <?php
                                    if(isset($_POST['password']) && !validate_field($_POST['password'])){
                                ?>
                                        <p class="text-danger my-1">Staff Password is required</p>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="mb-2">
                                <label for="address" class="form-label">Staff Address</label>
                                <input type="text" class="form-control" id="address" name="address" required value="<?php if(isset($_POST['address'])) { echo $_POST['address']; } ?>">
                                <?php
                                    if(isset($_POST['address']) && !validate_field($_POST['address'])){
                                ?>
                                        <p class="text-danger my-1">Staff Address is required</p>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="mb-2">
                                <label for="email" class="form-label">Staff Email</label>
                                <input type="text" class="form-control" id="email" name="email" required value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>">
                                <?php
                                    if(isset($_POST['email']) && !validate_field($_POST['email'])){
                                ?>
                                        <p class="text-danger my-1">Staff Email is required</p>
                                <?php
                                    }
                                ?>
                            </div>
                            <button type="submit" name="save" class="btn btn-primary mt-2 mb-3 brand-bg-color" id="addStaffButton">Add Staff</button>
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