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
    <!-- Add this in the head section of your HTML -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
         th {
            font-size: 13px;
            text-align: center;
            font-weight: bold;
            color: #00ff;
        }


            td {
            font-size: 13px; 
            text-align: center; 
            font-weight: bold;
        }

        
        

    </style>
  </head>
  <body>
  <div class="container-fluid mt-4">

<?php include('message.php'); ?>


<div class="row">
    <div class="col-md-12">
     <!--div class="card shadow"-->

        <!--div class="card"-->
            <div class="card-header bg-success text-white">
            
                <h4>Payment Details | Total Students Paid : <?php echo $receiptCount; ?> </h4>
            <div class="row">
                <div class="col-md-6">
                    <!-- HTML form with a single input field for all search criteria -->
             <input type="text" id="receipt-search" class="form-control" placeholder="Search by Student Name, Term, or Payment Date">
<!--             
                  <input type="text" id="searchDate" placeholder="Enter date (YYYY-MM-DD)">
                  <p id="dailyTotalFees">Total Fees for the Day: <span id="totalFees">0</span></p> -->

                </div>
                    <div class="col-md-6 text-end">
                       <!--button class="btn btn-dark btn-sm" onclick="GetPrintPayment()" >Print</button-->
                       <!--a href="dashboard.php" class="btn btn-primary btn-sm">Dashboard</a-->
                       <!--a href="student.php" class="btn btn-primary btn-sm">Enrollment</a-->
                        <a href="receipt-create.php" class="btn btn-primary btn-sm"> Add Payment</a>
                        <a href="admin/dashboard.php" class="btn btn-secondary btn-sm">Dashboard</a>
                        <a href="home.html" class="btn btn-info btn-sm">Home</a>
                    </div>
        

                <div class="row">
                 <div class="col-sm-6">
                        <?php if ($dailyTotalFees > 0): ?>
                            <h4>Total Fees Paid Today ( <?php echo date('l'); ?> ) GHC <?php echo $dailyTotalFees; ?> </h4>
                        <?php else: ?>
                            <h4>No record for today</h4>
                        <?php endif; ?>
                 </div>

               

                <div class="col-sm-5">
                    <?php if ($totalFees > 0): ?>
                    <h4>Total Fees For The Term GHC <?php echo $totalFees; ?> </h4>
                    <?php else: ?>
                    <h4>No record for total Fees</h4>
                    <?php endif; ?>
                </div>

            </div>
        </div>
        </div>     
       
            <!--div class="card-body"-->
           

            <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th>RECEIPT_ID</th>
                            <th>PAYMENT DATE</th>
                            <th>TERM</th>
                            <th>STUDENT NAME</th>
                            <th>CLASS</th>
                            <th>PAID BY</th>
                            <th>AMOUNT PAID (GHC)</th>
                            <th>BALANCE (GHC)</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody id="table-body-placeholder">
                        <?php 

                   



                         $query =  "SELECT * FROM receipt ORDER BY PAYMENT_DATE DESC, RECEIPT_ID DESC";
                        // $query = "SELECT *
                        // FROM receipt
                        // ORDER BY PAYMENT_DATE DESC, TIMEDIFF(CURRENT_TIMESTAMP, PAYMENT_DATE) DESC;
                        // ";
                        
                        

                            // $query = "SELECT * FROM receipt";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $receipt)
                                {
                                    ?>
                                    <tr>
                                    
                                        <td><?= $receipt['RECEIPT_ID']; ?></td>
                                        <td><?= $receipt['PAYMENT_DATE']; ?></td>
                                        <td><?= $receipt['TERM'] = strtoupper($receipt['TERM']); ?></td>
                                        <td><?= $receipt['STUDENT_NAME'] = strtoupper($receipt['STUDENT_NAME']); ?></td>
                                        <td><?= $receipt['CLASS'] = strtoupper($receipt['CLASS']); ?></td>
                                        <td><?= $receipt['PAID_BY'] = strtoupper($receipt['PAID_BY']); ?></td>
                                        <td><?= $receipt['AMOUNT']; ?></td>
                                        <td><?= $receipt['BALANCE']; ?></td>

                            
                                        <td>
                                        <a href="printreceipt.php?RECEIPT_ID=<?= $receipt['RECEIPT_ID']; ?>"
                                                        class="btn btn-dark btn-sm print-btn" target="_blank">Print</a>
                                                        

                                            <!--a href="javascript:void(0);" onclick="printReceipt(<!?= $receipt['RECEIPT_ID']; ?>);" class="btn btn-dark btn-sm">Print</a-->
                                            <!--a href="receipt-view.php?RECEIPT_ID=<!?= $receipt['RECEIPT_ID']; ?>" class="btn btn-info btn-sm">View</a-->
                                            <a href="receipt-edit.php?RECEIPT_ID=<?= $receipt['RECEIPT_ID']; ?>" class="btn btn-success btn-sm">Edit</a>
                                            <form action="receipt-db.php" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this receipt?');">
                                                <button type="submit" name="delete_receipt" value="<?=$receipt['RECEIPT_ID'];?>" class="btn btn-danger btn-sm">Delete</button>
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
        <!--/div-->
        </div>
    </div>
</div>
</div>
    


  
       
     
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="index.js"></script>
<script src="print.js"></script>
<script src="dashboard.js"></script> 

  </body>
</html>