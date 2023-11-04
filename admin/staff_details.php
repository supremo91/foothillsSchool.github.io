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

  <style>
    th {
      font-size: 13px;
      text-align: center;
     
      color: #00ff;
    }

    td {
      font-size: 13px;
      text-align: center;
     
    }

    table th:nth-child(1),
    table td:nth-child(1) {
      display: none;

    }
  </style>

</head>

  
  
  <!--====================pagination Start====================-->
  <div class="row">
          <div class="col-md-12 mb-3">
            <div class="card">
                
              <div class="card-header">
              
              
                <span><i class="bi bi-table me-2"></i></span> <h4 class="text-dark align-content-center">Staff Details <a href="../home.html" class="btn btn-info btn-sm">Click To Home</a>
                <!--button class="btn btn-dark btn-sm" onclick="GetPrint()" >Print</button-->
                <a href="../teacher-create.php" class="btn btn-primary btn-sm">Add New Staff</a>
            
            </h4> 
               
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <table id="example" class="table table-striped data-table" style="width: 100%">
                
                <!--table  class="table table-striped data-table" style="width: 100%"-->

                <thead id="myTable">
                    <tr>
                        <th>ID</th>
                        <th>FIRST NAME</th>
                        <th>LAST NAME</th>
                        <th>E-MAIL</th>
                        <th>POSITION</th>
                        <th>PHONE NUMBER</th>
                        <th>ACTION</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require '../connection.php'; 
                    $sql ="SELECT * FROM teacher";
                    $res=$con->query($sql);
                    while($row=$res->fetch_assoc()){
                    ?>
                    <tr>
                        <td> <?= $row['ID']?> </td>
                        <td> <?= $row['First_Name']?> </td>
                        <td> <?= $row['Last_Name']?> </td>
                        <td> <?= $row['Email_Address']?> </td>
                        <td> <?= $row['Position']?> </td>
                        <td> <?= $row['Phone_Number']?> </td>

                        <td>
                        <!--a href="teacher-view.php?ID=<!?= $teacher['ID']; ?>" class="btn btn-info btn-sm">View</a-->
                        <a href="../teacher-edit.php?ID=<?= $row['ID']; ?>" class="btn btn-success btn-sm">Edit</a>
                        <form action="../tcrud.php" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this teacher?');">
                            <button type="submit" name="delete_teacher" value="<?=$row['ID'];?>" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        </td>

                        
                    </tr>
                    <?php }?>
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
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
 
     <script src="../dashboard.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/script.js"></script>
    <script src="./js/print.js"></script>
  </body>
</html>