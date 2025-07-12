<?php
session_start();

$db_hostname = "127.0.0.1";
$db_username = "root";
$db_password = "avakash@56";
$db_name     = "pg_life";

$conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_name);
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$property_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$property = null;
$amenities = [];
$testimonials = [];

if ($property_id > 0) {
    // Fetch property
    $sql = "SELECT * FROM properties WHERE id = $property_id";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $property = mysqli_fetch_assoc($result);
    } else {
        die("Property not found.");
    }

    // Fetch amenities (joined)
    $amenity_sql = "
        SELECT a.name, a.icon
        FROM amenities a
        INNER JOIN properties_amenities pa ON pa.amenity_id = a.id
        WHERE pa.property_id = $property_id
    ";
    $amenity_result = mysqli_query($conn, $amenity_sql);
    if ($amenity_result && mysqli_num_rows($amenity_result) > 0) {
        while ($row = mysqli_fetch_assoc($amenity_result)) {
            $amenities[] = $row;
        }
    }

    // Fetch testimonials
    $testimonial_sql = "
        SELECT user_name, content
        FROM testimonials
        WHERE property_id = $property_id
    ";
    $testimonial_result = mysqli_query($conn, $testimonial_sql);
    if ($testimonial_result && mysqli_num_rows($testimonial_result) > 0) {
        while ($row = mysqli_fetch_assoc($testimonial_result)) {
            $testimonials[] = $row;
        }
    }
} else {
    die("Invalid property id.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "includes/head_links.php"; ?>
    <link rel="stylesheet" href="css/pd.css" />
    <title><?php echo htmlspecialchars($property['name']); ?></title>
</head>
<body>
<?php include "includes/header.php"; ?>

<!-- Breadcrumb -->
<div class="container-fluid bg-light border-top border-bottom p-0" style="margin-bottom: 0px">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="index.php" style="color: #114b5f">Home</a></li>
            <li class="breadcrumb-item"><a href="property_list.php?city=<?php echo urlencode($property['city_id']); ?>" style="color: #114b5f">City</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($property['name']); ?></li>
        </ol>
    </nav>
</div>

<!-- Carousel -->
<div id="carouselExampleControls" class="carousel slide" style="margin-bottom: 40px" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/properties/<?php echo $property['id']; ?>/1d4f0757fdb86d5f.jpg" class="d-block w-100 carousel-image" alt="...">
        </div>
        <div class="carousel-item">
            <img src="img/properties/<?php echo $property['id']; ?>/46ebbb537aa9fb0a.jpg" class="d-block w-100 carousel-image" alt="...">
        </div>
        <div class="carousel-item">
            <img src="img/properties/<?php echo $property['id']; ?>/eace7b9114fd6046.jpg" class="d-block w-100 carousel-image" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<!-- Property Details -->
<div class="outer d-flex justify-content-center">
    <div class="room-details ml-3" style="max-width: 1000px; width: 100%">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="rating" style="color: red">
                <i class="fas fa-star"></i><i class="fas fa-star"></i>
                <i class="fas fa-star"></i><i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <div class="interested d-flex align-items-center">
                <i class="far fa-heart heart-icon"></i>
                <p class="mb-0 ml-1 text-muted small">3 interested</p>
            </div>
        </div>
        <div class="details mb-2">
            <h5 class="mb-1"><?php echo htmlspecialchars($property['name']); ?></h5>
            <p class="address mb-0 text-muted"><?php echo htmlspecialchars($property['address']); ?></p>
        </div>
        <div class="gender my-2">
            <?php if ($property['gender'] === 'male'): ?>
                <img class="gender-image" src="img/male.png" alt="Male">
            <?php elseif ($property['gender'] === 'female'): ?>
                <img class="gender-image" src="img/female.png" alt="Female">
            <?php else: ?>
                <div class="gender-icons d-flex align-items-center">
                    <img src="img/male.png" alt="Male" class="gender-icon">
                    <div class="divider"></div>
                    <img src="img/female.png" alt="Female" class="gender-icon">
                </div>
            <?php endif; ?>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-2">
            <div class="price">
                <span class="font-weight-bold text-dark">Rs <?php echo $property['rent']; ?>/-</span>
                <span class="text-muted"> per month</span>
            </div>
            <a href="#" class="view-btn">Book now</a>
        </div>
    </div>
</div>

<!-- Amenities -->
<div class="outer-amenities d-flex justify-content-center">
    <section class="amenities-section py-5" style="max-width: 1000px; width: 100%">
        <div class="container">
            <h2 class="mb-5">Amenities</h2>
            <div class="row">
                <?php foreach ($amenities as $amenity): ?>
                    <div class="col-md-3 col-sm-6 mb-3">
                        <div class="d-flex align-items-center">
                            <img src="img/amenities/<?php echo htmlspecialchars($amenity['icon']); ?>" alt="<?php echo htmlspecialchars($amenity['name']); ?>" width="20" class="me-2" style="margin-right: 10px;">
                            <span><?php echo htmlspecialchars($amenity['name']); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>

<!-- About -->
<div class="outer-about d-flex justify-content-center">
    <div class="container my-5" style="max-width: 1000px; width: 100%">
        <h3 class="fw-bold mb-4">About the Property</h3>
        <p class="about-text">
            Furnished studio apartment - share it with close friends! Located in posh area.
            Make it your own abode with friends and enjoy the amenities provided.
        </p>
    </div>
</div>

<!-- Rating (keep static) -->
<div class="outer-about d-flex justify-content-center">
    <div class="container my-5" style="max-width: 1000px; width: 100%">
        <h3 class="fw-bold mb-4">Property Rating</h3>
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md-8" style="max-width: 500px; width: 100%">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center"><i class="fas fa-broom rating-icon mr-0"></i> <span>Cleanliness</span></div>
                    <div class="text-rating"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center"><i class="fas fa-utensils rating-icon mr-2"></i> <span>Food Quality</span></div>
                    <div class="text-rating"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center"><i class="fas fa-lock rating-icon mr-2"></i> <span>Safety</span></div>
                    <div class="text-rating"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="rating-circle mx-auto d-flex flex-column justify-content-center align-items-center">
                    <h2 class="mb-1">4.2</h2>
                    <div class="fs-5"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Testimonials -->
<section class="testimonial-section text-center my-5">
    <h2 class="mb-4">What people say</h2>
    <?php foreach ($testimonials as $testimonial): ?>
        <div class="testimonial-box mx-auto p-4 mb-3">
            <img src="img/man.png" alt="User" class="rounded-circle mb-3 user-img" />
            <blockquote class="blockquote"><p><i class="fas fa-quote-left mr-2 text-secondary"></i><?php echo htmlspecialchars($testimonial['content']); ?></p></blockquote>
            <footer class="blockquote-footer mt-3 font-weight-bold" style="color: #e4fde1;"><?php echo htmlspecialchars($testimonial['user_name']); ?></footer>
        </div>
    <?php endforeach; ?>
</section>

<?php include "includes/footer.php"; ?>
<?php include "includes/signup_modal.php"; ?>
<?php include "includes/login_modal.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/common.js"></script>
</body>
</html>
<?php
mysqli_close($conn);
?>
