<?php
session_start();
require 'connection.php';

if(isset($_POST['delete_teacher']))
{
    $teacher_id = mysqli_real_escape_string($con, $_POST['delete_teacher']);

    $query = "DELETE FROM teacher WHERE ID='$teacher_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Teacher Deleted Successfully";
        header("Location: admin/staff_details.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Teacher Not Deleted";
        header("Location: admin/staff_details.php");
        exit(0);
    }
}


if(isset($_POST['update_teacher']))
{
    $teacher_id = mysqli_real_escape_string($con, $_POST['teacher_id']);

    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $position = mysqli_real_escape_string($con, $_POST['position']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    $query = "UPDATE teacher SET First_Name='$fname', Last_Name='$lname',Email_Address='$email',Position='$position',Phone_Number='$phone' WHERE ID='$teacher_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Teacher Updated Successfully";
        header("Location: admin/staff_details.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Teacher Not Updated";
        header("Location: admin/staff_details.php");
        exit(0);
    }

}


if(isset($_POST['save_teacher']))
{
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $position = mysqli_real_escape_string($con, $_POST['position']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    $query = "INSERT INTO teacher (First_Name,Last_Name,Email_Address,Position,Phone_Number) VALUES ('$fname','$lname','$email','$position','$phone')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Teacher Created Successfully";
        header("Location: admin/staff_details.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Teacher Not Created";
        header("Location: admin/staff_details.php");
        exit(0);
    }
}

?>