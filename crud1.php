<?php
session_start();
require 'connection.php';


if (isset($_POST['delete_student'])) {
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM student WHERE ID='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: student.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: student.php");
        exit(0);
    }
}


if (isset($_POST['update_student'])) {
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $class = mysqli_real_escape_string($con, $_POST['class']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $Nhis = mysqli_real_escape_string($con, $_POST['Nhis']);
    $pname = mysqli_real_escape_string($con, $_POST['pname']);
    $pcontact = mysqli_real_escape_string($con, $_POST['pcontact']);
    $student_picture = mysqli_real_escape_string($con, $_FILES['student_picture']['name']);
    $temp_name = mysqli_real_escape_string($con, $_FILES['student_picture']['temp_name']);
    $parent_picture = mysqli_real_escape_string($con, $_FILES['parent_picture']['name']);
    $temp_name = mysqli_real_escape_string($con, $_FILES['parent_picture']['temp_name']);


    move_uploaded_file($temp_name, "uploads/" . $student_picture);
    move_uploaded_file($temp_name, "uploads/" . $parent_picture);

    $query = "UPDATE student SET Student_Name='$name', Student_Class='$class',Date_Of_Birth='$dob',Gender='$gender',Nhis='$Nhis',Parent_Name='$pname',Parent_Contact='$pcontact',Student_Picture='$student_picture',Parent_Picture='$parent_picture' WHERE ID='$student_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: student.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: student.php");
        exit(0);
    }

}


if (isset($_POST['save_student'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $class = mysqli_real_escape_string($con, $_POST['class']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $Nhis = mysqli_real_escape_string($con, $_POST['Nhis']);
    $pname = mysqli_real_escape_string($con, $_POST['pname']);
    $pcontact = mysqli_real_escape_string($con, $_POST['pcontact']);
    $student_picture = basename($_FILES['student_picture']['name']);
    $student_pic_temp_name = $_FILES['student_picture']['temp_name'];
    $parent_picture = basename($_FILES['parent_picture']['name']);
    $parent_pic_temp_name = $_FILES['parent_picture']['temp_name'];

    move_uploaded_file($_FILES['student_picture']['tmp_name'], "uploads/" . $student_picture);
    move_uploaded_file($_FILES['parent_picture']['tmp_name'], "uploads/" . $parent_picture);

    $query = "INSERT INTO student (Student_Name,Student_Class,Date_Of_Birth,Gender,Nhis,Parent_Name,Parent_Contact,Student_Picture,Parent_Picture) VALUES ('Beeee','$class','$dob','$gender','$Nhis','$pname','$pcontact','$student_picture','$parent_picture')";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = "Student Created Successfully";
        header("Location: student-create.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Student Not Created";
        header("Location: student-create.php");
        exit(0);
    }
}



?>