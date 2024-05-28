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

// Create table
$sql = "CREATE TABLE Contacts (
    
    name VARCHAR(30) NOT NULL,
    username varchar(10) PRIMARY KEY,
    password VARCHAR(30) NOT NULL,
    phone bigint(10) unique,
    email VARCHAR(50) unique,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON
    UPDATE CURRENT_TIMESTAMP
    )";

mysqli_query($conn, $sql);
if (mysqli_query($conn, $sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>