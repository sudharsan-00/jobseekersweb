<?php
// Start a session
session_start();

// Include the database configuration
include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare a SQL statement to fetch user data
    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // User authenticated
            $_SESSION['username'] = $username;
            // Redirect to a logged-in page or do whatever is necessary
            header('Location: index.html');
            //exit;
        } else {
           echo
            $loginError = "Invalid username or password";
            echo $loginError;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        // Error in preparing the statement
        $loginError = "Error in preparing the statement";
    }

    // Close the connection
    $conn->close();
}
?>