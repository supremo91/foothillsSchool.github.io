<?php
    session_start();
    require '../connection.php';
    require '../fetch_dashboard_data.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <title>Foothills International School</title>
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
  </style>
  
  </head>
  <body>
    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#sidebar"
          aria-controls="offcanvasExample">
          <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold"
          href="#">FOOTHILLS IN'T SCHOOL</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#topNavBar"
          aria-controls="topNavBar"
          aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        </div>
      </div>
    </nav>
    <!-- top navigation bar -->
    <!-- offcanvas -->
    <div
      class="offcanvas offcanvas-start sidebar-nav bg-dark"
      tabindex="-1" id="sidebar">
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav">
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3">
                CORE
              </div>
            </li>
            <li>
              <a href="../home.html" class="nav-link px-3 active">
                <span class="me-2"><i class="bi bi-house-door"></i></span>
                <span> <button type="button" class="btn btn-primary">Click To Home </button></span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Interface
              </div>
            </li>
            <li>
               <a href="staff_details.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-book-fill"></i></span>
                <span class="text-white">Staff Details</span>
              </a>
              
            </li>
            <li>
              <a href="../student.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-book-fill"></i></span>
                <span class="text-white">Students Details</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Addons
              </div>
            </li>
           
            <li>
              <a href="../receipt.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-table"></i></span>
                <span class="text-white">Payment Details</span>
              </a>
            </li>
            <li>
              <a href="#fullPayment" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-table"></i></span>
                <span>FULL PAYMENT</span>
              </a>

              <a href="#Partpayment" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-table"></i></span>
                <span>PART PAYMENT</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- offcanvas -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h4>Dashboard</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <div class="card bg-secondary text-white h-100">
            <div class="card-body py-5 text-center">
               <h4><?php echo $teacherCount; ?></h4>
            </div>
            <div class="card-footer d-flex">
              Total Number of Staff
                <span class="ms-auto">
                <i class="bi bi-chevron-right"></i>
                 </span>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card bg-primary text-white h-100">
            
              <div class="card-body py-5 text-center"><h4 ><?php echo $studentCount; ?></h4></div>
              <div class="card-footer d-flex">
              Total Student Addmitted
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card bg-success text-white h-100">
              <div class="card-body py-5">
              <?php if ($dailyTotalFees > 0): ?>
                <h4> GHC <?php echo $dailyTotalFees; ?> </h4>
                <?php else: ?>
                  <h4>No record for today</h4>
                <?php endif; ?>
              </div>
              <div class="card-footer d-flex">
              Total Fees Paid Today  <?php echo date('l'); ?> 
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card bg-danger text-white h-100">
              <div class="card-body py-5">
              <?php if ($totalFees > 0): ?>
                    <h4> GHC <?php echo $totalFees; ?> </h4>
                    <?php else: ?>
                    <h4>No record for total Fees</h4>
                    <?php endif; ?>
              </div>
              <div class="card-footer d-flex">
                Total Fees Paid for the Term
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>
        </div>


        <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card bg-info text-white h-100">
            
              <div class="card-body py-5 text-center"><h4 ><?php echo $teachingCount; ?></h4></div>
              <div class="card-footer d-flex">
              Teaching Staff
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card bg-warning text-white h-100">
            
              <div class="card-body py-5 text-center"><h4 ><?php echo $non_teachingCount; ?></h4></div>
              <div class="card-footer d-flex">
              Non Teaching Staff
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card bg-dark text-white h-100">
            
              <div class="card-body py-5 text-center"><h4 ><?php echo $maleCount; ?></h4></div>
              <div class="card-footer d-flex">
              Total Male Students Addmitted
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card bg-primary text-white h-100">
            
              <div class="card-body py-5 text-center"><h4 ><?php echo $femaleCount; ?></h4></div>
              <div class="card-footer d-flex">
              Total Female Students Addmitted
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>
        </div>

        <!--====================pagination Start====================-->
        <div class="row">
          <div class="col-md-12 mb-3">
            <div class="card"   id="fullPayment">
              <div class="card-header bg-success text-white">
                <span><i class="bi bi-table me-2"></i></span> STUDENTS WITH FULL PAYMENT
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <table id="example" class="table table-striped data-table" style="width: 100%">
                <thead>
                    <tr>
                    
                    <th>RECEIPT ID</th>
                    <th>PAYMENT DATE</th>
                    <th>TERM</th>
                    <th>STUDENT NAME</th>
                    <th>AMOUNT PAID (GHC)</th>
                    
                    <!--th>BALANCE (GHC)</th-->
                    <th>PAYMENT STATUS</th>
                   
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require '../connection.php'; 
                    $sql ="SELECT * FROM receipt WHERE PAYMENT_STATUS = 'Full Payment'";
                    $res=$con->query($sql);
                    while($row=$res->fetch_assoc()){
                    ?>
                    <tr>
                        <td> <?= $row['RECEIPT_ID']?> </td>
                        <td> <?= $row['PAYMENT_DATE']?> </td>
                        <td> <?= $row['TERM']?> </td>
                        <td> <?= $row['STUDENT_NAME']?> </td>
                        <td> <?= $row['AMOUNT']?> </td>
                        <td> <?= $row['PAYMENT_STATUS']?> </td>
                        <!--td> <!?= $row['PAID_BY']?> </td>
                        <td> <!?= $row['BALANCE']?> </td-->
                        
                    </tr>
                    <?php }?>
                </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
        </div>


        <!--====================pagination Start====================-->
        <div class="row" >
          <div class="col-md-12 mb-3">
            <div class="card">
              <div class="card-header bg-success text-white">
                <span><i class="bi bi-table me-2"></i></span> STUDENTS WITH PART PAYMENT
              </div>
              <div class="card-body">
                <div class="table-responsive">
                <table id="example" class="table table-striped data-table" style="width: 100%">
                <thead>
                    <tr>
                    <th>RECEIPT ID</th>
                    <th>PAYMENT DATE</th>
                    <th>TERM</th>
                    <th>STUDENT NAME</th>
                    <th>AMOUNT PAID (GHC)</th>
                    
                    <!--th>BALANCE (GHC)</th-->
                    <th>PAYMENT STATUS</th>
                   
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require '../connection.php'; 
                    $sql ="SELECT * FROM receipt WHERE PAYMENT_STATUS = 'Part Payment'";
                    $res=$con->query($sql);
                    while($row=$res->fetch_assoc()){
                    ?>
                    <tr id="Partpayment">
                        <td> <?= $row['RECEIPT_ID']?> </td>
                        <td> <?= $row['PAYMENT_DATE']?> </td>
                        <td> <?= $row['TERM']?> </td>
                        <td> <?= $row['STUDENT_NAME']?> </td>
                        <td> <?= $row['AMOUNT']?> </td>
                        <td> <?= $row['PAYMENT_STATUS']?> </td>


                        <!--td> <!?= $row['PAID_BY']?> </td>
                        <td> <!?= $row['BALANCE']?> </td-->
                        
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
    
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script> 
  
     <script src="../dashboard.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
   
    <script src="./js/script.js"></script>
  </body>
</html>
