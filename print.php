<?php 
  require ("fpdf/fpdf.php");
  require ("word.php");
  require "config.php"; 
  
  // Fetch data from the form
  $receipt_no = $_POST['receipt_no'];
  $payment_date = $_POST['payment_date'];
  $amount_paid = $_POST['amount_paid'];
  $student_name = $_POST['student_name'];
  
  // Create a PDF document
  $pdf = new FPDF();
  $pdf->AddPage();
  
  // Set font
  $pdf->SetFont('Arial', '', 12);
  
  // Add school logo
  $pdf->Image('assests/Foothills logo.jpeg', 10, 10, 40);
  
  // Title
  $pdf->Cell(0, 10, 'Payment Receipt', 0, 1, 'C');
  
  // Receipt No.
  $pdf->Cell(0, 10, 'Receipt No: ' . $receipt_no, 0, 1);
  
  // Payment Date
  $pdf->Cell(0, 10, 'Payment Date: ' . $payment_date, 0, 1);
  
  // Amount Paid
  $pdf->Cell(0, 10, 'Amount Paid (Ghana Cedis): ' . number_format($amount_paid, 2), 0, 1);
  
  // Student Name
  $pdf->Cell(0, 10, 'Student Name: ' . $student_name, 0, 1);
  
  // Signature Line
  $pdf->Line(10, 120, 100, 120);
  $pdf->Cell(0, 10, 'Signature', 0, 1);
  
  // Output the PDF
  $pdf->Output();
  
  


  
?>