<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse" style>
    <div class="position-sticky pt-3">
        <ul class="nav flex-column" id="menu">
            <li class="nav-item">
                <a class="nav-link text-dark <?= $dashboard_page ?>" aria-current="page" href="dashboard.php">
                    <i class="fa fa-tachometer" aria-hidden="true"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item text-dark">
                <a class="nav-link text-dark <?= $staff_page ?>" href="">
                    <i class="fa fa-file-text" aria-hidden="true"></i>
                    Staff
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark <?= $patients_page ?>" href="patient.php">
                    <i class="fa fa-file-text" aria-hidden="true"></i>
                    Patients
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark <?= $record_page ?>" href="#">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    Medical Record
                </a>
            </li>
            <li class="nav-item disabled">
                <a class="nav-link text-dark" href="#submenu" data-bs-toggle="collapse">
                    <i class="fa fa-ticket" aria-hidden="true"></i>
                    Library
                    <i class="fa fa-caret-down"></i>
                </a><a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button"
                    aria-expanded="false" aria-controls="collapseExample">
                    Link with href
                </a>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        Some placeholder content for the collapse component. This panel is hidden by default but
                        revealed when the user activates the relevant trigger.
                    </div>
                </div>
                <ul class="nav collapse ms-1 flex-column" id="submenu" data-bs-parent="#menu">
                    <li class="nav-item">
                        <a class="nav-link text-dark <?= $case_page ?>" href="#cases" aria-current="page">Cases</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark <?= $medicine_page ?>" href="#medicines">Medicines</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark <?= $allergy_page ?>" href="#allergies">Allergies</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark <?= $settings_page ?>" href="#">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    Settings
                </a>
            </li>
            <hr class="d-md">
            <li class="nav-item outlog">
                <a class="nav-link text-dark" href="#">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>