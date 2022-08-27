<?php
    include_once "databasehandler-include.php";

    if (isset($_GET['id']) && isset($_POST['EditForm'])) {
        $Invoice_ID = $_GET['id'];
        $EmployeeAssigned = $_POST['Employee_ID'];
        $Invoice_OrderPickedUpAdress = $_POST['FlowerShop_ID'];
        $Invoice_OrderPickedUp = $_POST['Invoice_OrderPickedUp'];
        


        $sql = "UPDATE `invoices` SET 
        `Employee_ID`='$EmployeeAssigned',
        `FlowerShop_ID`='$Invoice_OrderPickedUpAdress',
        `Invoice_OrderPickedUp`='$Invoice_OrderPickedUp'
        WHERE Invoice_ID = $Invoice_ID";

        if ($conn->query($sql) === TRUE) {
            header("location: ../dashboard.php");
        } else {
            echo "something went wrong";
        }


    }else {
        echo "not from edit page";
    }
?>