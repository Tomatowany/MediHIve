<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'MediHive';
    require_once('../../includes/shared/head-index.php');
?>
<body id="loginop">
    <button onclick="history.back()" id="back"><img src="../../img/login/backarrow.svg" alt="back arrow">Back</button>
    <main id="logmain">
        <div class="logcontainer container-fluid">
            <div class="loglabel container-fluid">
                <h2>You're here as a ...</h2>
            </div>
            <div class="modals">
                <!-- Button trigger modal -->
                <button class="btns container-fluid" data-bs-toggle="modal" data-bs-target="#patient"><img src="../../img/login/pasyente.png" alt="patient"><h2>Patient</h2></button>
                <button class="btns container-fluid" data-bs-toggle="modal" data-bs-target="#medistaff"><img src="../../img/login/medistaff.png" alt="medical staff"><h2>Staff</h2></button>
                <!-- Modal1 -->
                <div class="modal fade" id="patient" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="patientLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row container-fluid">
                                    <div class="col">
                                        <div class="icon1">
                                            <img src="../../img/MediHive_Icon.svg" alt="icon">
                                        </div>
                                        <div class="icon2">
                                            <img src="../../img/MediHive.svg" alt="text">
                                        </div>                  
                                        <div class="motto">
                                            <h2>Health and Technology Intertwined </h2>
                                        </div>
                                    </div>
                                    <div class="v-line col"></div>
                                    <div class="Lform col">
                                        <h1>Welcome!</h1>
                                        <form action="" method="POST">
                                            <div><label for="hosp-code">Patient ID</label></div>
                                            <div><input type="text" name="hospital-code" id="hospital-code" placeholder="What's your patient id?" required></div>    

                                            <div><label for="email">Email</label></div>
                                            <div><input type="text" name="email" id="email" placeholder="landiaoaj@gmail.com" required></div>     

                                            <button type="submit" name="login" class="login-btn">Log in</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn" id="MstoPa" data-bs-target="#medistaff" data-bs-toggle="modal" data-bs-dismiss="modal">Login as Medical Staff</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal2 -->
                <div class="modal fade" id="medistaff" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="medistaffLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <div class="row container-fluid">
                                    <div class="col">
                                        <div class="icon1">
                                            <img src="../../img/MediHive_Icon.svg" alt="icon">
                                        </div>
                                        <div class="icon2">
                                            <img src="../../img/MediHive.svg" alt="text">
                                        </div>                  
                                        <div class="motto">
                                            <h2>Health and Technology Intertwined </h2>
                                        </div>
                                    </div>
                                    <div class="v-line col"></div>
                                    <div class="Lform col">
                                        <h1>Hello!</h1>
                                        <form action="" method="POST">
                                            <div><label for="email">Email</label></div>
                                            <div class><input type="email" class="form-control" name="email" id="email" placeholder="medihive@gmail.com" required></div>

                                            <div><label for="password">Password</label></div>
                                            <div><input type="password" name="password" id="password" placeholder="*********" required></div>             

                                            <button type="submit" name="login" class="login-btn">Log in</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn" id="PatoMs" data-bs-target="#patient" data-bs-toggle="modal" data-bs-dismiss="modal">Login as Patient</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <?php
        require_once('../../includes/js.php');
    ?>
</body>
</html>