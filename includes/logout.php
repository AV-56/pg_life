<?php
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to homepage (index.php)
header("Location: ../index.php");
exit;
?>
