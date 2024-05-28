<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if program, semester, subject, and exam_date are set
    if(isset($_POST['program'], $_POST['semester'], $_POST['subject'], $_POST['exam_date'])) {
        // Get program, semester, subject, and exam_date from POST data
        $subject = $_POST['subject'];
        $exam_date = $_POST['exam_date'];

        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "contact"; // Replace with your actual database name

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Prepare SQL statement to insert data into the table
        $sql = "INSERT INTO dates (subject, exam_date)
                VALUES ('$subject', '$exam_date')";

        // Execute SQL statement
        if (mysqli_query($conn, $sql)) {
            
            header("Location: addash.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // Close database connection
        mysqli_close($conn);
    } else {
        echo "Invalid request";
    }
} else {
    echo "Method not allowed";
}
?>

