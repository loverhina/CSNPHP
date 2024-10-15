<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Database connection settings
$servername = "localhost"; // This is 'localhost' since you're using XAMPP locally
$username = "root";        // Default XAMPP username
$password = "";            // XAMPP's default MySQL password is empty
$dbname = "csn-parent-portal"; // Your database name

// Create connection using MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
