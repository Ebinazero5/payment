<?php

$connection = mysqli_connect("localhost:4306","root","","dbcrud");

$edit = $_GET['edit'];

$sql = "select * from student where id = '$edit'";

$run = mysqli_query($connection,$sql);


while($row=mysqli_fetch_array($run))
{
        $uid = $row['id'];
          $payment_id= $row['payment_id'];
          $invoice_date = $row['invoice_date'];
          $customer_id = $row['customer_id'];
          $repl_bill_no = $row['repl_bill_no'];
          $from_date = $row['from_date'];
          $to_date = $row['to_date'];
          $payment_gen_date = $row['payment_gen_date'];
          $payment_txn_date = $row['payment_txn_date'];
          $payment_status = $row['payment_status'];
          $billing_address= $row['billing_address'];
          $payment_type = $row['payment_type'];
          $credit = $row['credit'];
          $debit = $row['debit'];
          $txn_amt = $row['txn_amt'];

}

?>

<?php
   $connection = mysqli_connect("localhost:4306","root","","payment");

    


    if(isset($_POST['submit']))
        {
          $edit = $_GET['edit']; 
          $uid= $_POST['id'];
            $payment_id= $_POST['payment_id'];
            $invoice_date = $_POST['invoice_date'];
            $customer_id = $_POST['customer_id'];
            $repl_bill_no = $_POST['repl_bill_no'];
            $from_date = $_POST['from_date'];
            $to_date = $_POST['to_date'];
            $payment_gen_date = $_POST['payment_gen_date'];
            $payment_txn_date = $_POST['payment_txn_date'];
            $payment_status = $_POST['payment_status'];
            $billing_address= $_POST['billing_address'];
            $payment_type = $_POST['payment_type'];
            $credit = $_POST['credit'];
            $debit = $_POST['debit'];
            $txn_amt = $_POST['txn_amt'];
            
 
          
            

           $sql = "UPDATE payment_info_tbl SET 
           payment_id = '$payment_id',
           invoice_date = '$invoice_date',
           customer_id = '$customer_id',
           repl_bill_no = '$repl_bill_no',
           from_date = '$from_date',
           to_date = '$to_date',
           payment_gen_date = '$payment_gen_date',
           payment_txn_date = '$payment_txn_date',
           payment_status = '$payment_status',
           billing_address = '$billing_address',
           payment_type = '$payment_type',
           credit = '$credit',
           debit = '$debit',
           txn_amt = '$txn_amt'
         WHERE id = '$edit'";
         
         

           if(mysqli_query($connection,$sql))
           {

            echo '<script> location.replace("index.php")</script>';  
           }
           else
           {
           echo "Some thing Error" . $connection->error;

           }

        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Crud Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

        <div class="container">
            <div class="row">
                 <div class="col-md-9">
                    <div class="card">
                    <div class="card-header">
                        <h1> Student Crud Application </h1>
                    </div>
                    <div class="card-body">

                    <form action="add.php" method="post">
                    <div class="form-group">
        <label for="customer_id">Customer ID</label>
        <input type="text" name="customer_id" class="form-control" placeholder="Enter customer ID">
        </div>  

            <div class="form-group">
                <label >payment_id</label>
                <input type="text" name="payment_id" class="form-control"  placeholder="payment_id">
            </div>

            <div class="form-group">
                <label >invoice_date</label>
                <input type="text" name="invoice_date" class="form-control"  placeholder="invoice_date">
            </div>

            <div class="form-group">
                <label >customer_id</label>
                <input type="text" name="customer_id" class="form-control"  placeholder="customer_id">
            </div>

            <div class="form-group">
                <label >from_date</label>
                <input type="text" name="from_date" class="form-control"  placeholder="from_date">
            </div>

            <div class="form-group">
                <label >to_date</label>
                <input type="text" name="to_date" class="form-control"  placeholder="to_date">
            </div>

            <div class="form-group">
                <label >payment_gen_date</label>
                <input type="text" name="payment_gen_date" class="form-control"  placeholder="payment_gen_date">
            </div>

            <div class="form-group">
                <label >payment_txn_date</label>
                <input type="text" name="payment_txn_date" class="form-control"  placeholder="payment_txn_date">
            </div>

            <div class="form-group">
                <label >payment_status</label>
                <input type="text" name="payment_status" class="form-control"  placeholder="payment_status">
            </div>

            <div class="form-group">
                <label >billing_address</label>
                <input type="text" name="billing_address" class="form-control"  placeholder="billing_address">
            </div>

            <div class="form-group">
                <label >payment_type</label>
                <input type="text" name="payment_type" class="form-control"  placeholder="payment_type">
            </div>

            <div class="form-group">
                <label >credit</label>
                <input type="text" name="credit" class="form-control"  placeholder="credit">
            </div>

            <div class="form-group">
                <label >debit</label>
                <input type="text" name="debit" class="form-control"  placeholder="debit">
            </div>

            <div class="form-group">
                <label >txn_amt</label>
                <input type="text" name="txn_amt" class="form-control"  placeholder="txn_amt">
            </div>
                        <br/>
                        <input type="submit" class="btn btn-primary" name="submit" value="Edit">
                        </form>
                    </div>
                    </div>

                </div>
            
            </div>
        </div>

</body>
</html>