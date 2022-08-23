<?php
include_once "databasehandler-include.php";

if (isset($_GET['id'])) {
    $ID = $_GET['id'];
    $DeleteQuery="DELETE FROM flowershops WHERE FlowerShop_ID=$ID;";
    $Delete =  mysqli_query($conn, $DeleteQuery);

    if ($Delete) {
        echo "deleted";
        header("location: ../pages/shops/shops.php?Deleted");
        Exit();
    }else{
        die(mysqli_error($conn));
    }
}

?>