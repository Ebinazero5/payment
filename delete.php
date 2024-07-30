<?php

$connection = mysqli_connect("localhost:4306","root","","payment");


$delete = $_GET['del'];


$sql = "delete from payment_info_tbl where id = '$delete'";


if(mysqli_query($connection,$sql))
           {

            echo '<script> location.replace("index.php")</script>';  
           }
           else
           {
           echo "Some thing Error" . $connection->error;

           }

?>