<?php
// Include the Config class
include 'Config.php';

// Initialize the Config class to establish a database connection
$config = new Config();

// Check if the HTTP POST request is made (i.e., the user submitted the sign-in form)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user input from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // You may also want to add validation and error handling here

    // Fetch user data from the database based on the provided username
    $sql = "SELECT * FROM user WHERE username = :username";
    $stmt = $config->conn->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    
    if ($stmt->execute()) {
        // Check if a user with the provided username exists
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            // Verify the provided password against the hashed password in the database
            if (password_verify($password, $user['password'])) {
                // Password is correct, you can set up a session here



                // Redirect to home.html after successful login
                header("Location: home.html");
                exit; // Terminate script execution after redirection
            } else {
                header("Location: signin.php");
            }
        } else {
            header("Location: signin.php");
           
        }
    } 
}
?>
