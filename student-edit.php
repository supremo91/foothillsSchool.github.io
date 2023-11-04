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

    <title>Student Edit</title>
  </head>
  <body>
    
  <div class="container mt-5">
  <?php include('message.php'); ?>
  
    <div class="row">
        <div class="col-md-6 offset-md-3">
         <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4>Student Edit
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
                        <form action="crud.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="student_id" value="<?= $student['ID']; ?>">

                        <div class="mb-3">
                                <label>Admission Number</label>
                                <input type="text" name="adnum" value="<?= $student['Admission_Number'] = strtoupper($student['Admission_Number']); ?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" value="<?= $student['Student_Name'] = strtoupper($student['Student_Name']); ?>" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Admission </label>
                                <input type="date" name="addmission_date" value="<?= $student['Addmission_Date']; ?>" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Class</label>
                                <input type="text" name="class" value="<?= $student['Student_Class'] = strtoupper($student['Student_Class']); ?>" class="form-control text-uppercase"  required>
                            </div>

                            <div class="mb-3">
                                <label>Date of Birth</label>
                                <input type="date" name="dob" value="<?= $student['Date_Of_Birth']; ?>" class="form-control" required>
                            </div>


                            <div class="mb-3">
                            <select name="gender" class="form-control form-control-lg text-uppercase" required>
                                <option value="">Select Gender</option>
                                <option value="Male" <?= $student['Gender'] === 'Male' ? 'selected' : ''; ?>>Male</option>
                                <option value="Female" <?= $student['Gender'] === 'Female' ? 'selected' : ''; ?>>Female</option>
                            </select>
                            </div>


                            <div class="mb-3">
                                <label>NHIS</label>
                                <input type="number" name="Nhis" value="<?= $student['Nhis']; ?>" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>Father's Name</label>
                                <input type="text" name="sfname" value="<?= $student['Father_Name'] = strtoupper($student['Father_Name']); ?>" class="form-control text-uppercase" required>
                            </div>

                            <div class="mb-3">
                                <label>Mother's Name</label>
                                <input type="text" name="smname" value="<?= $student['Mother_Name'] = strtoupper($student['Mother_Name']); ?>" class="form-control text-uppercase" required>
                            </div>

                            <div class="mb-3">
                                <label>Parent Contact</label>
                                <input type="text" name="pcontact" value="<?= $student['Parent_Contact']; ?>" class="form-control" required>
                            </div>


                            <td><img src="uploads/<?= $student['Student_Picture']; ?>" alt="<?= $student['Student_Name']."'s Picture"; ?>" width="50"  height="50" ></td>
                           

                            <div class="mb-3">
                                <label>Student Picture</label>
                                <input type="file" name="student_picture" value="<?= $student['Student_Picture']; ?>" class="form-control" accept="image/*">
                             </div>
                                
                             
                             <td><img src="uploads/<?= $student['Parent_Picture']; ?>" alt="<?= $student['Father_Name']."'s Picture"; ?>" width="50"  height="50" > </td>
                             <div class="mb-3">
                                <label>Parent Picture</label>
                                <input type="file" name="parent_picture" value="<?= $student['Parent_Picture']; ?>" class="form-control" accept="image/*">
                             </div>


                            <div class="mb-3">
                                <button type="submit" name="update_student" class="btn btn-primary">Update Student</button>
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