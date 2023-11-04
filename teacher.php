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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



    <style>
         th {
            font-size: 13px;
            text-align: center;
            
            color: #464a48;
        }


            td {
            font-size: 13px; 
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


            <div class="card-header bg-secondary text-white">
                <h4>Teacher Details | Total Number of Teachers <?php echo $teacherCount; ?> </h4>
                <div class="row">
                <div class="col-md-6">
                        <input type="text" id="teacher-search" class="form-control" placeholder="Search By Name">
                    </div>
                       <div class="col-md-6 text-end">
                        <a href="teacher-create.php" class="btn btn-primary btn-sm">Add New Teacher</a>
                        <a href="admin/staff_details.php" class="btn btn-info btn-sm">View Staff Details</a>
                        <a href="home.html" class="btn btn-info btn-sm">Click To Home</a>
                    </div>
                </div>
            </div>

            </div>

            
            <div class="card-body">

                <table class="table table-bordered table-striped">
                    <thead>
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
                            $query = "SELECT * FROM teacher";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $teacher)
                                {
                                    ?>
                                    <tr>


                                    
                                        <td><?= $teacher['ID']; ?></td>
                                        <td><?=$teacher['First_Name'] = strtoupper($teacher['First_Name']);?></td>
                                        <td><?= $teacher['Last_Name'] = strtoupper($teacher['Last_Name']); ?></td>
                                        <td><?= $teacher['Email_Address'] = strtoupper($teacher['Email_Address']); ?></td>
                                        <td><?= $teacher['Position'] = strtoupper($teacher['Position']); ?></td>
                                        <td><?= $teacher['Phone_Number']; ?></td>
                                        <td>
                                            <!--a href="teacher-view.php?ID=<!?= $teacher['ID']; ?>" class="btn btn-info btn-sm">View</a-->
                                            <a href="teacher-edit.php?ID=<?= $teacher['ID']; ?>" class="btn btn-success btn-sm">Edit</a>
                                            <form action="tcrud.php" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this teacher?');">
                                                <button type="submit" name="delete_teacher" value="<?=$teacher['ID'];?>" class="btn btn-danger btn-sm">Delete</button>
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
  </body>
</html>