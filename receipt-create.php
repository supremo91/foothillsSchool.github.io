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

    <title>Creating Receipt</title>
  </head>
  <body>
    
  <div class="container mt-5">
  <?php include('message.php'); ?>
  

    <div class="row">
        <div class="col-md-6 offset-md-3">

            <div class="card-header bg-success text-white">
                <h4>Payment Receipt
                <a href="receipt.php" class="btn btn-danger float-end">BACK</a>
                    
                
                </h4>
            </div>
                    <div class="card-body">
                        <form action="receipt-db.php" method="POST">

                            <div class="mb-3">
                                <label>PAYMENT DATE</label>
                                <input type="date" name="pdate" class="form-control" required>
                            </div>


                            <div class="mb-3">
                            <select name="term" id="term" class="form-control text-uppercase" required>
                                <option value="">Select Term</option>
                                <option id="classInput" value="Term1">Term1</option>
                                <option id="classInput" value="Term2">Term2</option>
                                <option id="classInput" value="Term3">Term3</option>
                            </select>
                            </div>

                            

                            <div class="mb-3">
                                <label>STUDENT NAME</label>
                                <input type="text" name="name" class="form-control text-uppercase" Required>
                            </div>

                            <div class="mb-3">
                            <label>CLASS</label>
                            <select name="class" id="class" class="form-control text-uppercase " required>
                                <option value="">Select Class</option>
                                <option id="classInput" value="NURSERY 1">NURSERY 1</option>
                                <option id="classInput" value="NURSERY 2">NURSERY 2</option>
                                <option id="classInput" value="KG 1">KG 1</option>
                                <option id="classInput" value="KG 2">KG 2</option>
                                <option id="classInput" value="BASIC 1">BASIC 1</option>
                                <option id="classInput" value="BASIC 2">BASIC 2</option>
                                <option id="classInput" value="BASIC 3">BASIC 3</option>
                                <option id="classInput" value="BASIC 4">BASIC 4</option>
                            </select>


                                <label>CLASS</label>
                                <input type="text" name="class" class="form-control text-uppercase" Required placeholder="Eg. Nursery 1">
                            </div>


                            <div class="mb-3">
                                <label>PAID BY</label>
                                <input type="text" name="paidby" class="form-control text-uppercase" Required placeholder="Eg. James Appiah">
                            </div>

                            <div class="mb-3">
                                <label>AMOUNT PAID (GHC)</label>
                                <input type="number" name="amountpaid" class="form-control" required>
                            </div>

                            
                            <div class="mb-3">
                                <label>BALANCE (GHC)</label>
                                <input type="number" name="balance" class="form-control" required>
                            </div>

                            <div class="mb-3">
                            <label>PAYMENT STATUS</label>
                            <select name="full_payment" id="fullPayment" class="form-control text-uppercase " required>
                            <option id="classInput" value="">Select Payment Status </option>    
                            <option id="classInput" value="Full Payment">Full Payment</option>
                            <option id="classInput" value="Part Payment">Part Payment</option>
                            </select>
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_receipt" class="btn btn-success">Save Receipt</button>
                            </div>

                         </form>
                </div>
             </div>
         </div>
     </div>
     <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>




