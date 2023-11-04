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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <script src="js/jquery-3.6.2.min.js"></script> -->

</head>

<body>
    <div class="container mt-4">

        <?php include('message.php'); ?>


        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">

                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <h4>Payment Details</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" id="receipt-search" class="form-control"
                                        placeholder="Search by Name">
                                </div>
                                <div class="col-md-6 text-end">
                                    <a href="receipt-create.php" class="btn btn-primary">Add New Payment</a>
                                    <a href="home.html" class="btn btn-secondary btn-sm">Click To Home</a>
                                </div>
                            </div>
                        </div>


                        <!-- <a href="receipt-create.php" class="btn btn-secondary float-end">Add Payment</a>
                    <a href="home.html" class="btn btn-info btn-sm">Click To Home</a> -->


                        <div class="card-body">

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>RECEIPT_ID</th>
                                        <th>PAYMENT DATE</th>
                                        <th>STUDENT NAME</th>
                                        <th>AMOUNT PAID (GHC)</th>
                                        <th>PAID BY</th>
                                        <th>BALANCE (GHC)</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM receipt";
                                    $query_run = mysqli_query($con, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $receipt) {
                                            ?>
                                            <tr>

                                                <td>
                                                    <?= $receipt['RECEIPT_ID']; ?>
                                                </td>
                                                <td>
                                                    <?= $receipt['PAYMENT_DATE']; ?>
                                                </td>
                                                <td>
                                                    <?= $receipt['STUDENT_NAME']; ?>
                                                </td>
                                                <td>
                                                    <?= $receipt['AMOUNT']; ?>
                                                </td>
                                                <td>
                                                    <?= $receipt['PAID_BY']; ?>
                                                </td>
                                                <td>
                                                    <?= $receipt['BALANCE']; ?>
                                                </td>
                                                <td>
                                                    <a href="printreceipt.php?RECEIPT_ID=<?= $receipt['RECEIPT_ID']; ?> "
                                                        class="btn btn-dark btn-sm print-btn">Print</a>
                                                    <!--a href="receipt-view.php?RECEIPT_ID=<?= $receipt['RECEIPT_ID']; ?>" class="btn btn-info btn-sm">View</a-->
                                                    <a href="receipt-edit.php?RECEIPT_ID=<?= $receipt['RECEIPT_ID']; ?>"
                                                        class="btn btn-success btn-sm">Edit</a>
                                                    <form action="receipt-db.php" method="POST" class="d-inline"
                                                        onsubmit="return confirm('Are you sure you want to delete this receipt?');">
                                                        <button type="submit" name="delete_receipt"
                                                            value="<?= $receipt['RECEIPT_ID']; ?>"
                                                            class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                    ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="index.js"></script>
    <script>
         $(".print-btn").click(function(){
                alert("print button was clicked");
            
            })
        $(document).ready(function(){
           
        })
    </script>
</body>

</html>