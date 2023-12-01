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
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            </div>
                            <div class="modal-footer">
                                <button class="btn" data-bs-target="#medistaff" data-bs-toggle="modal">Login as Medical Staff</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal2 -->
                <div class="modal fade" id="medistaff" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="medistaffLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            </div>
                            <div class="modal-footer">
                                <button class="btn" data-bs-target="#patient" data-bs-toggle="modal">Login as Patient</button>
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