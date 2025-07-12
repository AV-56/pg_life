<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light shadow-sm sticky-top px-4">
    <!-- Logo -->
    <a class="navbar-brand d-flex align-items-center" href="index.php">
        <img src="img/logo.png" alt="PG Life Logo" style="height: 40px; margin-right: 8px" />
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarRightLinks" aria-controls="navbarRightLinks" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Right Side -->
    <div class="collapse navbar-collapse justify-content-end" id="navbarRightLinks">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
            <?php
            if (!isset($_SESSION["user_id"])) {
            ?>
                <!-- Signup -->
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-anchor nav-link d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#signupModal" style="color: #E4FDE1;">
                        <i class="bi bi-person mr-2"></i> Signup
                    </a>
                </li>

                <!-- Divider -->
                <li class="d-none d-lg-block">
                    <div class="spacer-line"></div>
                </li>

                <!-- Login -->
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-anchor nav-link d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#loginModal" style="color: #E4FDE1";>
                        <i class="bi bi-box-arrow-in-right mr-2"></i> Login
                    </a>
                </li>
            <?php
            } else {
            ?>
                <div class='nav-name' style="color: #E4FDE1; margin-right: 20px; font-weight: normal; ">
                    Hi, <?php echo $_SESSION["full_name"]; ?>
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php" style="color: #E4FDE1;">
                        <i class="fas fa-user"></i> Dashboard
                    </a>
                </li>

                  <!-- Divider -->
                <li class="d-none d-lg-block">
                    <div class="spacer-line"></div>
                </li>

                <div class="nav-vl"></div>
                <li class="nav-item">
                    <a class="nav-link" href="includes/logout.php" style="color: #E4FDE1;" >
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</nav>
