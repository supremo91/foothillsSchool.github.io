<?php
require 'fetch_dashboard_data.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
    <style>
        /* Custom CSS for frame content */
        .frame-content {
            text-align: center;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="assests/Foothills logo.jpeg" width="50" height="50" class="d-inline-block align-top" alt="Your Logo">
                DASHBOARD                       
                    </div>
                       <div class="col-md-6 text-end">
                       <!--a href="receipt.php" class="btn btn-success btn-sm">FEES</a-->
                        <a href="student.php" class="btn btn-secondary btn-sm">Students Details</a>
                        <a href="home.html" class="btn btn-info btn-sm">Click To Home</a>
                </div>
            </a>
        </div>
</nav>

   
<!-- HTML code -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Students Admitted</h5>
                    <p class="card-text frame-content"><?php echo $studentCount; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Teachers</h5>
                    <p class="card-text frame-content"><?php echo $teacherCount; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daily Fees Paid</h5>
                    <p class="card-text frame-content">GHC<?php echo $dailyTotalFees; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Overall Fees Paid</h5>
                    <p class="card-text frame-content">GHC<?php echo $totalFees; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

   

    <!-- Include Bootstrap JS (Optional) -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="dashboard.js"></script>
</body>
</html>
