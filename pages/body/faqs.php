<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'FAQs';
    require_once('../../includes/shared/head-index.php');
?>
<body>
    <?php  
        require_once('../../includes/shared/header-nav.php');
    ?>
    <main>
        <section id="AU-banner">
            <div class="AUbanner-bg">
                <div class="blackBG">
                    <h1 id="faqlabel">Frequently Asked Questions (FAQs)</h1>
                    <ul class="accordion">
                        <li>
                            <input type="radio" name="accordion" id="first" checked>
                            <label for="first">How to login as a patient?</label>
                            <div class="content">
                                <p>Simply click on the login button and select PATIENT, then provide the necessary information and you're all set.</p>
                            </div>
                        </li>
                        <li>
                            <input type="radio" name="accordion" id="second">
                            <label for="second">How to login as a medical practitioner?</label>
                            <div class="content">
                                <p>Simply click on the login button and select MEDICAL STAFF, then provide the necessary information and you're all set.</p>
                            </div>
                        </li>
                        <li>
                            <input type="radio" name="accordion" id="third">
                            <label for="third">What can I do if the information reflected in the portal is incorrect?</label>
                            <div class="content">
                                <p>You can contact your healthcare provider and notify them of the incorrect information reflection in your patient portal.</p>
                            </div>
                        </li>
                        <li>
                            <input type="radio" name="accordion" id="fourth">
                            <label for="fourth">Who can use MediHive?</label>
                            <div class="content">
                                <p>Any healthcare provider (e.g., hospitals and clinics) can easily establish their very own MediHive Electronic Medical Record System.</p>
                            </div>
                        </li>
                        <li>
                            <input type="radio" name="accordion" id="fifth">
                            <label for="fifth">Are my information secured?</label>
                            <div class="content">
                                <p>MediHive adheres to the different laws crafted and implemented to protect personal data. Rest assured that MediHive utilizes patient data in a manner that benefits the patient and only the patient.</p>
                            </div>
                        </li>
                        <li>
                            <input type="radio" name="accordion" id="sixth">
                            <label for="sixth">How to setup an account?</label>
                            <div class="content">
                                <p>For medical staff, you may contact you MediHive admin.<br>For patients, you may ask for your credentials from your healthcare provider to access your patient portal for that provider.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </main>
    <?php
      require_once('../../includes/shared/footer-index.php');
    ?>
    <?php
        require_once('../../includes/js.php');
    ?>
</body>
</html>