<?php

// Database connection
$connection = mysqli_connect("localhost:4306","root","","payment");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $payment_type = $_POST['payment_type'];
    $credit = isset($_POST['credit']) ? $_POST['credit'] : 0;
    $debit = isset($_POST['debit']) ? $_POST['debit'] : 0;
    $id = $_POST['id'];

    // Determine which field to update based on the selected payment type
    $update_field = ($payment_type === 'credit') ? 'credit' : 'debit';
    $update_value = ($payment_type === 'credit') ? $credit : $debit;

    // Prepare the UPDATE query
    $query = "UPDATE payment_info_tbl SET $update_field = ? WHERE id = ?";
    
    if ($stmt = mysqli_prepare($connection, $query)) {
        mysqli_stmt_bind_param($stmt, "di", $update_value, $id);
        
        if (mysqli_stmt_execute($stmt)) {
            echo '<script>alert("Record updated successfully."); window.location.href = "index.php";</script>';
        } else {
            echo "Error: " . mysqli_error($connection);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Payment Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
                        <form action="update.php" method="post">
                            <div class="form-group">
                                <label for="payment_type">Payment Type</label>
                                <select name="payment_type" id="payment_type" class="form-control" required>
                                    <option value="credit">Credit</option>
                                    <option value="debit">Debit</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="credit">Credit Amount</label>
                                <input type="text" name="credit" id="credit" class="form-control" placeholder="Enter Credit Amount">
                            </div>
                            <div class="form-group">
                                <label for="debit">Debit Amount</label>
                                <input type="text" name="debit" id="debit" class="form-control" placeholder="Enter Debit Amount">
                            </div>
                            <div class="form-group">
                                <label for="id">ID</label>
                                <input type="text" name="id" id="id" class="form-control" placeholder="Enter ID to Update" required>
                            </div>
                            <input type="submit" class="btn btn-primary" name="submit" value="Update">
                        </form>
                    
</body>
</html>
