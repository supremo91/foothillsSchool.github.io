<!--?php
// Function to generate a unique student number
function generateStudentNumber() {
    // Get the current year
    $currentYear = date("Y");

    // You can implement your own logic to generate a unique identifier.
    // For this example, let's use a random number between 100 and 999.
    $uniqueIdentifier = mt_rand(100, 999);

    // Combine the current year and the unique identifier
    $studentNumber = $uniqueIdentifier . '/' . $currentYear;

    return $studentNumber;
}

// Generate a unique student number for a new student
$uniqueStudentNumber = generateStudentNumber();

// Display the generated student number
echo "Generated Student Number: " . $uniqueStudentNumber; -->

<!--?php
// Function to generate a unique student number
function generateStudentNumber($admissionNumber) {
    // Get the current year
    $currentYear = date("Y");

    // Combine the auto-incremented admission number with the current year
    $studentNumber = $admissionNumber . '/' . $currentYear;

    return $studentNumber;
}

// Simulate getting the auto-incremented admission number from the database
$autoIncrementedAdmissionNumber = 001; // Replace with the actual admission number from the database

// Generate a unique student number using the auto-incremented admission number
$uniqueStudentNumber = generateStudentNumber($autoIncrementedAdmissionNumber);

// Display the generated student number
echo "Generated Student Number: " . $uniqueStudentNumber;
?>

<?php
// Database connection
require 'connection.php';


// Insert a new student record
$sql = "INSERT INTO student (student_name, addmission_date, student_class, date_of_birth, gender, nhis, parent_name, parent_contact)
        VALUES ('John Doe', '2023-10-15', 'Class A', '2005-05-20', 'Male', '123456', 'Jane Doe', '9876543210')";

if ($conn->query($sql) === TRUE) {
    // Retrieve the auto-incremented admission number
    $admissionNumber = $conn->insert_id;

    // Get the current year
    $currentYear = date("Y");

    // Combine the auto-incremented admission number with the current year
    $uniqueStudentNumber = $admissionNumber . '/' . $currentYear;

    // Display the generated unique student number
    echo "Generated Student Number: " . $uniqueStudentNumber;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>

