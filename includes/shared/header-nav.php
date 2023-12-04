<header id="home-link">
  <nav class="navbar navbar-expand-md navbar-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="../../index.php"><img src="../../img/MediHive_Icon.svg" alt=""> <img
          src="../../img/MediHive.svg" alt="" srcset=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="../../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../pages/body/aboutUs.php">About us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../pages/body/faqs.php">FAQs</a>
          </li>
          <li class="nav-item">
            <?php
            if (isset($_SESSION['user'])) {
              ?>
              <a class="nav-link" href="../pages/admin/dashboard.php">Dashboard</a>
              <?php
            }
            ?>

          </li>
          <li class="nav-item-b">
            <?php
            if (isset($_SESSION['user'])) {
              ?>
              <button type="button" onclick="location.href='../pages/admin/logout.php';" class="login-btn">Logout</button>
              <?php
            } else {
              ?>
              <button type="button" onclick="location.href='../../pages/loginop.php';" class="login-btn">Login</button>
              <?php
            }
            ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>