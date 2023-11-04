<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>enrollment</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Add these links to the <head> section of your HTML document ->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> ->

</head>
<body>
<!--Add New Teacher Modal Start->
<div class="modal fade" tabindex="-1" id="addNewTeacherModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New Teacher</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form id="add-teacher-form" class="p-2" novalidate>
       
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="fname" id="fname" class="form-control form-control-lg" placeholder="Enter First Name" required>
                <div class="invalid-feedback">First name is required!</div>
            </div>

            <div class="col">
                <input type="text" name="lname" id="lname" class="form-control form-control-lg" placeholder="Enter Last Name" required>
                <div class="invalid-feedback">Last name is required!</div>
            </div>
        </div>
        <div class="mb-3">
            <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Enter E-mail" required>
            <div class="invalid-feedback">E-mail is required</div>
        </div>

        <div class="mb-3">
            <input type="tel" name="phone" id="phone" class="form-control form-control-lg" placeholder="Enter Phone" required>
            <div class="invalid-feedback">Contact is required</div>
        </div>
        <div class="mb-3">
            <input type="submit" value="Add Teacher" class="btn btn-primary btn-block btn-lg" id="add-teacher-btn">
        </div>
       </form>
      </div>
      
    </div>
  </div>
</div>
<!--Add New Teacher Modal End-->

<!--Edit Teacher Modal Start->

<div class="modal fade" tabindex="-1" id="addNewTeacherModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit this Teacher's data </h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form id="edit-teacher-form" class="p-2" novalidate>
	   <input type="hidden" name="id" id="id">
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="fname" id="fname" class="form-control form-control-lg" placeholder="Enter First Name" required>
                <div class="invalid-feedback">First name is required!</div>
            </div>

            <div class="col">
                <input type="text" name="lname" id="lname" class="form-control form-control-lg" placeholder="Enter Last Name" required>
                <div class="invalid-feedback">Last name is required!</div>
            </div>
        </div>
        <div class="mb-3">
            <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Enter E-mail" required>
            <div class="invalid-feedback">E-mail is required</div>
        </div>

        <div class="mb-3">
            <input type="tel" name="phone" id="phone" class="form-control form-control-lg" placeholder="Enter Phone" required>
            <div class="invalid-feedback">Contact is required</div>
        </div>
        <div class="mb-3">
            <input type="submit" value="Add Teacher" class="btn btn-primary btn-block btn-lg" id="add-teacher-btn">
        </div>
       </form>
      </div>
      
    </div>
  </div>
</div>

            


         
<!--Edit Teacher Modal End->


<div class="container">
    <div class="row mt-4" >
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <div>
                <h4 class="text-primary">All Teacher</h4>
            </div>
            <div class="row mt-2">
        <div class="col-lg-12">
            <input type="text" id="teacher-search" class="form-control" placeholder="Search Teacher">
        </div>
      </div>
            <div>
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addNewTeacherModal">Add Teacher</button>
            </div>
            <div class="row mt-2">
                <div class="col-lg-12">
                <a class="btn btn-primary" href="home.html" role="button">Home</a>
                    
                   
                </div>
            </div>
        </div>
        
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <div id="showAlert"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg 12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>E-mail</th>
                            <th>Contact</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="main.js"></script>
</body>
</html>