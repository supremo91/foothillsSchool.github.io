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

    <title>Receipt Edit</title>
  </head>
  <body>
    
  <div class="container mt-5">
  <?php include('message.php'); ?>
  <div class="row">
        <div class="col-md-6 offset-md-3">
         <div class="card shadow">
            
            <div class="card-header bg-success text-white">
                <h4>Receipt Edit
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
                        <form action="receipt-db.php" method="POST">

                        <input type="hidden" name="receipt_id" value="<?= $receipt['RECEIPT_ID']; ?>">
                            <div class="mb-3">
                                <label>PAYMENT DATE</label>
                                <input type="date" name="pdate" value="<?= $receipt['PAYMENT_DATE']; ?>" class="form-control" required>
                            </div>

                            
                            

                            <div class="mb-3">
                                <label>TERM</label>
                                <select name="term" class="form-control form-control text-uppercase" required>
                                    <option value="">Select Term</option>
                                    <option value="Term1" <?= isset($receipt['Term']) && $receipt['Term'] === 'Term1' ? 'selected' : ''; ?>>Term1</option>
                                    <option value="Term2" <?= isset($receipt['Term']) && $receipt['Term'] === 'Term2' ? 'selected' : ''; ?>>Term2</option>
                                    <option value="Term3" <?= isset($receipt['Term']) && $receipt['Term'] === 'Term3' ? 'selected' : ''; ?>>Term3</option>
                                </select>
                            </div>

                           
                            <div class="mb-3">
                                <label>STUDENT NAME</label>
                                <input type="text" name="name" value="<?= $receipt['STUDENT_NAME'] =strtoupper($receipt['STUDENT_NAME']); ?>" class="form-control text-uppercase">
                            </div>

                            <div class="mb-3">
                                <label>CLASS</label>
                                <input type="text" name="class" value="<?= $receipt['CLASS'] =strtoupper($receipt['CLASS']); ?>" class="form-control text-uppercase">
                            </div>


                            <div class="mb-3">
                                <label>PAID BY</label>
                                <input type="text" name="paidby" value="<?= $receipt['PAID_BY'] =strtoupper($receipt['PAID_BY']); ?>" class="form-control text-uppercase">
                            </div>

                            
                            <div class="mb-3">
                                <label>AMOUNT (GHC)</label>
                                <input type="number" name="amountpaid" value="<?= $receipt['AMOUNT']; ?>" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label>BALANCE(GHC)</label>
                                <input type="text" name="balance" value="<?= $receipt['BALANCE']; ?>" class="form-control" required>
                            </div>

                           

                            <div class="mb-3">
                            <select name="payment_status" id="Payment_status" class="form-control text-uppercase">

                                <option value="">Select Payment Status</option>

                                <option value="Full Payment" <?= $receipt['PAYMENT_STATUS'] === 'Full Payment' ? 'selected' : ''; ?>>Full Payment</option>
                                <option value="Part Payment" <?= $receipt['PAYMENT_STATUS'] === 'Part Payment' ? 'selected' : ''; ?>>Part Payment</option>
                            </select>
                            </div>




                                
                            
                            <div class="mb-3">
                                <button type="submit" name="update_receipt" class="btn btn-success">Update Receipt</button>
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