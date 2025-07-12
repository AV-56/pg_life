<?php
session_start();

// Get city name from URL safely
$city = isset($_GET['city']) ? htmlspecialchars($_GET['city']) : 'Unknown';

// DB config
$db_hostname = "127.0.0.1";
$db_username = "root";
$db_password = "avakash@56";
$db_name     = "pg_life";

$conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_name);
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Fetch city_id
$city_id = null;
$city_sql = "SELECT id FROM cities WHERE name = '$city'";
$city_result = mysqli_query($conn, $city_sql);
if ($city_result && mysqli_num_rows($city_result) > 0) {
    $city_row = mysqli_fetch_assoc($city_result);
    $city_id = $city_row['id'];
} else {
    die("City not found.");
}

// Fetch properties for this city
$properties = [];
$property_sql = "SELECT * FROM properties WHERE city_id = '$city_id'";
$property_result = mysqli_query($conn, $property_sql);
if ($property_result && mysqli_num_rows($property_result) > 0) {
    while ($row = mysqli_fetch_assoc($property_result)) {
        $properties[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/head_links.php'; ?>
    <title>Best PG's in <?php echo $city; ?></title>
    <link rel="stylesheet" href="css/pl.css" />
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <!-- Breadcrumb -->
    <div class="container-fluid bg-light border-top border-bottom p-0" style="margin-bottom: 100px">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="index.php" style="color: #114b5f">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $city; ?></li>
            </ol>
        </nav>
    </div>

    <!-- Filters & Sort -->
    <div class="container my-5">
        <div class="d-flex justify-content-around flex-wrap gap-4 mb-4">
            <div class="d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#filterModal" style="cursor: pointer">
                <img src="img/filter.png" class="icon-img" alt="Filter" />
                <span class="icon-label" style="margin-left: 10px">Filter</span>
            </div>
            <div class="d-flex align-items-center gap-2">
                <img src="img/desc.png" class="icon-img" alt="Highest Rent" />
                <span class="icon-label" style="margin-left: 10px">Highest rent first</span>
            </div>
            <div class="d-flex align-items-center gap-2">
                <img src="img/asc.png" class="icon-img" alt="Lowest Rent" />
                <span class="icon-label" style="margin-left: 10px">Lowest rent first</span>
            </div>
        </div>

        <!-- Property cards -->
        <div class="container py-4">
            <div class="d-flex flex-column card-stack">
                <?php if (!empty($properties)): ?>
                    <?php foreach ($properties as $property): ?>
                        <div class="card bg-white shadow-sm mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-start align-items-start">
                                    <div class="room-image-container">
                                        <img src="img/properties/<?php echo $property['id']; ?>/1d4f0757fdb86d5f.jpg" class="room-image" />
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
                                                <p class="mb-0 ml-1 text-muted small">0 interested</p>
                                            </div>
                                        </div>
                                        <div class="details mb-2">
                                            <h5 class="mb-1"><?php echo htmlspecialchars($property['name']); ?></h5>
                                            <p class="address mb-0 text-muted"><?php echo htmlspecialchars($property['address']); ?></p>
                                        </div>
                                        <div class="gender my-2">
                                            <?php if ($property['gender'] === 'male'): ?>
                                                <img class="gender-image" src="img/male.png" alt="Male" />
                                            <?php elseif ($property['gender'] === 'female'): ?>
                                                <img class="gender-image" src="img/female.png" alt="Female" />
                                            <?php else: ?>
                                                <div class="gender-icons d-flex align-items-center">
                                                    <img src="img/male.png" alt="Male" class="gender-icon" />
                                                    <div class="divider"></div>
                                                    <img src="img/female.png" alt="Female" class="gender-icon" />
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mt-2">
                                            <div class="price">
                                                <span class="font-weight-bold text-dark">Rs <?php echo $property['rent']; ?>/-</span>
                                                <span class="text-muted"> per month</span>
                                            </div>
                                            <a href="property-details.php?id=<?php echo $property['id']; ?>" class="view-btn">View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No properties found for this city.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/signup_modal.php'; ?>
    <?php include 'includes/login_modal.php'; ?>
    <?php include 'includes/filter_modal.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/common.js"></script>
</body>
</html>
<?php
mysqli_close($conn);
?>
