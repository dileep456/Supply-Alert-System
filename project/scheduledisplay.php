<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Display Dates</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    th, td {
        padding: 8px;
        border-bottom: 1px solid #ddd;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
</style>
</head>
<body>

<div class="container">
    <h2>Supply Table Table :</h2>
    <table>
        <thead>
            <tr>
                <th>Subject</th>
                <th>Exam Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Database connection parameters
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "contact"; // Replace with your actual database name

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL query to select data from the dates table
            $sql = "SELECT subject, exam_date FROM dates";

            // Execute query
            $result = mysqli_query($conn, $sql);

            // Check if query executed successfully
            if ($result === false) {
                echo "Error: " . $conn->error;
            } else {
                // Check if any rows returned
                if (mysqli_num_rows($result) > 0) {
                    // Output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["subject"] . "</td>";
                        echo "<td>" . $row["exam_date"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No data found</td></tr>";
                }
            }

            // Close connection
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
