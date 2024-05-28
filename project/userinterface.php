<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject Selector</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative; /* Add position relative for positioning the logout button */
        }

        label {
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
            color: #333;
        }

        select {
            padding: 10px;
            width: calc(100% - 40px); /* Adjusted width to accommodate the logout button */
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 20px;
            font-size: 16px;
            color: #555;
            outline: none;
            margin-top: 10px; /* Added top margin */
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            margin-right: 10px; /* Add margin between semester buttons */
            margin-bottom: 10px; /* Add margin bottom to create gap between rows */
        }

        button:hover {
            background-color: #0056b3;
        }

        #semesterContainer, #subjectContainer {
            margin-top: 20px;
        }

        .semester:last-child {
            margin-right: 0; /* Remove margin-right from last semester button */
        }

        .subject-checkbox {
            margin-right: 5px;
        }

        .submit-btn {
            display: block;
            margin-top: 20px;
            width: 100%;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 12px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #218838;
        }

        .subject-label {
            display: inline-block;
            vertical-align: middle;
            margin-left: 5px;
            font-size: 16px;
            color: #333;
        }

        .logout-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <button class="logout-btn" onclick="logout()">Logout</button>
        <label for="program">Select Program:</label>
        <select id="program" name="program" onchange="getSemesters()">
            <option value="">Select Program</option>
            <option value="cse">CSE</option>
            <option value="ece">ECE</option>
            <option value="eee">EEE</option>
            <option value="mech">Mechanical Engineering</option>
        </select>
        
        <div id="semesterContainer"></div>
        <form action="user.php" method="post">
            <div id="subjectContainer"></div>

            <button type="submit" class="submit-btn">Submit</button>
        </form>
        <button onclick="displaySelectedSubjects()">Click here to check selected subjects</button>
    </div>

    <script src="script1.js"></script>

    <script>
        function logout() {
            // Redirect to login.php
            window.location.href = "login.php";
        }

        function displaySelectedSubjects(){
            window.location.href = "display.php";
        }
    </script>
</body>
</html>
