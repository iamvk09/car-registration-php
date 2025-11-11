<?php
$servername = "localhost";
$username = "root";   // default for localhost
$password = "";       // default for localhost (empty)
$dbname = "car_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("❌ Database Connection Failed: " . $conn->connect_error);
}
?>
