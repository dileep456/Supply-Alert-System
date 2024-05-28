<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact";
$conn = mysqli_connect($servername, $username, $password,$dbname);
$sql = "CREATE table supply(username varchar(10) not null,subject varchar(30) not null)";
mysqli_query($conn, $sql);
mysqli_close($conn);
?>