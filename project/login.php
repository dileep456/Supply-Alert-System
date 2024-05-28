<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "contact";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL query to retrieve user's password based on username
    $sql = "SELECT password FROM contacts WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Check if user exists
        if (mysqli_num_rows($result) == 1) {
            // User found, verify password
            $row = mysqli_fetch_assoc($result);
            $hashed_password = $row['password'];
            // Debugging: Print out the hashed password retrieved from the database
            echo "Hashed Password from Database: $hashed_password<br>";
            // Trim user input password to remove whitespace
            $trimmed_password = trim($password);
            // Debugging: Print out the trimmed user input password
            echo "Trimmed User Input Password: $trimmed_password<br>";
            if ($trimmed_password=== $hashed_password) {
                // Authentication successful, redirect to dashboard or homepage
                session_start();
                $_SESSION['username'] = $username;
                header("Location: userinterface.php");
                exit();
            } else {
                // Authentication failed, display error message
                $error_message = "Invalid username or password.";
            }
        } else {
            // User not found, display error message
            $error_message = "Invalid username or password.";
        }
    } else {
        // Query execution error, display error message
        $error_message = "Error executing query: " . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
        }

        form {
            width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; /* Ensures padding and border are included in the element's total width and height */
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease; /* Smooth transition effect */
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        p.error-message {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Login</h2>
    <?php
    // Display error message if authentication failed
    if (isset($error_message)) {
        echo "<p class='error-message'>$error_message</p>";
    }
    ?>
    <form action="login.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">Login</button>
    </form>
    <div class=anker>
        <p>Don't have an account?</p><a href="registration.php" class="button">Register</a>
    </div>
</body>
</html>
