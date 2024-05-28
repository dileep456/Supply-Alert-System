<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $passwords = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // Validation
    if ($passwords !== $confirm_password) {
        echo "Passwords do not match";
        exit();
    }

    // Database connection
    $conn =mysqli_connect("localhost", "root", "", "contact");

    // Insert user data into database
    $sql = "INSERT INTO Contacts (name, username, password, phone, email) VALUES ('$name', '$username', '$passwords', '$phone', '$email')";

    mysqli_query($conn, $sql);
    header("Location: login.php");
    
    mysqli_close($conn);
}
?>
