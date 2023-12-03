<?php
    
    require_once '../../classes/allergy.class.php';
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
        $allergy =  new Allergy();
        $record = $allergy->fetch($_GET['id']);
        $allergy->id = $record['allergyID'];
        $allergy->allergyName = $record['allergyName'];
        $allergy->allergyDescription = $record['allergyDescription'];
    }

    if(isset($_POST['save'])){
        $allergy = new Allergy();
        //sanitize
        $allergy->id = $_GET['id'];
        $allergy->allergyName = htmlentities($_POST['allergyName']);
        $allergy->allergyDescription = htmlentities($_POST['allergyDescription']);
        //validate
        if (validate_field($allergy->allergyName) &&
        validate_field($allergy->allergyDescription)
        ){
                    if($allergy->edit()){
                        header('location: allergy.php');
                    }else{
                        echo 'An error occured while adding in the database.';
                    } 
                }
            }
?>
<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'Edit Allergy';
    $allergy_page = 'active';
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
                        <h2 class="h3 brand-color pt-3 pb-2">Edit Allergy</h2>
                        <a href="allergy.php" class="text-primary text-decoration-none"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                    </div>
                    <div class="col-12 col-lg-6">
                        <form method="post" action="">
                            <div class="mb-2">
                                <label for="allergyName" class="form-label">Allergy Name</label>
                                <input type="text" class="form-control" id="allergyName" name="allergyName" required value="<?php if(isset($_POST['allergyName'])) { echo $_POST['allergyName']; }else if(isset($allergy->allergyName)) { echo $allergy->allergyName; } ?>">
                                <?php
                                    if(isset($_POST['allergyName']) && !validate_field($_POST['allergyName'])){
                                ?>
                                        <p class="text-danger my-1">Allergy name is required</p>
                                <?php
                                    }
                                ?>
                            </div>

                            <div class="mb-2">
                                <label for="allergyDescription" class="form-label">Allergy Description</label>
                                <input type="text" class="form-control" id="allergyDescription" name="allergyDescription" required value="<?php if(isset($_POST['allergyDescription'])) { echo $_POST['allergyDescription']; }else if(isset($allergy->allergyDescription)) { echo $allergy->allergyDescription; } ?>">
                                <?php
                                    if(isset($_POST['allergyDescription']) && !validate_field($_POST['allergyDescription'])){
                                ?>
                                        <p class="text-danger my-1">Allergy Description is required</p>
                                <?php
                                    }
                                ?>
                            </div>
                        
                            <button type="submit" name="save" class="btn btn-primary mt-2 mb-3 brand-bg-color" id="addAllergyButton"> Save Allergy</button>
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