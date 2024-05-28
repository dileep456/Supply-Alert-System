<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Display Selected Subjects</title>
<link rel="stylesheet" href="style.css">
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h2 {
        color: #333;
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    li {
        margin-bottom: 10px;
        padding: 10px;
        background-color: #f9f9f9;
        border-radius: 5px;
        box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);
    }
</style>
</head>
<body>
    <div class="container">
        <?php
        session_start();
        if(isset($_SESSION['username'])) {
            $currentUser = $_SESSION['username'];
        } else {
            echo "No user logged in";
            exit();
        }
        // Database connection setup
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "contact";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $database);


        // Retrieve selected subjects from the database
        $sql = "SELECT subject FROM supply where username='$currentUser'";
        $result = mysqli_query($conn,$sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            echo "<h2>Selected Subjects for Supply:</h2>";
            echo "<ul>";
            while ($row = $result->fetch_assoc()) {
                echo "<li>" . $row["subject"] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "No subjects selected for supply.";
        }

        // Close database connection
        mysqli_close($conn);
        ?>
        <div class=anker>
        <a href="userinterface.php" class="button">Back</a>
        </div>
    </div>

</body>
</html>
