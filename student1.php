<?php
session_start();
require 'connection.php';
require 'fetch_dashboard_data.php';

// Function to generate an admission number
function generateAdmissionNumber($con, $admissionDate) {
    // Extract the year part from the admission date
    $admissionYear = date("Y", strtotime($admissionDate));

    // Query to retrieve the last auto-incremented admission number for the given year
    $query = "SELECT MAX(Addmission_Number) AS lastAdmissionNumber FROM student WHERE Addmission_Date LIKE '$admissionYear%'";
    $query_run = mysqli_query($con, $query);
    $result = mysqli_fetch_assoc($query_run);

    // Extract the last admission number
    $lastAdmissionNumber = $result['lastAdmissionNumber'];

    // Extract the auto-incremented part from the last admission number
    $autoIncrementedPart = (int)substr($lastAdmissionNumber, 0, 3);

    // If there's no previous admission number for the current year, start from 1
    if ($autoIncrementedPart == 0) {
        $autoIncrementedPart = 1;
    } else {
        // Increment the auto-incremented part by 1
        $autoIncrementedPart++;
    }

    // Format the auto-incremented part to have leading zeros (e.g., 001)
    $formattedAutoIncrementedPart = sprintf("%03d", $autoIncrementedPart);

    // Combine the auto-incremented part and the admission year
    $admissionNumber = $formattedAutoIncrementedPart . '/' . $admissionYear;

    return $admissionNumber;
}
?>

<!DOCTYPE html>
<html lang="en">
<!-- The rest of your HTML code remains the same as before -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="admin/css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        th {
            font-size: 12px;
            text-align: center;
            font-weight: bold;
            color: #00ff;
        }

        td {
            font-size: 12px; 
            text-align: center; 
            font-weight: bold;
        }

         table th:nth-child(1),
        table td:nth-child(1) {
            display: none;
        } 

        /* Media query for screens up to 768px width (e.g., tablets) */
        @media (max-width: 768px) {
            th {
                font-size: 10px;
            }

            td {
                font-size: 10px;
            }
        }

        /* Media query for screens up to 576px width (e.g., mobile phones) */
        @media (max-width: 576px) {
            th {
                font-size: 8px;
            }

            td {
                font-size: 8px;
            }
        }
    </style>
</head>
<body>





    <div class="container mt-4">
        <?php include('message.php'); ?>
        <div class="col-md-12">
            <div class="card shadow">
                <div class="row">
                    <div class="bg-primary text-white">
                        <h4>Student Details | Total Students Admitted: <?php echo $studentCount; ?></h4>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" id="student-search" class="form-control" placeholder="Search by Student Name or Class">
                            </div>
                        </div>
                        <div class="col-md-12 text-end">
                            <button class="btn btn-dark btn-sm" onclick="GetPrint()">Print</button>
                            <a href="student-create.php" class="btn btn-secondary btn-sm">Add Students</a>
                            <a href="home.html" class="btn btn-info btn-sm">Click To Home</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>ADMISSION NUMBER</th>
                                <th>NAME</th>
                                <th>ADMISSION DATE</th>
                                <th>CLASS</th>
                                <th>DATE OF BIRTH</th>
                                <th>GENDER</th>
                                <th>NHIS</th>
                                <th>FATHER NAME</th>
                                <th>MOTHER NAME</th>
                                <th>PARENT NUMBER</th>
                                <th>STUDENT PICTURE</th>
                                <th>PARENT PICTURE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody id="student-table-body-placeholder">
                            <?php 
                                $query = "SELECT * FROM student ORDER BY Addmission_Date DESC";
                                $query_run = mysqli_query($con, $query);

                                if(mysqli_num_rows($query_run) > 0) {
                                    // Initialize the auto-incremented part
                                    $autoIncrementedPart = 1;
                                    foreach($query_run as $student) {
                                        // Get the admission date for the student
                                        $admissionDate = $student['Addmission_Date'];
                                        // Use the function to generate the admission number
                                        $admissionNumber = generateAdmissionNumber($con, $admissionDate);
                            ?>

                            <tr>
                                <td><?= $admissionNumber; ?></td>
                                <td><?= $student['Student_Name'] = strtoupper($student['Student_Name']); ?></td>
                                <td><?= $admissionDate; ?></td>
                                <td><?= $student['Student_Class'] = strtoupper($student['Student_Class']); ?></td>
                                <td><?= $student['Date_Of_Birth']; ?></td>
                                <td><?= $student['Gender'] = strtoupper($student['Gender']); ?></td>
                                <td><?= $student['Nhis']; ?></td>
                                <td><?= $student['Father_Name'] = strtoupper($student['Father_Name']); ?></td>
                                <td><?= $student['Mother_Name'] = strtoupper($student['Mother_Name']); ?></td>
                                <td><?= $student['Parent_Contact']; ?></td>
                                <td><img src="uploads/<?= $student['Student_Picture']; ?>" alt="<?= $student['Student_Name'] . "'s Picture"; ?>" width="50" height="50"></td>
                                <td><img src="uploads/<?= $student['Parent_Picture']; ?>" alt="<?= $student['Father_Name'] . "'s Picture"; ?>" width="50" height="50"> </td>
                                <td>
                                    <a href="student-view.php?Addmission_Number=<?= $student['Addmission_Number']; ?>" class="btn btn-info btn-sm">View</a>
                                    <a href="student-edit.php?Addmission_Number=<?= $student['Addmission_Number']; ?>" class="btn btn-success btn-sm">Edit</a>
                                    <form action="crud.php" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                        <button type="submit" name="delete_student" value="<?= $student['Addmission_Number']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                            }
                        } else {
                            echo "<h5> No Record Found </h5>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<script src="js/bootstrap.bundle.min.js"></script>    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="index.js"></script>
<script src="print.js"></script>
<script src="dashboard.js"></script>
</body>
</html>
