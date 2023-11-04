<?php
require("fpdf/fpdf.php");
require("connection.php");
ob_start(); // Start output buffering to capture PDF content

$pdf = new FPDF('P', 'mm', array(80, 180));
$pdf->SetMargins(5, 10, 5);
$pdf->AddPage();

// Load the logo image
$logoPath = 'assests/Foothills logo.jpeg'; // Replace with the actual path to your logo image

// Get the dimensions of the logo image
list($logoWidth, $logoHeight) = getimagesize($logoPath);

// Calculate the X position to center the logo horizontally
$centerX = (80 - $logoWidth) / 2;

// Define the desired width and height for the logo
$desiredWidth = 40; // Adjust this value as needed
$desiredHeight = 30; // Adjust this value as needed

// Calculate the new X and Y position to center and size the logo
$newX = (80 - $desiredWidth) / 2;
$newY = 10;

// Insert the logo at the top and center with the desired size
$pdf->Image($logoPath, $newX, $newY, $desiredWidth, $desiredHeight);

// Move the Y position down to make space for the logo and continue with the content
$pdf->SetY($newY + $desiredHeight + 5);

$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(68, 5, "FOOTHILLS IN'T SCHOOL", 0, 1, 'C');

$pdf->SetFont('Arial', '', 10);
$pdf->Cell("", 1, '', 0, 1);
$pdf->Cell(68, 5, 'NKAWKAW BARRIER', 0, 1, 'C');
$pdf->Cell(68, 5, '(NEW ESTATE)', 0, 1, 'C');
$pdf->Cell("", 1, '', 0, 1);
$pdf->Cell(68, 5, 'Tel: +233 244 596 851/+233 548 912 515', 0, 1, 'C');
$pdf->Cell(68, 5, 'EJ-0137-4251', 0, 1, 'C');
$pdf->Cell("", 1, '', 0, 1);
$pdf->Cell(68, 5, 'Email: foothillsintschool@gmail.com', 0, 1, 'C');
$pdf->Cell("", 1, '', 0, 1);

$pdf->SetLineWidth(0.3);
$pdf->Line(10, $pdf->GetY(), 70, $pdf->GetY());
$pdf->Cell("", 2, '', 0, 1);

// Select Receipt details from Database
$sql = "SELECT * FROM receipt WHERE RECEIPT_ID ='{$_GET['RECEIPT_ID']}' ";
$result = $con->query($sql);
if($result->num_rows > 0) {

while ($row = $result->fetch_assoc()) {
    // Convert the database values to uppercase using strtoupper
    $receiptID = strtoupper($row['RECEIPT_ID']);
    $term = strtoupper($row['TERM']);
    $studentName = strtoupper($row['STUDENT_NAME']);
    $paymentDate = strtoupper($row['PAYMENT_DATE']);
    $paidBy = strtoupper($row['PAID_BY']);
    $amountPaid = strtoupper($row['AMOUNT']);
    $balance = strtoupper($row['BALANCE']);
    
    // Print the values in uppercase in your PDF
    $pdf->Cell(60, 8, 'Receipt ID: ' . $receiptID, 0, 0);
    $pdf->Cell(0, 8, '' . $term, 0, 1, 'R');

    $pdf->Cell(68, 8, 'Student Name: ', 0, 0);
    $pdf->Cell(0, 8, $studentName, 0, 1, 'R');

    $pdf->Cell(60, 8, 'Payment Date: ', 0, 0);
    $pdf->Cell(0, 8, $paymentDate, 0, 1, 'R');

    $pdf->Cell(60, 8, 'Paid By: ', 0, 0);
    $pdf->Cell(0, 8, $paidBy, 0, 1, 'R');

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(60, 8, 'Amount Paid: ', 0, 0);
    $pdf->Cell(0, 8, $amountPaid, 0, 1, 'R');

    $pdf->Cell(60, 8, 'Balance: ', 0, 0);
    $pdf->Cell(0, 8, $balance, 0, 1, 'R');
}
    
}

$pdf->Cell("", 5, '', 0, 1);


$pdf->SetLineWidth(0.3);
$pdf->Line(10, $pdf->GetY(), 70, $pdf->GetY());
$pdf->Cell("", 5, '', 0, 1);

$pdf->SetFont('Arial', '', 11);
$pdf->Cell(65, 5, 'Secretary Signarure', 0, 1, 'L');
$pdf->Cell("", 10, '', 0, 1);
$pdf->SetLineWidth(0.3);
$pdf->Line(10, $pdf->GetY(), 70, $pdf->GetY());
$pdf->Cell("", 4, '', 0, 1);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(60, 1, 'Thank You!', 0, 1, 'C');

// Before generating the PDF content

$receiptName = isset($_GET['name']) ? $_GET['name'] : "foothills_receipt.pdf"; // Set a default name if not provided
header('Content-Disposition: attachment;filename="' . $receiptName . '"');

//header('Content-Disposition: attachment;filename="foothills_receipt.pdf"');
$pdf->Output('I','receipt.pdf');
//$pdf->Output(); // Output the PDF

exit();
$con->close();




?>