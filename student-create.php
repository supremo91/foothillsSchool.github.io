<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Foothills International School</title>
  </head>
  <body>
    
  <div class="container mt-5">
  <?php include('message.php'); ?>
  
    <div class="row">
        <div class="col-md-8 offset-md-3">
         <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4>Student Form
                <a href="student.php" class="btn btn-danger float-end">BACK</a>
                </h4>
            </div>
                    <div class="card-body">
                        <form action="crud.php" method="POST" id="classInput" enctype="multipart/form-data">
                        <input type="hidden" name="student_id" value="<?= $student['ID']; ?>">


                        <div class="row g-3">
                            <div class="col">
                            <label>Admission Number</label>
                                <input type="text" name="adnum"  class="form-control text-uppercase">
                
                            </div>
                            <div class="col">
                            <label>Student Name</label>
                                <input type="text" name="name"  class="form-control text-uppercase"
                                required title="Only alphabetic characters and spaces are allowed"  
                                  placeholder="eg.Emmanuel Amoako">
                
                            </div>
                        </div>


                        <div class="row g-3">
                                           
                            
                            <div class="col">
                            <label>Admission Date</label>
                            <input type="date" name="addmission_date" class="form-control" required>

                            </div>


                            <div class="col">
                            <label>Student Class</label>
                                <input type="text" name="class"  class="form-control" 
                                required>
                            </div>

                        </div>

                            
                        
                    <div class="row g-3">
                    
                        <div class="col">
                            <label>Date of Birth</label>
                            <input type="date" name="dob" class="form-control" required>
                        </div>


                            <div class="col">
                            <label>Gender</label>
                            <select name="gender" id="gender" class="form-control text-uppercase " required>
                                <option value="">Select Gender</option>
                                <option id="classInput" value="Male">Male</option>
                                <option id="classInput" value="Female">Female</option>
                            </select>
                            </div>

                    </div>

                    <div class="row g-3">

                            <div class="col">
                                <label>NHIS</label>
                                <input type="number" name="Nhis" class="form-control"
                                inputmode="numeric" placeholder="eg. 41081507">
                                
                            </div>


                            <div class="col">
                                <label>Father's Name</label>
                                <input type="text" name="sfname" class="form-control text-uppercase" required
                                    title="Only alphabetic characters, spaces, and dots are allowed" placeholder="eg. Appiah James">
                            </div>

                    </div>

                    <div class="row g-3">
                            <div class="col"> 
                                <label>Mother's Name</label>
                                <input type="text" name="smname" class="form-control text-uppercase" required
                                    title="Only alphabetic characters, spaces, and dots are allowed" placeholder="eg. Appiah James">
                            </div>


                            <div class="col">
                                <label>Parent Contact</label>
                                <input type="text" name="pcontact" class="form-control" 
                                 placeholder="eg. 0246932470">
                            </div>
                    </div>

                    <div class="row g-3">
                            <div class="col">
                                <label>Student Picture</label>
                                <input type="file" name="student_picture" class="form-control" accept="image/*">
                             </div>

                             <div class="col">
                                <label>Parent Picture</label>
                                <input type="file" name="parent_picture" class="form-control" accept="image/*">
                             </div>

                    </div>
                            <div class="mb-3">
                                <button type="submit" name="save_student" class="btn btn-primary">Save Student</button>
                            </div>
                        </form>
                 </div>
             </div>
         </div>
        </div>
     </div>
                    
     <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>