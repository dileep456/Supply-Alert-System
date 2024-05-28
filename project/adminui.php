<!DOCTYPE html>
<html>
<head>
    <title>Admin Interface</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }
        form {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
            margin-right: 10px;
            display: block;
            margin-bottom: 10px;
            color: #333;
        }
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Select Students by Subject</h2>
    <form method="post" action="">
        <label for="subject">Select Subject:</label>
        <select name="subject" id="subject">
            <option value="select">Select</option>
            <option value="Mathematics">Mathematics</option>
            <option value="Applied Physics">Applied Physics</option>
            <option value="Chemistry">Chemistry</option>
            <option value="PPSC">PPSC</option>
            <option value="MFCS">MFCS</option>
            <option value="M-2">M-2</option>
            <option value="OOPS">OOPS</option>
            <option value="Python">Python</option>
            <option value="JAVA">JAVA</option>
            <option value="Digital Electronics">Digital Electronics</option>
            <option value="Signals and Systems">Signals and Systems</option>
            <option value="Electrical Circuits">Electrical Circuits</option>
            <option value="VLSI">VLSI</option>
            <!-- Add more subjects as needed -->
        </select>
        <input type="submit" name="submit" value="Get Students">
    </form>

    <?php
    // Check if form is submitted
    if(isset($_POST['submit'])) {
        // Retrieve selected subject from the form
        $subject = $_POST['subject'];

        // Create connection
        $conn = mysqli_connect("localhost","root", "", "contact");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to select students by subject
        $sql = "SELECT contacts.username, contacts.phone, contacts.email
                FROM supply
                INNER JOIN contacts ON supply.username = contacts.username
                WHERE supply.subject = '$subject'";

        // Execute query
        $result = mysqli_query($conn,$sql);

        // Check if query executed successfully
        if ($result === false) {
            echo "Error: " . $conn->error;
        } else {
            // Check if any rows returned
            
            if ($result->num_rows > 0) {
                // Output data as a table
                
                echo "<form method='post' action='notification.php'>";
                echo "<input type='hidden' name='subject' value='$subject'>";
                echo "<h3>Students enrolled in $subject:</h3>";
                echo "<table>";
                echo "<tr><th>Name</th><th>Phone</th><th>Email</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["phone"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "<input type='submit' name='notification' value='Send Notification'>";
                echo "</form>";
            } else {
                echo "<h3>No students found for $subject<h3>";
            }
        }

        // Close connection
        mysqli_close($conn);
    }
    ?>

</body>
</html>
