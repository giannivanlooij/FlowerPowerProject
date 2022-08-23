<?php
include_once "databasehandler-include.php";

if (isset($_GET['id'])) {
    $Customer_ID = $_GET['id'];
    $DeleteQuery="DELETE FROM customers WHERE Customer_ID=$Customer_ID;";
    $Delete =  mysqli_query($conn, $DeleteQuery);

    if ($Delete) {
        echo "deleted";
        header("location: ../pages/customers.php?Deleted");
        Exit();
    }else{
        die(mysqli_error($conn));
    }
}

?>