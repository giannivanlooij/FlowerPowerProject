<?php
    include_once "databasehandler-include.php";

    if (isset($_GET['id']) && isset($_POST['EditForm'])) {
        $Customer_ID = $_GET['id'];
        $Customer_Name = $_POST['Customer_Name'];
        $Customer_MiddleName = $_POST['Customer_MiddleName'];
        $Customer_LastName = $_POST['Customer_LastName'];
        $Customer_Addres = $_POST['Customer_Addres'];
        $Customer_HouseNumber = $_POST['Customer_HouseNumber'];
        $Customer_PostalCode = $_POST['Customer_PostalCode'];
        $Customer_TownShip = $_POST['Customer_TownShip'];
        $Customer_Email = $_POST['Customer_Email'];
        $Customer_Password= $_POST['Customer_Password'];
        $Customer_PhoneNumber = $_POST['Customer_PhoneNumber'];
        $Customer_DateOfBirth = $_POST['Customer_DateOfBirth'];


        $sql = "UPDATE `customers` SET 
        `Customer_Name`='$Customer_Name',
        `Customer_MiddleName`='$Customer_MiddleName',
        `Customer_LastName`='$Customer_LastName',
        `Customer_Addres`='$Customer_Addres',
        `Customer_HouseNumber`='$Customer_HouseNumber',
        `Customer_PostalCode`='$Customer_PostalCode',
        `Customer_TownShip`='$Customer_TownShip',
        `Customer_Email`='$Customer_Email',
        `Customer_Password`='$Customer_Password',
        `Customer_PhoneNumber`='$Customer_PhoneNumber',
        `Customer_DateOfBirth`='$Customer_DateOfBirth' 
        WHERE Customer_ID = $Customer_ID";

        if ($conn->query($sql) === TRUE) {
            echo "Update query successfull";
        } else {
            echo "something went wrong";
        }


    }else {
        echo "not from edit page";
    }
?>