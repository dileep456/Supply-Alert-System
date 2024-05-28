<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 600px;
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
    form {
        text-align: center;
    }
    label {
        font-weight: bold;
        margin-right: 10px;
    }
    select {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 100%;
        margin-bottom: 20px;
    }
    input[type="submit"] {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    input[type="submit"]:hover {
        background-color: #0056b3;
    }
    .semester-buttons {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
    .semester-button {
        margin: 10px;
    }
    .semester-button input[type="submit"] {
        background-color: #17a2b8;
    }
    .semester-button input[type="submit"]:hover {
        background-color: #117a8b;
    }
    .schedule-button {
        text-align: center;
        margin-top: 20px;
    }
</style>
</head>
<body>

<div class="container">

    <h2>Admin Dashboard</h2>

    <form action="addash.php" method="post">
        <label for="program">Select Program:</label>
        <select id="program" name="program">
            <option value="select">Select</option>
            <option value="cse">Computer Science Engineering</option>
            <option value="ece">Electronics and Communication Engineering</option>
            <option value="eee">Electrical and Electronics Engineering</option>
            <option value="mech">Mechanical Engineering</option>
        </select>
        <br>
        <input type="submit" value="Get Semesters">
    </form>

    <?php
    // Check if program is selected
    if(isset($_POST['program'])) {
        $program = $_POST['program'];

        // List of semesters
        $semesters = array("Semester 1", "Semester 2", "Semester 3", "Semester 4", "Semester 5", "Semester 6", "Semester 7", "Semester 8");

        echo "<h3>Select Semester:</h3>";
        // Display buttons for each semester
        echo "<div class='semester-buttons'>";
        foreach($semesters as $semester) {
            echo "<form action='subject.php' method='post' class='semester-button'>";
            echo "<input type='hidden' name='program' value='$program'>";
            echo "<input type='hidden' name='semester' value='$semester'>";
            echo "<input type='submit' value='$semester'>";
            echo "</form>";
        }
        echo "</div>";
    }

        // Display button for schedule display
        echo "<div class='schedule-button'>";
        echo "<form action='scheduledisplay.php' method='post'>";
        
        echo "<input type='submit' value='View Schedule'>";
        echo "</form>";
        echo "</div>";
    ?>

</div>

</body>
</html>
