<?php
    session_start();
    require '../connection.php';
    require '../fetch_dashboard_data.php';
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" href="css/style.css" />

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

  
  
  <!--====================pagination Start====================-->
  <div class="row">
  <?php include('../message.php'); ?>
          <div class="col-md-12 mb-3">
            <div class="card">
              <div class="card-header">
                <span><i class="bi bi-table me-2"></i></span> Students Details | <a href="../home.html" class="btn btn-info btn-sm">Click To Home</a>
                <a href="../student-create.php" class="btn btn-secondary btn-sm">Add Students</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <table id="example" class="table table-striped data-table" style="width: 100%">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>ADMISSION NUMBER</th>
                    <th>NAME</th>
                    <th>ADMISSION DATE</th>
                    <th>CLASS</th>
                    <th>DATE_OF BIRTH</th>
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
                                 
                                    foreach($query_run as $student) {
                                       
                            ?>
                            
                            
                                <td><?= $student['ID']; ?></td>
                                <td><?= $student['Admission_Number'] = strtoupper($student['Admission_Number']); ?></td>
                                <td><?= $student['Student_Name'] = strtoupper($student['Student_Name']); ?></td>
                                <td><?= $student['Addmission_Date']; ?></td>
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
                                    <a href="student-view.php?ID=<?= $student['ID']; ?>" class="btn btn-info btn-sm">View</a>
                                    <a href="student-edit.php?ID=<?= $student['ID']; ?>" class="btn btn-success btn-sm">Edit</a>
                                    <form action="crud.php" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                        <button type="submit" name="delete_student" value="<?= $student['ID']; ?>" class="btn btn-danger btn-sm">Delete</button>
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
      </div>
    </main>


   <!--====================pagination End====================-->

  




     <!-- Include Bootstrap JS (Optional) -->
     <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script> -->
 
     <script src="../dashboard.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/script.js"></script>
    <script src="./index.js"></script>
  </body>
</html>