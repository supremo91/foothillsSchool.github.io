<?php
// Include your database connection and necessary files
require 'connection.php';

function validateDate($date, $format = 'Y-m-d') {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}

$searchValue = $_POST['search']; // Assuming you're using POST method to send the search value

// Initialize the totalFees and tableBody
$totalFees = 0;
$tableBody = '';

// Check if the searchValue is a valid date
if (validateDate($searchValue, 'Y-m-d')) {
    // If it's a valid date, proceed with the query
    $query = "SELECT * FROM receipt WHERE PAYMENT_DATE LIKE '%$searchValue'";
    $query_run = mysqli_query($con, $query);

    // Generate the HTML for the table body based on search results
    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $receipt) {
            $tableBody .= '<tr>';
            $tableBody .= '<td>' . $receipt['RECEIPT_ID'] . '</td>';
            $tableBody .= '<td>' . $receipt['PAYMENT_DATE'] . '</td>';
            $tableBody .= '<td>' . $receipt['TERM'] . '</td>';
            $tableBody .= '<td>' . $receipt['STUDENT_NAME'] . '</td>';
            $tableBody .= '<td>' . $receipt['CLASS'] . '</td>';
            $tableBody .= '<td>' . $receipt['PAID_BY'] . '</td>';
            $tableBody .= '<td>' . $receipt['AMOUNT'] . '</td>';
            $tableBody .= '<td>' . $receipt['BALANCE'] . '</td>';
            $tableBody .= '<td>' . $receipt['PAYMENT_STATUS'] . '</td>';
            $tableBody .= '</tr>';

            // Add the "AMOUNT" from each row to the totalFees
            $totalFees += $receipt['AMOUNT'];
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Your HTML head content here -->
    <style>
        #totalFeesOutput {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #fff;
            padding: 3px;
            box-shadow: 0 0 5px #000;
            text-align: center;
            z-index: 1;

        }
    </style>
</head>
<body>
    <div id="totalFeesOutput"> <h5>Total Fees for the Date <?= $searchValue ?>: GHC<?= $totalFees ?></h5> </div>

    <!--input type="text" id="search" placeholder="Enter date (YYYY-MM-DD"-->
    
    <?php if (!empty($tableBody)): ?>
    <table style="margin-top: 0px;">
        <thead>
            <tr>
                <th>Receipt ID</th>
                <th>Payment Date</th>
                <th>Term</th>
                <th>Student Name</th>
                <th>Class</th>
                <th>Paid By</th>
                <th>Amount</th>
                <th>Balance</th>
                <th>Payment Status</th>
            </tr>
        </thead>
        <tbody>
            <?= $tableBody ?>
        </tbody>
    </table>
    <?php endif; ?>



<?php
// Get the search value from the AJAX request
$searchValue = $_POST['search'];


// Perform the search query
$query = "SELECT * FROM receipt WHERE TERM LIKE 
'%$searchValue%' OR CLASS LIKE '%$searchValue%' OR STUDENT_NAME LIKE '%$searchValue%'  
 ORDER BY PAYMENT_DATE = CURDATE() DESC, PAYMENT_DATE DESC";
$query_run = mysqli_query($con, $query);

// Generate the HTML for the table body based on search results
if (mysqli_num_rows($query_run) > 0) {
    foreach ($query_run as $receipt) {
        ?>
        <tr>
            <td><?= $receipt['RECEIPT_ID']; ?></td>
            <td><?= $receipt['PAYMENT_DATE'] = strtoupper($receipt['PAYMENT_DATE']); ?></td>
            <td><?= $receipt['TERM'] = strtoupper($receipt['TERM']); ?></td>
            <td><?= $receipt['STUDENT_NAME'] = strtoupper($receipt['STUDENT_NAME']); ?></td>
            <td><?= $receipt['CLASS'] = strtoupper($receipt['CLASS']); ?></td>
            <td><?= $receipt['PAID_BY'] = strtoupper($receipt['PAID_BY']); ?></td>
            <td><?= $receipt['AMOUNT']; ?></td>
            <td><?= $receipt['BALANCE']; ?></td>
            <td><?= $receipt['PAYMENT_STATUS'] = strtoupper($receipt['PAYMENT_STATUS']); ?></td>
           
        </tr>
        <?php
    }
} else {
    echo "<tr><td colspan='7'>No records found</td></tr>";
}
?>

</body>
</html>