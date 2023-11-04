<?php
session_start();
require 'connection.php';

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

    <title>Teacher Edit</title>
  </head>
  <body>
    
  <div class="container mt-5">
  <?php include('message.php'); ?>

  
  
    <div class="row">
        <div class="col-md-6 offset-md-3">
        <div class="card shadow">
            <div class="card-header bg-secondary text-white">
                <h4>Teacher Edit
                <a href="admin/staff_details.php" class="btn btn-danger float-end">BACK</a>
                
                    
                </h4>
            </div>
                    <div class="card-body">
                    <?php
                        if(isset($_GET['ID']))
                        {
                            $teacher_id = mysqli_real_escape_string($con, $_GET['ID']);
                            $query = "SELECT * FROM teacher WHERE ID='$teacher_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $teacher = mysqli_fetch_array($query_run);
                                ?>
                                
                        <form action="tcrud.php" method="POST">
                        <input type="hidden" name="teacher_id" value="<?= $teacher['ID']; ?>">
                            <div class="mb-3">
                                <label>First Name</label>
                                <input type="text" name="fname" value="<?= $teacher['First_Name']; ?>" class="form-control text-uppercase" required>
                            </div>
                            <div class="mb-3">
                                <label>Last Name</label>
                                <input type="text" name="lname" value="<?= $teacher['Last_Name']; ?>" class="form-control text-uppercase" required>
                            </div>
                            <div class="mb-3">
                                <label>Emai Address</label>
                                <input type="email" name="email" value="<?= $teacher['Email_Address']; ?>" class="form-control text-uppercase" required>
                            </div>

                            <div class="mb-3">
                                <label>Position</label>
                                <input type="text" name="position" value="<?= $teacher['Position']; ?>" class="form-control text-uppercase" required>
                            </div>

                            <div class="mb-3">
                                <label>Phone Number</label>
                                <input type="number" name="phone" value="<?= $teacher['Phone_Number']; ?>" class="form-control" required>
                            </div>

                    
                            <div class="mb-3">
                                <button type="submit" name="update_teacher" class="btn btn-secondary">Update Teacher</button>
                            </div>

                        </form>
                        <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                 </div>

                 
             </div>
         </div>
         </div>
     </div>
     <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>