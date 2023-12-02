<header class="navbar brand-bg-color flex-md-nowrap p-2 admin">
    <div class="col-md-3 col-lg-2 admin-header">
        <a class="navbar-brand" href="../../index.php"><img src="../../img/MediHive_Icon.svg" alt="icon"> <img src="../../img/MediHive.svg" alt="logo" srcset=""></a>
    </div>
    <!-- toggler -->
    <button class="navbar-toggler d-md-none collapsed me-2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <nav class="navbar navbar-expand-md navbar-dark d-none d-md-block">
        <div class="container-fluid">
            <div class="navbar-collapse offcanvas-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle color-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../img/staff/ballaho.png" class="rounded-circle me-1" alt="User Image" width="30px" height="30px"">
                            User Name
                        </a>
                        <ul class="dropdown-menu dropdown-profile" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
            aria-controls="offcanvasExample">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="dashboard.php"><img src="../../img/MediHive_Icon.svg" alt="icon"> <img src="../../img/MediHive.svg" alt="logo" srcset=""></a>
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
                            <li><a class=" dropdown-item" href="#">Account Settings</a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Logout</a></li>
            </ul>
            </li>
            </ul>

        </div>
    </div>
</nav>