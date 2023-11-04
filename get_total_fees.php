<!--?php
$searchValue = $_POST['search']; // Assuming you're using POST method to send the search value

// Check if the searchValue is a valid date
if (validateDate($searchValue, 'Y-m-d')) {
    $query = "SELECT SUM(AMOUNT) AS totalFees FROM receipt WHERE PAYMENT_DATE LIKE '%$searchValue'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $result = mysqli_fetch_assoc($query_run);
        $totalFees = $result['totalFees'];
        echo $totalFees;
    } else {
        echo "0";
    }
} else {
    // If it's not a valid date, return an error message or take appropriate action.
    echo "Invalid date format";
}

// Function to validate date
function validateDate($date, $format = 'Y-m-d') {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}
?>
