<?php
$host = "localhost"; 
$username = "root";  
$password = "";  
$dbname = "rpms_db";

// Create connection
$con = mysqli_connect($host, $username, $password, $dbname);

if (!$con) {
    error_log("Connection failed: " . mysqli_connect_error());
    die("Database connection failed. Please try again later.");
}
?>
