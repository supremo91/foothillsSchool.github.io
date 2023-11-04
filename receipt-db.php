<?php

session_start();
require 'connection.php';


if(isset($_POST['delete_receipt']))
{
    $receipt_id = mysqli_real_escape_string($con, $_POST['delete_receipt']);

    $query = "DELETE FROM receipt WHERE RECEIPT_ID='$receipt_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Receipt Deleted Successfully";
        header("Location: receipt.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Receipt Not Deleted";
        header("Location: receipt.php");
        exit(0);
    }
}

if(isset($_POST['update_receipt']))
{
    $receipt_id = mysqli_real_escape_string($con, $_POST['receipt_id']);

    $pdate = mysqli_real_escape_string($con, $_POST['pdate']);
    $term = mysqli_real_escape_string($con, $_POST['term']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $class = mysqli_real_escape_string($con, $_POST['class']);
    $paidby = mysqli_real_escape_string($con, $_POST['paidby']);
    $amountpaid = mysqli_real_escape_string($con, $_POST['amountpaid']);
    $balance = mysqli_real_escape_string($con, $_POST['balance']);

    $payment_status = mysqli_real_escape_string($con, $_POST['payment_status']);

    $query = "UPDATE receipt SET PAYMENT_DATE='$pdate',TERM='$term', STUDENT_NAME='$name',CLASS='$class',PAID_BY='$paidby',AMOUNT='$amountpaid',BALANCE='$balance', PAYMENT_STATUS='$payment_status' WHERE RECEIPT_ID='$receipt_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Receipt Updated Successfully";
        header("Location: receipt.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Receipt Not Updated";
        header("Location: receipt.php");
        exit(0);
    }

}


if(isset($_POST['save_receipt']))
{
    $pdate = mysqli_real_escape_string($con, $_POST['pdate']);
    $term = mysqli_real_escape_string($con, $_POST['term']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $class = mysqli_real_escape_string($con, $_POST['class']);
    $paidby = mysqli_real_escape_string($con, $_POST['paidby']);
    $amountpaid = mysqli_real_escape_string($con, $_POST['amountpaid']);
    $balance = mysqli_real_escape_string($con, $_POST['balance']);
    $payment_status = mysqli_real_escape_string($con, $_POST['payment_status']);

    $query = "INSERT INTO receipt (PAYMENT_DATE,TERM,STUDENT_NAME,CLASS,PAID_BY,AMOUNT,BALANCE,PAYMENT_STATUS) VALUES ('$pdate','$term','$name','$class','$paidby','$amountpaid','$balance','$payment_status')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Payment Successfully";
        header("Location: receipt.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Payment Not Created";
        header("Location: receipt-create.php");
        exit(0);
    }
}

?>