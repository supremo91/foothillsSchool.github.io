<!--?php
require("connection.php"); // Include your database connection code

// Get the search date from the request
$date = $_GET["date"];

// Construct a SQL query to calculate the total fees for the given date
$feesQuery = "SELECT SUM(AMOUNT) AS dailyTotalFees FROM receipt WHERE TRIM(PAYMENT_DATE) = '$date'"; // Modify the query based on your date format

// Execute the query
$feesResult = $con->query($feesQuery);

if ($feesResult) {
    $dailyTotalFees = $feesResult->fetch_assoc()["dailyTotalFees"];
    echo $dailyTotalFees;
} else {
    echo "0.00"; // In case of an error or no results
}

