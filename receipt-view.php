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

    <title>Receipt View</title>
  </head>
  <body>
    
  <div class="container mt-5">

  
  <div class="row">
        <div class="col-md-6 offset-md-3">
         <div class="card shadow">
            
            <div class="card-header bg-primary text-white">
                <h4>Receipt View Details
                <a href="receipt.php" class="btn btn-danger float-end">BACK</a>
                    
                </h4>
            </div>
                    <div class="card-body">
                    <?php
                        if(isset($_GET['RECEIPT_ID']))
                        {
                            $receipt_id = mysqli_real_escape_string($con, $_GET['RECEIPT_ID']);
                            $query = "SELECT * FROM receipt WHERE RECEIPT_ID='$receipt_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $receipt = mysqli_fetch_array($query_run);
                                ?>
                        
                            <div class="mb-3">
                                <label>RECEIPT_ID</label>
                                <p class="form-control">
                                <?= $receipt['RECEIPT_ID']; ?>
                                </p>
                            </div>
                            
                            <div class="mb-3">
                                <label>PAYMENT DATE</label>
                                <p class="form-control">
                                <?= $receipt['PAYMENT_DATE']; ?>
                            </div>

                            
                            <div class="mb-3">
                                <label>TERM</label>
                                <p class="form-control">
                                <?= $receipt['TERM']; ?>
                            </div>

                            <div class="mb-3">
                                <label>STUDENT NAME</label>
                                <p class="form-control">
                                <?= $receipt['STUDENT_NAME']; ?>
                            </div>

                            <div class="mb-3">
                                <label>AMOUNT(GHC)</label>
                                <p class="form-control">
                                <?= $receipt['AMOUNT']; ?> </p>
                            </div>

                            <div class="mb-3">
                                <label>PAID BY</label>
                                <p class="form-control">
                                <?= $receipt['PAID_BY']; ?> </p>
                            </div>

                            <div class="mb-3">
                                <label>BALANCE(GHC)</label>
                                <p class="form-control">
                                <?= $receipt['BALANCE']; ?> </p>
                            </div>

                            <div class="mb-3">
                                <label>PAYMENT STATUS</label>
                                <p class="form-control">
                                <?= $receipt['PAYMENT_STATUS']; ?> </p>
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