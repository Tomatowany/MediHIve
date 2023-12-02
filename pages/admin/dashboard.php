<!DOCTYPE html>
<html lang="en">
<?php
    $title = 'MediHive ~ ADMIN';
    $dashboard_page = 'active';
    require_once('../../pages/admin/db-head.php');
?>
<body>
    <?php
        require_once('../../pages/admin/db-navbar.php');
    ?>
    
    <main>
        <div class="container-fluid">
            <div class="row">
                <?php
                    require_once('../../pages/admin/db-sidenav.php');
                ?>
                <main class="col-md-9 ms-sm-auto col-lg-10 ">
                    <h1 class="h3 brand-color pt-3">Overview</h1>
                </main>
            </div>
        </div>
    </main>
    <?php
        require_once('../../includes/js.php');
    ?>
</body>
</html>