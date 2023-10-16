<?php

include 'db_config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // SQL query to insert data into the database
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
