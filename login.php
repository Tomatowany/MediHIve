<!DOCTYPE html>
<html lang="en">
<?php
    require_once('./includes/login-signup/head.log.sig.php')
?>
<body>
    <section class="container-fluid container-bg">
        <div class="row d-flex justify-content-center align-items-center my-container">

            <div class="first-column col-12 col-md-8 d-flex justify-content-center flex-column">
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

                <form action="">
                    <div><label for="hosp-code">Hospital Code</label></div>
                    <div><input type="text" name="hospital-code" id="hospital-code" placeholder="Enter hospital code" required></div>    

                    <div><label for="email">Email</label></div>
                    <div><input type="text" name="email" id="email" placeholder="Enter email" required></div>

                    <div><label for="password">Password</label></div>
                    <div><input type="password" name="password" id="password" placeholder="Enter password" required></div>             

                    <div class="login-btn-2"><input type="submit" value="Log in"></div>

                    <p><a href="#">Forgot password?</a></p>
                </form>

                <button type="submit" onclick="location.href='signup.php';" class="login-btn-2">Create new account</button>

                <div class="or-line">
                    <img src="img/or.svg" alt="or-line">
                </div>

                <div id="g_id_onload"
                    data-client_id="YOUR_GOOGLE_CLIENT_ID"
                    data-login_uri="https://your.domain/your_login_endpoint"
                    data-auto_prompt="false">
                </div>
                <div class="g_id_signin"
                    data-type="standard"
                    data-size="large"
                    data-theme="outline"
                    data-text="continue_with"
                    data-shape="pill"
                    data-logo_alignment="center">
                </div>
            </div>

        </div>
    </section>

    <?php
        require_once('./includes/login-signup/js.php');
    ?>
</body>
</html>