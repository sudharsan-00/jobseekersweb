<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jobseeker";
// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
