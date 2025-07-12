<?php
session_start();

$db_hostname = "127.0.0.1";
$db_username = "root";
$db_password = "avakash@56";
$db_name     = "pg_life";

header('Content-Type: application/json');

$conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_name);
if (!$conn) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit();
}

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['full_name'] = $user['full_name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['phone'] = $user['phone'];
        $_SESSION['gender'] = $user['gender'];
        $_SESSION['college_name'] = $user['college_name'];

        echo json_encode(['success' => true, 'message' => 'Login successful!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid email or password']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Please fill all required fields']);
}

mysqli_close($conn);
?>
