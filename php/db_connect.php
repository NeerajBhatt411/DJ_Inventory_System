<?php
$host = "localhost";
$user = "root"; // Default MySQL user
$pass = ""; // Agar password nahi diya toh blank chhodo
$dbname = "dj_inventory";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
