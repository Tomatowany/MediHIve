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

    if(isset($_GET['id'])){
        $case =  new Casee();
        $record = $case->fetch($_GET['id']);
        $case->id = $record['caseID'];
        $case->caseName = $record['caseName'];
        $case->caseDescription = $record['caseDescription'];
    }

    if(isset($_POST['save'])){
        $case = new Casee();
        //sanitize
        $case->id = $_GET['id'];
        $case->caseName = htmlentities($_POST['caseName']);
        $case->caseDescription = htmlentities($_POST['caseDescription']);
        //validate
        if (validate_field($case->caseName) &&
        validate_field($case->caseDescription)
        ){
                    if($case->edit()){
                        header('location: case.php');
                    }else{
                        echo 'An error occured while adding in the database.';
                    } 
                }
            }
?>
<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'Edit Case';
    $case_page = 'active';
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
                        <h2 class="h3 brand-color pt-3 pb-2">Edit Case</h2>
                        <a href="case.php" class="text-primary text-decoration-none"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                    </div>
                    <div class="col-12 col-lg-6">
                        <form method="post" action="">
                            <div class="mb-2">
                                <label for="caseName" class="form-label">Case Name</label>
                                <input type="text" class="form-control" id="caseName" name="caseName" required value="<?php if(isset($_POST['caseName'])) { echo $_POST['caseName']; }else if(isset($case->caseName)) { echo $case->caseName; } ?>">
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
                                <input type="text" class="form-control" id="caseDescription" name="caseDescription" required value="<?php if(isset($_POST['caseDescription'])) { echo $_POST['caseDescription']; }else if(isset($case->caseDescription)) { echo $case->caseDescription; } ?>">
                                <?php
                                    if(isset($_POST['caseDescription']) && !validate_field($_POST['caseDescription'])){
                                ?>
                                        <p class="text-danger my-1">Case Description is required</p>
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