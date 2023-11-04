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

    $adnum = mysqli_real_escape_string($con, $_POST['adnum']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $addmission_date = mysqli_real_escape_string($con, $_POST['addmission_date']);
    $class = mysqli_real_escape_string($con, $_POST['class']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $Nhis = mysqli_real_escape_string($con, $_POST['Nhis']);
    $sfname = mysqli_real_escape_string($con, $_POST['sfname']);
    $smname = mysqli_real_escape_string($con, $_POST['smname']);
    $pcontact = mysqli_real_escape_string($con, $_POST['pcontact']);
    $student_picture = basename($_FILES['student_picture']['name']);
    $student_pic_temp_name = $_FILES['student_picture']['temp_name'];
    $parent_picture = basename($_FILES['parent_picture']['name']);
    $parent_pic_temp_name = $_FILES['parent_picture']['temp_name'];

    move_uploaded_file($_FILES['student_picture']['tmp_name'], "uploads/" . $student_picture);
    move_uploaded_file($_FILES['parent_picture']['tmp_name'], "uploads/" . $parent_picture);
    $query = "";
    if (isset($_FILES['student_picture']['name'], $_FILES['parent_picture']['name']) && !empty($_FILES['student_picture']['name']) && !empty($_FILES['parent_picture']['name']))
        $query = "UPDATE student SET Addmission_Date='$addmission_date',Student_Name='$name', Student_Class='$class',Date_Of_Birth='$dob',Gender='$gender',Nhis='$Nhis',Father_Name='$sfname',Mother_Name='$smname',Parent_Contact='$pcontact',Student_Picture='$student_picture',Parent_Picture='$parent_picture' WHERE ID='$student_id'";
    else if (isset($_FILES['student_picture']['name']) && !empty($_FILES['student_picture']['name']))
        $query = "UPDATE student SET Addmission_Date='$addmission_date',Student_Name='$name', Student_Class='$class',Date_Of_Birth='$dob',Gender='$gender',Nhis='$Nhis',Father_Name='$sfname',Mother_Name='$smname',Parent_Contact='$pcontact',Student_Picture='$student_picture' WHERE ID='$student_id'";
    else if (isset($_FILES['parent_picture']['name']) && !empty($_FILES['parent_picture']['name']))
        $query = "UPDATE student SET Addmission_Date='$addmission_date',Student_Name='$name', Student_Class='$class',Date_Of_Birth='$dob',Gender='$gender',Nhis='$Nhis',Father_Name='$sfname',Mother_Name='$smname',Parent_Contact='$pcontact',Parent_Picture='$parent_picture' WHERE ID='$student_id'";
    else
        $query = "UPDATE student SET Admission_Number='$adnum', Addmission_Date='$addmission_date',Student_Name='$name', Student_Class='$class',Date_Of_Birth='$dob',Gender='$gender',Nhis='$Nhis',Father_Name='$sfname',Mother_Name='$smname',Parent_Contact='$pcontact' WHERE ID='$student_id'";
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
    $adnum = mysqli_real_escape_string($con, $_POST['adnum']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $addmission_date = mysqli_real_escape_string($con, $_POST['addmission_date']);
    $class = mysqli_real_escape_string($con, $_POST['class']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $Nhis = mysqli_real_escape_string($con, $_POST['Nhis']);
    $sfname = mysqli_real_escape_string($con, $_POST['sfname']);
    $smname = mysqli_real_escape_string($con, $_POST['smname']);
    $pcontact = mysqli_real_escape_string($con, $_POST['pcontact']);
    $student_picture = basename($_FILES['student_picture']['name']);
    $student_pic_temp_name = $_FILES['student_picture']['temp_name'];
    $parent_picture = basename($_FILES['parent_picture']['name']);
    $parent_pic_temp_name = $_FILES['parent_picture']['temp_name'];

    move_uploaded_file($_FILES['student_picture']['tmp_name'], "uploads/" . $student_picture);
    move_uploaded_file($_FILES['parent_picture']['tmp_name'], "uploads/" . $parent_picture);

    $query = "INSERT INTO student (Admission_Number, Student_Name,Addmission_Date,Student_Class,Date_Of_Birth,Gender,Nhis,Father_Name,Mother_Name,Parent_Contact,Student_Picture,Parent_Picture) VALUES ('$adnum','$name','$addmission_date','$class','$dob','$gender','$Nhis','$sfname','$smname','$pcontact','$student_picture','$parent_picture')";

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