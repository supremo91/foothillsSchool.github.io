<?php
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

    <title>Student View</title>
  </head>
  <body>
    
  <div class="container mt-5">

  
    <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4>Student View Details
                <a href="student.php" class="btn btn-danger float-end">BACK</a>
                    
                </h4>
            </div>
                    <div class="card-body">
                    <?php
                        if(isset($_GET['ID']))
                        {
                            $student_id = mysqli_real_escape_string($con, $_GET['ID']);
                            $query = "SELECT * FROM student WHERE ID='$student_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                        

                            <div class="mb-3">
                                <label>Admission Number</label>
                                <p class="form-control">
                                <?= $student['Admission_Number'] = strtoupper($student['Admission_Number']); ?>
                                </p>
                            </div>

                            <div class="mb-3">
                                <label>Student Name</label>
                                <p class="form-control">
                                <?= $student['Student_Name'] = strtoupper($student['Student_Name']); ?>
                                </p>
                            </div>

                            <div class="mb-3">
                                <label>Addmission Date</label>
                                <p class="form-control">
                                <?= $student['Addmission_Date']; ?>
                            </div>
                            
                            <div class="mb-3">
                                <label>Student Class</label>
                                <p class="form-control">
                                <?= $student['Student_Class'] = strtoupper($student['Student_Class']); ?>
                            </div>

                            <div class="mb-3">
                                <label>Date of Birth</label>
                                <p class="form-control">
                                <?= $student['Date_Of_Birth']; ?>
                            </div>

                            <div class="mb-3">
                                <label>Gender</label>
                                <p class="form-control">
                                <?= $student['Gender'] = strtoupper($student['Gender']); ?></p>
                            </div>  

                            <div class="mb-3">
                                <label>NHIS</label>
                                <p class="form-control">
                                <?= $student['Nhis']; ?></p>
                            </div>  


                            <div class="mb-3">
                                <label>Father's Name</label>
                                <p class="form-control">
                                <?= $student['Father_Name'] = strtoupper($student['Father_Name']); ?> </p>
                            </div>

                            <div class="mb-3">
                                <label>Mother's Name</label>
                                <p class="form-control">
                                <?= $student['Mother_Name'] = strtoupper($student['Mother_Name']); ?> </p>
                            </div>

                            <div class="mb-3">
                                <label>Parent Contact</label>
                                <p class="form-control">
                                <?= $student['Parent_Contact']; ?> </p>
                            </div>

                            <div class="mb-3">
                            <label>Student Picture</label>
                            <td><img src="uploads/<?= $student['Student_Picture']; ?>" alt="<?= $student['Student_Name']."'s Picture"; ?>" width="50"  height="50" ></td>
                           
                            </div>

                            <!-- <div class="mb-3">
                                <label>Student Picture</label>
                                <p class="form-control">
                                <!?= $student['Student_Picture']; ?> </p>
                            </div> -->

                            <div class="mb-3">
                                <label>Parent Picture</label>
                                <td><img src="uploads/<?= $student['Parent_Picture']; ?>" alt="<?= $student['Father_Name']."'s Picture"; ?>" width="50"  height="50" > </td>


                                <!-- <p class="form-control">
                                <!?= $student['Parent_Picture']; ?> </p> -->
                            </div>

                       
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