<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'About MediHive';
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
                    <div class="AUlogo">
                        <img src="../../img/MediHive_Icon.svg" class="icon1 img-fluid" alt="icon">
                        <img src="../../img/MediHive.svg" class="icon2 img-fluid" alt="medihive">
                    </div> 
                    <p class="words">MediHive is a digital repository of a patient's health information, providing healthcare providers 
                        with centralized access to up-to-date data. It streamlines administrative tasks, enhances coordination among professionals, 
                        and ensures data accuracy, contributing to increased efficiency and productivity in healthcare. EMRs empower patients by 
                        allowing them to actively engage in their healthcare and support research by utilizing aggregated and anonymized data. 
                        They play a crucial role in enhancing healthcare quality, safety, and coordination while maintaining patient-centric practices.</p>
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