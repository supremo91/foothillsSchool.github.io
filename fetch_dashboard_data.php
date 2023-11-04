<?php
require 'connection.php'; // Include your database connection script

// Query to get the number of students for a specific term and year
$studentQuery = "SELECT COUNT(*) AS studentCount FROM student";
$studentResult = $con->query($studentQuery);
$studentCount = $studentResult->fetch_assoc()["studentCount"];

$maleQuery = "SELECT COUNT(Gender) AS maleCount FROM student WHERE Gender = 'MALE'";
$maleResult = $con->query($maleQuery);
$maleCount = $maleResult->fetch_assoc()["maleCount"];

$femaleQuery = "SELECT COUNT(Gender) AS femaleCount FROM student WHERE Gender = 'FEMALE'";
$femaleResult = $con->query($femaleQuery);
$femaleCount = $femaleResult->fetch_assoc()["femaleCount"];

$receiptQuery = "SELECT COUNT(*) AS receiptCount FROM receipt";
$receiptResult = $con->query($receiptQuery);
$receiptCount = $receiptResult->fetch_assoc()["receiptCount"];

// Query to get the number of teachers
$teacherQuery = "SELECT COUNT(*) AS teacherCount FROM teacher";
$teacherResult = $con->query($teacherQuery);
$teacherCount = $teacherResult->fetch_assoc()["teacherCount"];

$teachingQuery = "SELECT COUNT(Position) AS teachingCount FROM teacher WHERE Position = 'Teacher'";
$teachingResult = $con->query($teachingQuery);
$teachingCount = $teachingResult->fetch_assoc()["teachingCount"];

$non_teachingQuery = "SELECT COUNT(Position) AS non_teachingCount FROM teacher WHERE Position != 'Teacher'";
$non_teachingResult = $con->query($non_teachingQuery);
$non_teachingCount = $non_teachingResult->fetch_assoc()["non_teachingCount"];

// Query to get the total fees paid for the specified day, term, and year
$date = date("Y-m-d");

$feesQuery = "SELECT SUM(AMOUNT) AS dailyTotalFees FROM receipt WHERE TRIM(PAYMENT_DATE) = '$date'";
$feesResult = $con->query($feesQuery);
$dailyTotalFees = $feesResult->fetch_assoc()["dailyTotalFees"];


// Get the current year
//$currentYear = date("Y");

// Query to get the overall total fees paid for the current date and term
$feesQuery = "SELECT SUM(AMOUNT) AS totalFees FROM receipt";// WHERE TRIM(PAYMENT_DATE) = '$date' AND TERM = '$term'";
$feesResult = $con->query($feesQuery);
$totalFees = $feesResult->fetch_assoc()["totalFees"];


// Prepare the data to be sent as JSON
$dashboardData = [
    "studentCount" => $studentCount,
    "teacherCount" => $teacherCount,
    "teachingCount" => $teachingCount,
    "non_teachingCount" => $non_teachingCount,
    "totalFees" => $totalFees,
    "dailyTotalFees" => $dailyTotalFees,
    "receiptCount" => $receiptCount,
    "maleCount" => $maleCount,
    "femaleCount" => $femaleCount,
];

// Send the JSON response
// header("Content-Type: application/json");
// echo json_encode($dashboardData);
?>

