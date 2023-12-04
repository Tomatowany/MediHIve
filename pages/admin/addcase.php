<?php
    
    require_once '../../classes/case.class.php';
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

        $case = new Casee();
        //sanitize
        $case->caseName = htmlentities($_POST['caseName']);
        $case->caseDescription = htmlentities($_POST['caseDescription']);

        //validate
        if (validate_field($case->caseName) &&
        validate_field($case->caseDescription))
        // validate_field($staff->role) &&
        // validate_field($staff->email) &&
        // validate_field($staff->password) &&
        // validate_field($staff->status) &&
        // validate_password($staff->password) &&
        // validate_email($staff->email) && !$staff->is_email_exist()){
            if($case->add()){
                header('location: case.php');
            }else{
                echo 'An error occured while adding in the database.';
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'Add Case';
    $case_page = 'active';
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
            <div class="row">
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="col-12 col-lg-6 d-flex justify-content-between align-items-center">
                        <h2 class="h3 brand-color pt-3 pb-2">Add Case</h2>
                        <a href="case.php" class="text-primary text-decoration-none"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                    </div>
                    <div class="col-12 col-lg-6">
                        <form method="post" action="">
                            <div class="mb-2">
                                <label for="caseName" class="form-label">Case Name</label>
                                <input type="text" class="form-control" id="caseName" name="caseName" required value="<?php if(isset($_POST['caseName'])) { echo $_POST['caseName']; } ?>">
                                <?php
                                    if(isset($_POST['caseName']) && !validate_field($_POST['caseName'])){
                                ?>
                                        <p class="text-danger my-1">Case name is required</p>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="mb-2">
                                <label for="caseDescription" class="form-label">Case Description</label>
                                <input type="text" class="form-control" id="caseDescription" name="caseDescription" required value="<?php if(isset($_POST['caseDescription'])) { echo $_POST['caseDescription']; } ?>">
                                <?php
                                    if(isset($_POST['caseDescription']) && !validate_field($_POST['caseDescription'])){
                                ?>
                                        <p class="text-danger my-1">Case Description is required</p>
                                <?php
                                    }
                                ?>
                            </div>
                            <button type="submit" name="save" class="btn btn-primary mt-2 mb-3 brand-bg-color" id="addCaseButton">Add Case</button>
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