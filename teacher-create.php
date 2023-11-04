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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Foothills International School</title>
  </head>
  <body>
    
  <div class="container mt-5">
  <?php include('message.php'); ?>
    <div class="row">
        <div class="col-md-6 offset-md-3">
        <div class="card shadow">
            <div class="card-header bg-secondary text-white">
                <h4>Teacher's Form 
                <a href="admin/staff_details.php" class="btn btn-danger float-end">BACK</a>
                    
                </h4>
            </div>
                    <div class="card-body">
                        <form action="tcrud.php" method="POST">

                            <div class="mb-3">
                                <label>First Name</label>
                                <input type="text" name="fname" class="form-control text-uppercase" required>
                            </div>
                            <div class="mb-3">
                                <label>Last Name</label>
                                <input type="text" name="lname" class="form-control text-uppercase" required>
                            </div>
                            <div class="mb-3">
                                <label>Email Address </label>
                                <input type="email" name="email" class="form-control text-uppercase" required>
                            </div>

                            <div class="mb-3">
                                <label>Position</label>
                                <input type="text" name="position" class="form-control text-uppercase" required>
                            </div>

                            <div class="mb-3">
                                <label>Contact</label>
                                <input type="number" name="phone" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_teacher" class="btn btn-secondary">Save Teacher</button>
                            </div>

                     </form>
                 </div>
             </div>
         </div>
        </div>
     </div>

     <script src="js/bootstrap.bundle.min.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>