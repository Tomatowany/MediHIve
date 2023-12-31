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
            <ul class="navbar-nav me-5 mx-auto  mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-person-badge"></i>
                        <?php

                        if (isset($_SESSION['data'])) {
                            echo $_SESSION['data']['role'] . " " . $_SESSION['data']['firstName'];
                        }
                        ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown">
                        <?php
                        if (isset($_SESSION['data'])) {
                            if ($_SESSION['data']['role'] == "Staff") {
                                echo '<li><a class=" dropdown-item" href="#">Account Settings</a>';
                                echo '<li>
                                        <hr class="dropdown-divider">
                                    </li>';
                            }
                        }

                        ?>

                        <li>
                            <?php
                            if (isset($_SESSION['user'])) {
                                ?>
                                <a href="../../pages/admin/logout.php" class="dropdown-item"><span>Logout</span></a>
                                <?php
                            }
                            ?>
                        </li>
                </li>
                </ul>
            </ul>


        </div>
    </div>
</nav>