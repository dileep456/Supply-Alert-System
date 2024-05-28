<?php
// Start session
session_start();

// Check if the user is logged in
if(isset($_SESSION['username'])) {
    $currentUser = $_SESSION['username'];
} else {
    echo "No user logged in";
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve selected subjects from the form
    $selectedSubjects = isset($_POST['subjects']) ? $_POST['subjects'] : array();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "contact";
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Insert selected subjects into the database
    foreach ($selectedSubjects as $subject) {
        // Assuming "subjects" table has fields: id, subject_name
        $sql = "INSERT INTO supply (username,subject) VALUES ('$currentUser','$subject')";
        if (mysqli_query($conn, $sql)) {
            header("Location: display.php");
        } else {
            echo "Error inserting subject '$subject': " . mysqli_error($conn) . "<br>";
        }
    }
}
?>
