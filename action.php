<?php

require_once 'db.php';
require_once 'util.php';
$db = new Database;
$util = new Util;

// Handle Add new teacher Ajax request

if(isset($_POST['add'])){
    $fname =$util ->testInput($_POST['fname']);
    $lname =$util ->testInput($_POST['lname']);
    $email =$util ->testInput($_POST['email']);
    $phone =$util ->testInput($_POST['phone']);
   
    if($db->insert($fname, $lname, $email, $phone)){
        echo $util->showMessage('success', 'Data inserted successfully!');
    } else {
        echo $util->showMessage('danger', 'Something went wrong');
    }
    
}
//Handle Fetch All Teachers Ajax request
if(isset($_GET['read'])){
    $teachers = $db->read();
    $output = '';
    if($teachers) {
        foreach ($teachers as $row) {
            $output .=' <tr>
                            <td>'.$row['id'].'</td>
                            <td>'.$row['first_name'].'</td>
                            <td>'.$row['last_name'].'</td>
                            <td>'.$row['email'].'</td>
                            <td>'.$row['phone'].'</td>
                            <td>
                                <a href="#" id="'.$row['id'].'" class="btn btn-success btn-sm rounded-pill py-0 editLink" data-toggle="modal"
                                data-target="#editTeacherModal">Edit</a>
                                <a href="#" id="'.$row['id'].'" class="btn btn-danger btn-sm rounded-pill py-0 deleteLink">Delete</a>
                            </td>
                        </tr>';

        }
        echo $output;
    } else {
        echo '  <tr>
                    <td colspan="6"> No Teacher Found in the Database!</td>
        
                </tr> ';
    }
}

// Handle edit teacher ajax request
if(isset($_GET['edit'])){
$id = $_GET['id'];

$teachers = $db->readOne($id);
echo json_encode($teachers);
}

//Handle Update Teacher Ajax request
if(isset($_POST['update'])) {
    $id = $util->testInput($_POST['id']);
    $fname = $util->testInput($_POST['fname']);
    $lname = $util->testInput($_POST['lname']);
    $email = $util->testInput($_POST['email']);
    $phone = $util->testInput($_POST['phone']);

    if($db->update($id, $fname, $lname, $email, $phone)){
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
