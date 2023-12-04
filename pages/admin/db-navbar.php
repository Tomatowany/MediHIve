<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
            aria-controls="offcanvasExample">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="dashboard.php"><img src="../../img/MediHive.svg" alt="logo" srcset=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <form class="d-flex ms-auto" role="search">
                <div class="input-group my-3 my-lg-0">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"
                        style="border: 1px solid #ced4da;"><i class="bi bi-search"></i></button>
                    <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                        aria-describedby="button-addon2">
                </div>
            </form>

            <ul class="navbar-nav me-3 mx-3  mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-person-badge"></i>
                        Dropdown
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown"">
                <li>
                    <?php
                    if (isset($_SESSION['user'])) {
                        ?>
                        <a href=" ../../pages/admin/logout.php" class="dropdown-item"><span>Logout</span></a>
                            <?php
                    }
                    ?>
                </li>
            </ul>

        </div>
    </div>
</nav>