<?php
require 'connection.php'; // Include your database connection script

// Get the date for which you want to fetch data (you can pass this as a parameter)
$date = date('Y-m-d'); // Change to your desired date format

// Query to get the number of students
$studentQuery = "SELECT COUNT(*) AS studentCount FROM student";// WHERE Addmission_Date = '$date'";
$studentResult = $con->query($studentQuery);
$studentCount = $studentResult->fetch_assoc()["studentCount"];

// Query to get the number of teachers
$teacherQuery = "SELECT COUNT(*) AS teacherCount FROM teacher";
$teacherResult = $con->query($teacherQuery);
$teacherCount = $teacherResult->fetch_assoc()["teacherCount"];


// Query to get the total fees paid for the specified day
$feesQuery = "SELECT SUM(AMOUNT) AS dailyTotalFees FROM receipt WHERE PAYMENT_DATE = '$date'";
$feesResult = $con->query($feesQuery);
$dailyTotalFees = $feesResult->fetch_assoc()["dailyTotalFees"];


// Query to get the overall total fees paid
$feesQuery = "SELECT SUM(AMOUNT) AS totalFees FROM receipt";// WHERE PAYMENT_DATE = '$date'";
$feesResult = $con->query($feesQuery);
$totalFees = $feesResult->fetch_assoc()["totalFees"];

// Prepare the data to be sent as JSON
$dashboardData = [
    "studentCount" => $studentCount,
    "teacherCount" => $teacherCount,
    "totalFees" => $totalFees,
    "dailyTotalFees" =>$dailyTotalFees,
];

// Send the JSON response
//header("Content-Type: application/json");
// echo json_encode($dashboardData);
?>
