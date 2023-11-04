<?php
// Include the Config class
include 'Config.php';

// Initialize the Config class to establish a database connection
$config = new Config();

// Check if the HTTP POST request is made (i.e., the user submitted the form)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user input from the form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Check if the password and confirm password match
    if ($password !== $confirmPassword) {
        echo "Error: Password and Confirm Password do not match.";
    } else {
        // Hash the password (for security)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into the database
        $sql = "INSERT INTO user (username, password) VALUES (:username, :password)";
        $stmt = $config->conn->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);

        // Execute the SQL statement
        if ($stmt->execute()) {
            // Registration successful, redirect to signin.php
            header("Location: signin.php");
            exit; // Terminate script execution after redirection
        } else {
            echo "Error: Registration failed.";
        }
    }
}
?>
