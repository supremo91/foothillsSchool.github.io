<?php
// Function to generate a unique admission number
function generateAdmissionNumber() {
    // Get the current year
    $currentYear = date("Y");

    // Implement your logic to retrieve the auto-incremented admission number from the database
    $autoIncrementedNumber = retrieveAutoIncrementedNumber(); // You need to implement this function.

    // Combine the current year and the auto-incremented number
    $admissionNumber = $autoIncrementedNumber . '/' . $currentYear;

    return $admissionNumber;
}
