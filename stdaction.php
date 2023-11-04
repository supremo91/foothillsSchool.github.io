<?php

require_once 'stddb.php';
require_once 'util.php';
$db = new Database;
$util = new Util;

// Handle Add new student Ajax request
       	
if(isset($_POST['add'])){
    $stdname =$util ->testInput($_POST['stdname']);
    $stdclass =$util ->testInput($_POST['stdclass']);
    $dob =$util ->testInput($_POST['dob']);
    $gender =$util ->testInput($_POST['gender']);
    $pname =$util ->testInput($_POST['pname']);
    $pcontact =$util ->testInput($_POST['pcontact']);
    
    if($db->insert($stdname, $stdclass, $dob, $gender, $pname, $pcontact)){
        echo $util->showMessage('success', 'Data inserted successfully!');
    } else {
        echo $util->showMessage('danger', 'Something went wrong');
    } 
}
//Handle Fetch All Student Ajax request
if(isset($_GET['read'])){
    $students = $db->read();
    $output = '';
    if($students) {
        foreach ($students as $row) {

            $output .=' <tr>
                            <td>'.$row['id'].'</td>
                            <td>'.$row['student_name'].'</td>
                            <td>'.$row['student_class'].'</td>
                            <td>'.$row['date_of_birth'].'</td>
                            <td>'.$row['gender'].'</td>
	                        <td>'.$row['parent_name'].'</td>
                            <td>'.$row['parent_contact'].'</td>
                            <td>
                                <a href="#" id="'.$row['id'].'" class="btn btn-success btn-sm rounded-pill py-0 editLink" data-toggle="modal"
                                data-target="#editStudentModal">Edit</a>
                                <a href="#" id="'.$row['id'].'" class="btn btn-danger btn-sm rounded-pill py-0 deleteLink">Delete</a>
                            </td>
                        </tr>';

        }
        echo $output;
    } else {
        echo ' <tr>
                    <td colspan="8"> No Student Found in the Database!</td>
        
                </tr> ';
    }
}

// Handle edit student ajax request
if(isset($_GET['edit'])){
$id = $_GET['id'];

$students = $db->readOne($id);
echo json_encode($students);
}

//Handle Update Students Ajax request
if(isset($_POST['update'])) {
    $id = $util->testInput($_POST['id']);
    $stdname =$util ->testInput($_POST['stdname']);
    $stdclass =$util ->testInput($_POST['stdclass']);
    $dob =$util ->testInput($_POST['dob']);
    $gender =$util ->testInput($_POST['gender']);
    $pname =$util ->testInput($_POST['pname']);
    $pcontact =$util ->testInput($_POST['pcontact']);

    if($db->update($id, $stdname, $stdclass, $dob, $gender, $pname, $pcontact)){
        echo $util->showMessage('success', 'Data updated successfully');
    } else {
        echo $util->showMessage('danger', 'something went wrong');

    }
}

// Handle delete Ajax request
if(isset($_GET['delete'])) {
    $id = $_GET['id'];
    if($db->delete($id)) {
        echo $util->showMessage('info', 'Data deleted successfully!');
    } else {
        echo $util->showMessage('danger','something went wrong!');
    }


}
?>