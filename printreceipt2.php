<?php
require("fpdf/fpdf.php");
require("connection.php");
ob_start(); // Start output buffering to capture PDF content


$pdf = new FPDF('P', 'mm', array(80, 150));
$pdf->SetMargins(10, 10, 10);
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 13);
$pdf->Cell(60, 5, "FOOTHILLS IN'T SCHOOL", 0, 1, 'C');

$pdf->SetFont('Arial', '', 9);
$pdf->Cell("", 1, '', 0, 1);
$pdf->Cell(60, 5, 'NKAWKAW BARRIER', 0, 1, 'C');
$pdf->Cell(60, 5, '(NEW ESTATE)', 0, 1, 'C');
$pdf->Cell("", 1, '', 0, 1);
$pdf->Cell(60, 5, 'Tel: +233 244 596 851/0548 912 515', 0, 1, 'C');
$pdf->Cell(60, 5, 'EJ-0137-4251', 0, 1, 'C');
$pdf->Cell("", 1, '', 0, 1);
$pdf->Cell(60, 5, 'Email: foothillsintschool@gmail.com', 0, 1, 'C');
$pdf->Cell("", 1, '', 0, 1);

$pdf->SetLineWidth(0.3);
$pdf->Line(10, $pdf->GetY(), 70, $pdf->GetY());
$pdf->Cell("", 2, '', 0, 1);


// Select Receipt details from Database
$sql = "SELECT * FROM receipt WHERE RECEIPT_ID ='{$_GET['RECEIPT_ID']}' ";
$result = $con->query($sql);

if($result->num_rows > 0) {
    while($row=$result ->fetch_assoc()){

        $pdf->Cell(60, 8, 'Receipt ID: ' . $row['RECEIPT_ID'], 0, 1);
        $pdf->Cell(60, 8, 'Payment Date: ' . $row['PAYMENT_DATE'], 0, 1);
        $pdf->Cell(60, 8, 'Student Name: ' . $row['STUDENT_NAME'], 0, 1);
        $pdf->Cell(60, 8, 'Amount Paid: ' . $row['AMOUNT'], 0, 1);
        $pdf->Cell(60, 8, 'Paid By: ' . $row['PAID_BY'], 0, 1);
        $pdf->Cell(60, 8, 'Balance: ' . $row['BALANCE'], 0, 1);
                
    }
}

$pdf->Cell("", 5, '', 0, 1);


$pdf->SetLineWidth(0.3);
$pdf->Line(10, $pdf->GetY(), 70, $pdf->GetY());
$pdf->Cell("", 5, '', 0, 1);

$pdf->SetFont('Arial', '', 11);
$pdf->Cell(60, 5, 'Headmaster Signarure', 0, 1, 'L');
$pdf->Cell("", 10, '', 0, 1);
$pdf->SetLineWidth(0.3);
$pdf->Line(10, $pdf->GetY(), 70, $pdf->GetY());
$pdf->Cell("", 4, '', 0, 1);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(60, 5, 'Thank You!', 0, 1, 'C');

// Before generating the PDF content
//header('Content-Disposition: attachment;filename="your_file_name.pdf"');
$con->close();
$pdf->Output('P','receipt.pdf'); // Output the PDF
// exit();
?>


