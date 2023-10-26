<?php
    require_once './tools/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php
    require_once('./includes/login-signup/head.log.sig.php')
?>
<body>
    <section class="container-fluid container-bg p-3 p-md-5">
        <div class="row d-flex justify-content-center align-items-center my-container">

            <div class="first-column col-12 col-md-6 d-flex justify-content-center flex-column">
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
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full name</label>
                                <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Shan Khair Jikiri" value="<?php if(isset($_POST['fullName'])){ echo $_POST['fullName']; } ?>">
                                <?php
                                    if(isset($_POST['fullName']) && !validate_fn($_POST)){
                                ?>
                                    <p class='brand-color'>Please enter your name.</p>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="khair.jikiri2020@gmail.com" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>">
                                <?php
                                    if(isset($_POST['email']) && !validate_fn($_POST)){
                                ?>
                                    <p class='brand-color'>Please enter your name.</p>
                                <?php
                                    }
                                ?>
                            </div>

                            <div class="mb-3">
                                <label for="contact" class="form-label">Contact</label>
                                <input type="text" class="form-control" id="contact" name="contact" placeholder="(+63) 945-1830-519" value="<?php if(isset($_POST['contact'])){ echo $_POST['contact']; } ?>">
                                <?php
                                    if(isset($_POST['contact']) && !validate_c($_POST)){
                                ?>
                                    <p class='brand-color'>Please enter a valid number.</p>
                                <?php
                                    }
                                ?>
                            </div>

                            <div class="mb-3">
                                <label for="hospCode" class="form-label">Hospital code</label>
                                <input type="text" class="form-control" id="hospCode" name="hospCode" value="<?php if(isset($_POST['hospCode'])){ echo $_POST['hospCode']; } ?>">
                                <?php
                                    if(isset($_POST['hospCode']) && !validate_hc($_POST)){
                                ?>
                                    <p class='brand-color'>Unknown hospital code</p>
                                <?php
                                    }
                                ?>
                            </div>                            

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="" value="<?php if(isset($_POST['password'])){ echo $_POST['password']; } ?>">
                            </div>
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" value="<?php if(isset($_POST['confirmPassword'])){ echo $_POST['confirmPassword']; } ?>">
                                <?php
                                    if(isset($_POST['password']) && isset($_POST['confirmPassword']) && !validate_cp($_POST)){
                                ?>
                                    <p class='brand-color'>The password did not match.</p>
                                <?php
                                    }
                                ?>
                            </div>
                            <button type="submit" class="btn btn-primary brand-bg-color">Sign Up</button>
                </div>
            </div>
        </div>
    </section>
    <!-- <section class="p-3 p-md-5">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-5">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" value="<?php if(isset($_POST['firstName'])){ echo $_POST['firstName']; } ?>">
                            <?php
                                if(isset($_POST['firstName']) && !validate_fn($_POST)){
                            ?>
                                <p class='brand-color'>Please enter a valid first name.</p>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" value="<?php if(isset($_POST['lastName'])){ echo $_POST['lastName']; } ?>">
                            <?php
                                if(isset($_POST['lastName']) && !validate_ln($_POST)){
                            ?>
                                <p class='brand-color'>Please enter a valid last name.</p>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?php if(isset($_POST['password'])){ echo $_POST['password']; } ?>">
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" value="<?php if(isset($_POST['confirmPassword'])){ echo $_POST['confirmPassword']; } ?>">
                            <?php
                                if(isset($_POST['password']) && isset($_POST['confirmPassword']) && !validate_cp($_POST)){
                            ?>
                                <p class='brand-color'>The password did not match.</p>
                            <?php
                                }
                            ?>
                        </div>
                        <button type="submit" class="btn btn-primary brand-bg-color">Sign Up</button>
                </div>
            </div>
        </section> -->

    <?php
        require_once('./includes/login-signup/js.php');
    ?>
</body>
</html>