<?php
    include_once "databasehandler-include.php";

    if (isset($_GET['id']) && isset($_POST['EditForm'])) {
        $Employee_ID = $_GET['id'];
        $Employee_Name = $_POST['Employee_Name'];
        $Employee_MiddleName = $_POST['Employee_MiddleName'];
        $Employee_LastName = $_POST['Employee_LastName'];
        $Employee_Addres = $_POST['Employee_Addres'];
        $Employee_HouseNumber = $_POST['Employee_HouseNumber'];
        $Employee_PostalCode = $_POST['Employee_PostalCode'];
        $Employee_TownShip = $_POST['Employee_TownShip'];
        $Employee_Email = $_POST['Employee_Email'];
        $Employee_Password= $_POST['Employee_Password'];
        $Employee_PhoneNumber = $_POST['Employee_PhoneNumber'];
        $Employee_DateOfBirth = $_POST['Employee_DateOfBirth'];
        $FlowerShop_ID = $_POST['FlowerShop_ID'];


        $sql = "UPDATE `employees` SET 
        `Employee_Name`='$Employee_Name',
        `Employee_MiddleName`='$Employee_MiddleName',
        `Employee_LastName`='$Employee_LastName',
        `Employee_Addres`='$Employee_Addres',
        `Employee_HouseNumber`='$Employee_HouseNumber',
        `Employee_PostalCode`='$Employee_PostalCode',
        `Employee_TownShip`='$Employee_TownShip',
        `Employee_Email`='$Employee_Email',
        `Employee_Password`='$Employee_Password',
        `Employee_PhoneNumber`='$Employee_PhoneNumber',
        `Employee_DateOfBirth`='$Employee_DateOfBirth',
        `Employee_WorksAt`='$FlowerShop_ID' 
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