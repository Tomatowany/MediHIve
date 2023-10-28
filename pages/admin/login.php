<!DOCTYPE html>
<html lang="en">
<?php
    require_once('../../includes/shared/head-login.php')
?>
<body>
    <section class="container-fluid container-bg">
        <div class="my-container row">

            <div class="first-column col-12 col-md-6 d-flex justify-content-center flex-column">
                <a href="index.php">
                    <div class="icon-logo-1">
                        <img src="../../img/MediHive_Icon.svg" alt="icon">
                    </div>
                    <div class="icon-logo-2">
                        <img src="../../img/MediHive.svg" alt="text">
                    </div>
                </a>
                <div class="motto">
                    <h2>Health and Technology Intertwined </h2>
                </div>
            </div>
            <div class="v-line"></div>
            <div class="sec-column col-12 col-md-4 d-flex justify-content-center flex-column">
                <div class="login-title">
                    <h1>Log in</h1>
                </div>
                <form action="">
                    <div><label for="hosp-code">Hospital Code</label></div>
                    <div><input type="text" class="form-control is-valid" name="hospital-code" id="hospital-code" placeholder="What's your hospital code" required></div>    

                    <div><label for="email">Email</label></div>
                    <div><input type="text" name="email" id="email" placeholder="Enter email" required></div>

                    <div><label for="password">Password</label></div>
                    <div><input type="password" name="password" id="password" placeholder="Password" required></div>             

                    <button type="submit" name="login" class="login-btn-2">Log in</button>

                    <p><a href="#">Forgot password?</a></p>
                </form>
        </div>
    </section>

    <?php
        require_once('../../includes/js.php');
    ?>
</body>
</html>