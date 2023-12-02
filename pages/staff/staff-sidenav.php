<div class="offcanvas offcanvas-start bg-light sidenavbar" tabindex="-1" id="offcanvasExample"
    aria-labelledby="offcanvasExampleLabel" style="border: none;">
    <div class="offcanvas-body p-2">
        <nav class="navbar-light">
            <ul class="navbar-nav nav-pills" id="menus">
                <li class="mb-1">
                    <a href="dashboard.php" class="nav-link px-3 <?= $dashboard_page ?>">
                        <span class="me-2"><i class="bi bi-pie-chart-fill"></i></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="mb-1">
                    <a href="patient.php" class="nav-link px-3 <?= $patient_page ?> ">
                        <span class="me-2"><i class="bi bi-heart-pulse-fill"></i></span>
                        <span>Patient Record</span>
                    </a>
                </li>
                <li class="mb-1">
                    <a href="#" class="nav-link px-3 <?= $record_page ?>">
                        <span class="me-2"><i class="bi bi-folder-fill"></i></span>
                        <span>Medical Record</span>
                    </a>
                </li>
                <li class="mb-1">
                    <a class="nav-link px-3" data-bs-toggle="collapse" href="#submenu" role="button"
                        aria-expanded="false" aria-controls="submenu">
                        <span class="me-2"><i class="bi bi-collection-fill"></i></span>
                        <span>Library</span>
                        <span class="me-1"><i class="bi bi-caret-down-fill"></i></span>
                    </a>
                    <ul class="nav collapse ms-1 flex-column" id="submenu" data-bs-parent="#menus">
                        <li class="mx-5">
                            <a class="nav-link <?= $case_page ?>" href="#cases" active>
                                <span class="me-2"><i class="bi bi-clipboard-heart-fill"></i></span>Cases</a>
                        </li>
                        <li class="mx-5">
                            <a class="nav-link <?= $medicine_page ?>" href="#medicines">
                                <span class="me-2"><i class="bi bi-capsule"></i></span>Medicines</a>
                        </li>
                        <li class="mx-5">
                            <a class="nav-link <?= $allergy_page ?>" href="#allergies">
                                <span class="me-2"><i class="bi bi-virus"></i></span>Allergies</a>
                        </li>
                    </ul>
                </li>
                <li class="mb-1">
                    <a href="#" class="nav-link px-3 <?= $setting_page ?>">
                        <span class="me-2"><i class="bi bi-gear-fill"></i></span>
                        <span>Settings</span>
                    </a>
                </li>
                <li class="mb-1" style="margin-top: 22rem;">
                    <?php
                    if (isset($_SESSION['user'])) {
                        ?>
                        <a href="../../pages/admin/logout.php" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-box-arrow-left"></i></span>
                            <span>Logout</span>
                        </a>
                        <?php
                    }
                    ?>
                </li>
            </ul>
        </nav>
    </div>
</div>