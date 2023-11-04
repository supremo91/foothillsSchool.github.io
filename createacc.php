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
        // Check if the username already exists in the database
        $checkUsernameSql = "SELECT username FROM user WHERE username = :username";
        $checkUsernameStmt = $config->conn->prepare($checkUsernameSql);
        $checkUsernameStmt->bindParam(':username', $username, PDO::PARAM_STR);
        $checkUsernameStmt->execute();

        if ($checkUsernameStmt->rowCount() > 0) {
            header("Location: index.php");
        } else {
            // Check if the password meets your criteria (e.g., complexity requirements)
            if (strlen($password) < 8) {
                echo "Error: Password must be at least 8 characters long.";
            } else {
                // Hash the password (for security)
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Insert user data into the database
                $insertSql = "INSERT INTO user (username, password) VALUES (:username, :password)";
                $insertStmt = $config->conn->prepare($insertSql);
                $insertStmt->bindParam(':username', $username, PDO::PARAM_STR);
                $insertStmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);

                // Execute the SQL statement
                if ($insertStmt->execute()) {
                    // Registration successful, redirect to signin.php
                    header("Location: signin.php");
                    exit; // Terminate script execution after redirection
                } else {
                    echo "Error: Registration failed.";
                }
            }
        }
    }
}
?>

