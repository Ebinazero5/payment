<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student crud application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <<div class="card" style="max-width: 1500px;">
  <h5 class="card-header">payments</h5>
  <div class="card-body">

         
            <button class="btn btn-success"><a href="add.php" class="text-light">add new </a>  </button> 
            <button class="btn btn-success"><a href="search.php" class="text-light">search </a>  </button> 
            <br/>
            <br/>

            <table class="table">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">payment_id</th>
                <th scope="col">invoice_date</th>
                <th scope="col">customer_id</th>
                <th scope="col">repl_bill_no</th>
                <th scope="col">from_date</th>
                <th scope="col">to_date</th>
                <th scope="col">payment_gen_date</th>
                <th scope="col">payment_txn_date</th>
                <th scope="col">payment_status</th>
                <th scope="col">billing_address</th>
                <th scope="col">payment_type</th>
                <th scope="col">credit</th>
                <th scope="col">debit</th>
                <th scope="col">txn_amt</th>
                <th scope="col">tax_amt</th>
                <th scope="col">outstanding_amt</th>
                
       
                
                </tr>
            </thead>
            <tbody>
                <?php
                $connection = mysqli_connect("localhost:4306","root","","payment");
                $sql ="select * from payment_info_tbl";
                $run =mysqli_query($connection,$sql);
                $id= 1;
                while($row=mysqli_fetch_array($run)){
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
                 
                    

                
                
                ?>
                <tr>
                
                <td><?php echo $uid ?></td>
                    <td> <?php echo $payment_id ?></td>    
                    <td> <?php echo $invoice_date ?></td>
                    <td> <?php echo $customer_id  ?></td>
                    <td> <?php echo $repl_bill_no ?></td>
                    <td> <?php echo $from_date ?></td>
                    <td> <?php echo $to_date  ?></td>
                    <td> <?php echo $payment_gen_date ?></td>
                    <td> <?php echo  $payment_txn_date ?></td>
                    <td> <?php echo $payment_status ?></td>                                                   
                    <td> <?php echo $billing_address ?></td>
                    <td> <?php echo  $payment_type ?></td>
                    <td> <?php echo $credit ?></td>
                    <td> <?php echo $debit?></td>
                    <td> <?php echo $txn_amt ?></td>
                   
                    
                     
                    <td><button class="btn btn-success"> <a href='edit.php?edit=<?php echo $uid ?>' class="text-light"> Edit </a> </button></td> &nbsp;
                    <td><button class="btn btn-danger"><a href='delete.php?del=<?php echo $uid ?>' class="text-light"> Delete </a> </button></td>
                </tr>
                    <?php } ?>
                    

            </tbody>
        </table>
            
        </div>
        
        </div>

            

        
</body>
</html>