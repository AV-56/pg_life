<?php
session_start();
sleep(2); // optional: slow down for testing loader
header('Content-Type: application/json');

$db_hostname = "127.0.0.1";
$db_username = "root";
$db_password = "avakash@56";
$db_name     = "pg_life";

$conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_name);
if (!$conn) {
    echo json_encode(["success" => false, "message" => "Database connection failed"]);
    exit;
}

if (
    isset($_POST['full_name']) && !empty($_POST['full_name']) &&
    isset($_POST['email']) && !empty($_POST['email']) &&
    isset($_POST['password']) && !empty($_POST['password']) &&
    isset($_POST['phone']) && !empty($_POST['phone']) &&
    isset($_POST['gender']) && !empty($_POST['gender']) &&
    isset($_POST['college_name']) && !empty($_POST['college_name'])
) {
    $full_name    = $_POST['full_name'];
    $email        = $_POST['email'];
    $password     = $_POST['password'];
    $phone        = $_POST['phone'];
    $gender       = $_POST['gender'];
    $college_name = $_POST['college_name'];

    // Check for existing user
    $check_sql = "SELECT id FROM users WHERE email = '$email' OR phone = '$phone'";
    $check_result = mysqli_query($conn, $check_sql);

    if ($check_result && mysqli_num_rows($check_result) > 0) {
        echo json_encode(["success" => false, "message" => "User with this email or phone already exists."]);
        exit;
    }

    // Insert user
    $sql = "INSERT INTO users (email, password, full_name, phone, gender, college_name)
            VALUES ('$email', '$password', '$full_name', '$phone', '$gender', '$college_name')";

    if (mysqli_query($conn, $sql)) {
        $user_id = mysqli_insert_id($conn);
        $_SESSION['user_id'] = $user_id;
        $_SESSION['full_name'] = $full_name;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['gender'] = $gender;
        $_SESSION['college_name'] = $college_name;

        echo json_encode(["success" => true, "message" => "Signup successful!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Database insert error"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "All fields are required"]);
}

mysqli_close($conn);
?>
