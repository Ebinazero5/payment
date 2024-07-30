<?php

$connection = mysqli_connect("localhost:4306","root","","payment"); 
if(isset($_POST['submit']))
        {
            
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
            



    $sql = "insert into payment_info_tbl(id,payment_id,invoice_date,customer_id,repl_bill_no,from_date,to_date,payment_gen_date
    ,payment_txn_date,payment_status,billing_address,payment_type,credit,debit,txn_amt)values(' $uid',' $payment_id',' $invoice_date','$customer_id','$repl_bill_no ','$from_date',
    ' $to_date','$payment_gen_date','$payment_txn_date','$payment_status','$billing_address','$payment_type','$credit','$debit','$txn_amt')";

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student crud application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
        <div class="col-md-9">
        <div class="card">
  
        <div class="card-header">
            <h1>Student crud application</h1>
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




            <?php 
            require 'update.php';
            ?>

            <div class="form-group">
                <label >txn_amt</label>
                <input type="text" name="txn_amt" class="form-control"  placeholder="txn_amt">
            </div>

            
            <br/>
            <input type="submit" class="btn btn-primary" name="submit" value="Register">
        </form>
            
            
        </div>
        
        </div>

            </div>

        </div>

    </div>
</body>
</html>