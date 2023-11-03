<?php
    require_once './tools/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php
    require_once('includes/shared/head-login.php')
?>
<body>
    <section class="container-fluid container-bg p-3 p-md-5">
        <div class="my-container row d-flex justify-content-center align-items-center">
            <div class="first-column col-12 col-md-6 d-flex justify-content-center flex-column">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="khair.jikiri2020@gmail.com" required value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="" required value="<?php if(isset($_POST['password'])){ echo $_POST['password']; } ?>">
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required value="<?php if(isset($_POST['confirmPassword'])){ echo $_POST['confirmPassword']; } ?>">
                    </div>
                </form>

                <div class="icon-logo-1">
                    <img src="img/MediHive_Icon.svg" alt="icon">
                </div>
                <div class="icon-logo-2">
                    <img src="img/MediHive.svg" alt="text">
                </div>
                <div class="motto">
                    <h2>Health and Technology Intertwined </h2>
                </div>
            </div>
            <div class="sec-column col-12 col-md-4 d-flex justify-content-center flex-column">
                <div class="row">
                    <form action="" method="POST">
                        <div class="namesfl">
                            <div class="fname mb-3">
                                <label for="firstName" class="form-label">First name</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Shan Khair" required value="<?php if(isset($_POST['firstName'])){ echo $_POST['firstName']; } ?>">
                            </div>
                            <div class="lname mb-3">
                                <label for="lastName" class="form-label">Last name</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Jikiri" required value="<?php if(isset($_POST['lastName'])){ echo $_POST['lastName']; } ?>">
                            </div>
                        </div>
                        <div class="genderc mb-3">
                            <label for="gender" class="form-label">Gender</label>
                                <div class="row">
                                    <div class="col">
                                        <label for="male"><input type="radio" id="male" name="gender" value="Male" required <?php if(isset($_POST['gender']) && $_POST['gender'] == 'Male') echo 'checked'; ?>> Male</label>
                                        <label for="female"><input type="radio" id="female" name="gender" value="Female" required <?php if(isset($_POST['gender']) && $_POST['gender'] == 'Female') echo 'checked'; ?>> Female</label>
                                    </div>
                                </div>
                        </div>
                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact</label>
                            <input type="text" class="form-control" id="contact" name="contact" placeholder="(+63) 945-1830-519" required value="<?php if(isset($_POST['contact'])){ echo $_POST['contact']; } ?>">
                        </div>
                        <div class="mb-3">
                            <label for="hospCode" class="form-label">Hospital code</label>
                            <input type="text" class="form-control" id="hospCode" name="hospCode" required value="<?php if(isset($_POST['hospCode'])){ echo $_POST['hospCode']; } ?>">
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label">Position</label>
                            <input type="text" class="form-control" id="position" name="position" required value="<?php if(isset($_POST['position'])){ echo $_POST['position']; } ?>">
                        </div>
                        
                        <button type="submit" name="signup" class="btn btn-primary brand-bg-color">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
        require_once('includes/js.php');
    ?>
</body>
</html>