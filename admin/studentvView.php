<?php
    session_start();
    require 'connection.php';
    require 'fetch_dashboard_data.php';
?>

<!doctype html>
<html lang="en">
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
    </style>
    
  </head>
  <body>
  <div class="container mt-4">

<?php include('message.php'); ?>

<div class="row">
    <div class="col-md-12">
    <div class="card shadow">
    <div class="card">

        <div class="card-header bg-primary text-white">
            <h4>Student Details | Total Student Addmitted: <?php echo $studentCount; ?></h4>
            <div class="row">
                <div class="col-md-6">
                        <input type="text" id="student-search" class="form-control" placeholder="Search By Name"> 
                    </div>
                       <div class="col-md-6 text-end">
                                       
                       <button class="btn btn-dark btn-sm" onclick="GetPrint()" >Print</button>
                        <a href="student-create.php" class="btn btn-secondary btn-sm">Add Students</a>
                        <a href="home.html" class="btn btn-info btn-sm">Click To Home</a>
                    </div>
                </div>
        </div>
     
            <div class="card-body">
                

                <table class="table table-bordered table-striped " id="myTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>ADDMISSION DATE</th>
                            <th>CLASS</th>
                            <th>DATE OF BIRTH</th>
                            <th>GENDER</th>
                            <th>NHIS</th>
                            <th>PARENT NAME</th>
                            <th>PARENT NUMBER</th>
                            <th>STUDENT PICTURE</th>
                            <th>PARENT PICTURE</th>

                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "SELECT * FROM student";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $student)
                                {
                                    ?>
                                    <tr>
                                    
                                        <td><?= $student['ID']; ?></td>
                                        <td><?= $student['Student_Name']  = strtoupper($student['Student_Name']); ?></td>
                                        <td><?= $student['Addmission_Date']; ?></td>
                                        <td><?= $student['Student_Class'] = strtoupper($student['Student_Class']); ?></td>
                                        <td><?= $student['Date_Of_Birth']; ?></td>
                                        <td><?= $student['Gender'] = strtoupper($student['Gender']); ?></td>
                                        <td><?= $student['Nhis']; ?></td>
                                        <td><?= $student['Parent_Name'] = strtoupper($student['Parent_Name']); ?></td>
                                        <td><?= $student['Parent_Contact']; ?></td>
                                        <td><img src="uploads/<?= $student['Student_Picture']; ?>" alt="<?= $student['Student_Name']."'s Picture"; ?>" width="50"  height="50" ></td>
                                        <td><img src="uploads/<?= $student['Parent_Picture']; ?>" alt="<?= $student['Parent_Name']."'s Picture"; ?>" width="50"  height="50" > </td>
                                        
                                        <td>
                                            <!--a href="student-view.php?ID=<!?= $student['ID']; ?>" class="btn btn-info btn-sm">View</a-->
                                            <a href="student-edit.php?ID=<?= $student['ID']; ?>" class="btn btn-success btn-sm">Edit</a>
                                            <form action="crud.php" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                                <button type="submit" name="delete_student" value="<?=$student['ID'];?>" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
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
</div>
    




    

    <script src="js/bootstrap.bundle.min.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="index.js"></script>
    <script src="print.js"></script>
    <script src="dashboard.js"></script>
  </body>
</html>