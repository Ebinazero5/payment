<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">

                <table class="table">
                    <tbody>


                        <?php
                        require 'db.php';

                        $search_term = isset($_POST['search']) ? $_POST['search'] : '';

                        $query = "
                            SELECT 
                                    id,
                                    payment_id,
                                    invoice_date,
                                    customer_id,
                                    repl_bill_no,
                                    from_date,
                                    to_date,
                                    payment_gen_date,
                                    payment_txn_date,
                                    payment_status,
                                    billing_address,
                                    payment_type,
                                    credit,
                                    debit,
                                    txn_amt,
                                    tax_amt,
                                    outstanding_amt
                                FROM 
                                    payment_info_tbl
                                WHERE 
                                    id LIKE '%$search_term%' OR
                                    billing_address LIKE '%$search_term%' OR
                                    payment_type LIKE '%$search_term%'";

                        $result = $mysqli->query($query);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "ID: " . $row['id'] . "<br>";
                                echo "Payment ID: " . $row['payment_id'] . "<br>";
                                echo "Invoice Date: " . $row['invoice_date'] . "<br>";
                                echo "Customer ID: " . $row['customer_id'] . "<br>";
                                echo "Repl Bill No: " . $row['repl_bill_no'] . "<br>";
                                echo "From Date: " . $row['from_date'] . "<br>";
                                echo "To Date: " . $row['to_date'] . "<br>";
                                echo "Payment Gen Date: " . $row['payment_gen_date'] . "<br>";
                                echo "Payment Txn Date: " . $row['payment_txn_date'] . "<br>";
                                echo "Payment Status: " . $row['payment_status'] . "<br>";
                                echo "Billing Address: " . $row['billing_address'] . "<br>";
                                echo "Payment Type: " . $row['payment_type'] . "<br>";
                                echo "Credit: " . $row['credit'] . "<br>";
                                echo "Debit: " . $row['debit'] . "<br>";
                                echo "Transaction Amount: " . $row['txn_amt'] . "<br>";
                                echo "Tax Amount: " . $row['tax_amt'] . "<br>";
                                echo "Outstanding Amount: " . $row['outstanding_amt'] . "<br>";
                                echo "<br>";
                            }
                        } else {
                            echo "No results found.";
                        }

                        $mysqli->close();
                        ?>



                        <form method="post" action="search.php">
                            <input type="text" name="search" placeholder="Enter customer name" class="form-control">
                            <br>
                            <input type="submit" value="Search" class="btn btn-success">
                        </form>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>   
</body>
</html>