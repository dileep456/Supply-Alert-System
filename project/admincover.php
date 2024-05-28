<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Interface</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    h2 {
        color: #333;
        margin-bottom: 20px;
    }
    .grid-container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 20px;
    }
    .grid-item {
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    .grid-item h3 {
        color: #333;
        margin-bottom: 10px;
    }
    .grid-item p {
        color: #666;
    }
    .button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }
    .button:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>

<div class="container">
    
    <div class="grid-container">
        <div class="grid-item">
            <h3>Find Students</h3>
            <p>Use this section to search for students by subject.</p>
            <a href="adminui.php" class="button">Go to Find Students</a>
        </div>
        <div class="grid-item">
            <h3>Update Schedule</h3>
            <p>Use this section to update the examination schedule.</p>
            <a href="addash.php" class="button">Go to Update Schedule</a>
        </div>
    </div>
</div>

</body>
</html>
