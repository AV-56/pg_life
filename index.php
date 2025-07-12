<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "includes/head_links.php"; ?>
    <title>PG Life</title>
    
  </head>
  <body>
    <!-- navbar -->
    <?php include "includes/header.php"; ?>

    <!-- Hero section -->

    <div
      class="hero-section d-flex flex-column justify-content-center align-items-center text-center text-white"
    >
      <h1 class="mb-4 fw-bold">Happiness per Square Foot</h1>
      <div class="search-box d-flex">
        <input
          type="text"
          class="form-control form-control-lg"
          placeholder="Enter your city to search for PGs"
        />
        <button class="btn btn-secondary btn-lg">
          <i class="hs-button bi bi-search"></i>
        </button>
      </div>
    </div>

    <!-- Major Cities Section -->
    <section class="major-cities py-5 text-center bg-light">
      <div class="container">
        <h2 class="fw-bold mb-5">Major Cities</h2>
        <div class="row g-4 justify-content-center">
          <!-- City Item -->
          <a
            href="property_list.php?city=Delhi"
            class="col-12 col-sm-6 col-md-4 col-lg-3"
          >
            <div class="city-icon mx-auto">
              <img src="img/delhi.png" alt="Delhi" class="img-fluid" />
            </div>
            <!-- <p class="mt-3 fw-semibold">DELHI</p> -->
          </a>

          <a
            href="property_list.php?city=Mumbai"
            class="col-12 col-sm-6 col-md-4 col-lg-3"
          >
            <div class="city-icon mx-auto">
              <img src="img/mumbai.png" alt="Mumbai" class="img-fluid" />
            </div>
            <!-- <p class="mt-3 fw-semibold">MUMBAI</p> -->
          </a>

          <a
            href="property_list.php?city=Bengaluru"
            class="col-12 col-sm-6 col-md-4 col-lg-3"
          >
            <div class="city-icon mx-auto">
              <img src="img/bangalore.png" alt="Bangalore" class="img-fluid" />
            </div>
            <!-- <p class="mt-3 fw-semibold">BENGALURU</p> -->
          </a>

          <a
            href="property_list.php?city=Hyderabad"
            class="col-12 col-sm-6 col-md-4 col-lg-3"
          >
            <div class="city-icon mx-auto">
              <img src="img/hyderabad.png" alt="Hyderabad" class="img-fluid" />
            </div>
            <!-- <p class="mt-3 fw-semibold">HYDERABAD</p> -->
          </a>
        </div>
      </div>
    </section>

    <!-- Footer  -->

    <?php include "includes/footer.php"; ?>

    
    <!-- Signup Modal -->
   <?php include "includes/signup_modal.php"; ?>

    <!-- Login Modal -->
   <?php include "includes/login_modal.php"; ?>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="js/common.js"></script>

  </body>
</html>
