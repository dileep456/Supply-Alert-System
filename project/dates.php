<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact";
$conn = mysqli_connect($servername, $username, $password,$dbname);
$sql = "CREATE table dates(subject varchar(30) not null, exam_date DATE)";
mysqli_query($conn, $sql);
mysqli_close($conn);
?>