<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Select Subjects</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 500px;
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
        display: block;
        margin-bottom: 5px;
        color: #333;
    }
    select, input[type="date"], input[type="submit"] {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 20px;
        box-sizing: border-box;
        font-size: 16px;
    }
    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    input[type="submit"]:hover {
        background-color: #0056b3;
    }
    .message {
        color: red;
        font-style: italic;
    }
</style>
</head>
<body>

<div class="container">

    <h2>Add Date</h2>

    <?php
    if(isset($_POST['program'], $_POST['semester'])) {
        $program = $_POST['program'];
        $semester = $_POST['semester'];

        // Array of subjects for each semester and program
        $subjects = array(
            "cse" => array(
                "Semester 1" => array("Mathematics", "Applied Physics", "Chemistry"),
                "Semester 2" => array("PPSC", "MFCS","M-2"),
                "Semester 3" => array("OOPS", "Python", "JAVA"),
                // Add more semesters and subjects as needed
            ),
            "ece" => array(
                "Semester 1" => array("Mathematics", "Physics", "Chemistry"),
                "Semester 2" => array("Digital Electronics", "Signals and Systems", "Electrical Circuits"),
                "Semester 3" => array("VLSI", "Drawing"),
                // Add more semesters and subjects as needed
            ),
            // Add more programs with corresponding semesters and subjects as needed
        );

        if(isset($subjects[$program][$semester])) {
            $available_subjects = $subjects[$program][$semester];

            echo "<form action='schedule.php' method='post'>";
            echo "<input type='hidden' name='program' value='$program'>";
            echo "<input type='hidden' name='semester' value='$semester'>";

            echo "<label for='subject'>Select Subject:</label>";
            echo "<select id='subject' name='subject'>";
            foreach($available_subjects as $subject) {
                echo "<option value='$subject'>$subject</option>";
            }
            echo "</select>";

            echo "<label for='exam_date'>Exam Date:</label>";
            echo "<input type='date' id='exam_date' name='exam_date'>";

            echo "<input type='submit' value='Add Exam Date'>";
            echo "</form>";
        } else {
            echo "<p class='message'>No subjects available for $semester in $program</p>";
        }
    } else {
        echo "<p class='message'>Invalid request</p>";
    }
    ?>

</div>

</body>
</html>
