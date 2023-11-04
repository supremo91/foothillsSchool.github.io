<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="admin/css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">




</head>
<body>
   
<!-- Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
      <div class="card-header ">
                <h5 class="modal-title" id="exampleModalLabel">Student Form

                <a href="student.php" class="btn btn-danger float-end">BACK</a>
                </h5>
       
            </div>
        
      </div>
      <div class="modal-body">

                     <form class="form-control" action="crud.php"  method="POST" id="classInput" enctype="multipart/form-data">
                        <input type="hidden" name="student_id" value="<?= $student['Addmission_Number']; ?>">


                        <div class="row g-3">
                            <div class="col">
                            <label>Student Name</label>
                                <input type="text" name="name" id="classInput" class="form-control text-uppercase"
                                required title="Only alphabetic characters and spaces are allowed"  
                                  placeholder="eg.Emmanuel Amoako">
                
                            </div>
                            <div class="col">
                            <label>Addmission Date</label>
                            <input type="date" name="addmission_date" class="form-control" required>

                            </div>
                        </div>

                            
                        <div class="row g-3">
                            <div class="col">
                            
                                <label>Student Class</label>
                                <input type="text" name="class" id="classInput" class="form-control text-uppercase" 
                                required title="Only alphanumeric characters and spaces are allowed">

                            </div>

                        
                            <div class="col">
                                <label>Date of Birth</label>
                                <input type="date" name="dob" class="form-control" required>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col">
                            <label>GENDER</label>
                            <select name="gender" id="gender" class="form-control form-control-lg text-uppercase " required>
                                <option value="">Select Gender</option>
                                <option id="classInput" value="Male">Male</option>
                                <option id="classInput" value="Female">Female</option>
                            </select>
                            </div>

                            <div class="col">
                                <label>NHIS</label>
                                <input type="number" name="Nhis" class="form-control"
                                inputmode="numeric" placeholder="eg. 41081507">
                                
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col">
                                <label>Father's Name</label>
                                <input type="text" name="sfname" class="form-control text-uppercase" required
                                    title="Only alphabetic characters, spaces, and dots are allowed" placeholder="eg. Appiah James">
                            </div>

                            <div class="col">
                                <label>Mother's Name</label>
                                <input type="text" name="smname" class="form-control text-uppercase" required
                                    title="Only alphabetic characters, spaces, and dots are allowed">
                            </div>

                        </div>


                             <div class="mb-3">
                                <label>Parent Contact</label>
                                <input type="text" name="pcontact" class="form-control" 
                                 placeholder="eg. 0246932470">
                            </div>
                            <div class="row g-3">
                            <div class="col">
                                <label>Student Picture</label>
                                <input type="file" name="student_picture" class="form-control" accept="image/*">
                             </div>

                             </div>
                             <div class="col">
                                <label>Parent Picture</label>
                                <input type="file" name="parent_picture" class="form-control" accept="image/*">
                             </div>
                             </div>

                          
                            
                            <div class="row py-3">
                            <div class="col ">
                            <button type="submit" name="save_student" class="btn btn-primary">Save Student</button>
                            </div>

                            <div class="col">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                        </div>
                        
                        </form>
                    </div>
    
        </div>
    </div>
</div>






   <div class="container my-3">
    <h1 class="text-center">Students Details</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal">
    Add Students
    </button>


   </div>







<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="js/bootstrap.bundle.min.js"></script>    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>