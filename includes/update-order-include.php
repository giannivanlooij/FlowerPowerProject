<?php
    include_once "databasehandler-include.php";

    if (isset($_GET['id']) && isset($_POST['EditForm'])) {
        $Employee_ID = $_GET['id'];
        $EmployeeAssigned = $_POST['Employee_ID'];
        $Invoice_OrderPickedUp = $_POST['Invoice_OrderPickedUp'];
        


        $sql = "UPDATE `invoice` SET 
        `Employee_ID`='$EmployeeAssigned',
        `Invoice_OrderPickedUp`='$Invoice_OrderPickedUp'
        WHERE Employee_ID = $Employee_ID";

        if ($conn->query($sql) === TRUE) {
            header("location: ../dashboard.php");
        } else {
            echo "something went wrong";
        }


    }else {
        echo "not from edit page";
    }
?>