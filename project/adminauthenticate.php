<?php
// Start session
session_start();

// Check if form is submitted
if(isset($_POST['username']) && isset($_POST['password'])) {
    // Define admin credentials
    $admin_username = "admin";
    $admin_password = "@Admin123"; // You should hash this password for security purposes

    // Retrieve username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if credentials match
    if($username === $admin_username && $password === $admin_password) {
        // Set session variables
        $_SESSION['admin_logged_in'] = true;

        // Redirect to admin dashboard or any other page
        header("Location: admincover.php");
        exit();
    } else {
        // If credentials don't match, redirect back to login page with error message
        $_SESSION['login_error'] = "Invalid username or password";
        header("Location: adminlogin.php");
        exit();
    }
} else {
    // If form is not submitted, redirect back to login page
    header("Location: login.php");
    exit();
}
?>
