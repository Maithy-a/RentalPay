<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "tuma_pesa";

$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    error_log("Connection failed: " . mysqli_connect_error());
    die("Database connection failed. Please try again later.");
}
?>