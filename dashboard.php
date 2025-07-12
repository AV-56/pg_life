<?php
session_start();

// Safely extract session values
$user_name   = $_SESSION['full_name']     ;
$user_email  = $_SESSION['email']         ;
$user_phone  = $_SESSION['phone']         ;
$user_college= $_SESSION['college_name']  ;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "includes/head_links.php"; ?>
    <title>Dashboard | PG Life</title>
    <link rel="stylesheet" href="css/dash.css" />
  </head>
  <body>
    <?php include("includes/header.php"); ?>

    <!-- Breadcrumb Section -->
    <div class="container-fluid bg-light border-top border-bottom p-0" style="margin-bottom: 100px">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item">
            <a href="index.php" style="color: #114b5f">Home</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
      </nav>
    </div>

    <!-- Profile details  -->
    <div class="prof d-flex justify-content-center">
      <div class="container my-5" style="max-width: 1000px; width: 100%">
        <div class="row align-items-center">
          <div class="col-md-6">
            <h2 class="profile-heading" style="margin-bottom: 60px">My Profile</h2>
            <div class="d-flex align-items-center mt-4">
              <img src="img/man.png" alt="Profile" class="profile-img mr-5" />
              <div class="profile-details">
                <h5 class="mb-1 fw-bold"><?php echo $user_name; ?></h5>
                <p class="mb-1 text-muted"><?php echo $user_email; ?></p>
                <p class="mb-1 text-muted"><?php echo $user_phone; ?></p>
                <p class="mb-0"><?php echo $user_college; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 d-flex justify-content-center">
            <a href="#" class="edit-profile-link">Edit Profile</a>
          </div>
        </div>
      </div>
    </div>

    <!-- interested section -->
    <h1 class="interest-heading">My Interested Properties</h1>
    <div class="interested">
      <div class="container py-4">
        <div class="d-flex flex-column card-stack">
          <!-- Cards are currently hardcoded. You can load from DB later. -->
          <!-- Card 1 -->
          <div class="card bg-white shadow-sm">
            <div class="card-body">
              <div class="d-flex justify-content-start align-items-start flex-row">
                <div class="room-image-container">
                  <img src="img/properties/1/1d4f0757fdb86d5f.jpg" class="room-image" />
                </div>
                <div class="room-details ml-3">
                  <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="rating" style="color: red">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="interested d-flex align-items-center">
                      <i class="far fa-heart heart-icon"></i>
                      <p class="mb-0 ml-1 text-muted small">3 interested</p>
                    </div>
                  </div>
                  <div class="details mb-2">
                    <h5 class="mb-1">Navkar Paying Guest</h5>
                    <p class="address mb-0 text-muted">44, Juhu Scheme, Juhu, Mumbai, Maharashtra 400058</p>
                  </div>
                  <div class="gender my-2">
                    <img class="gender-image" src="img/male.png" alt="Male Icon" />
                  </div>
                  <div class="d-flex justify-content-between align-items-center mt-2">
                    <div class="price">
                      <span class="font-weight-bold text-dark">Rs 9,500/-</span>
                      <span class="text-muted"> per month</span>
                    </div>
                    <a href="property-details.php" class="view-btn">View</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Repeat cards if needed -->
        </div>
      </div>
    </div>

    <?php include("includes/footer.php"); ?>
    <?php include("includes/login_modal.php"); ?>
    <?php include("includes/signup_modal.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
     <script src="js/common.js"></script>
  </body>
</html>
