<?php
    include_once "databasehandler-include.php";

    if (isset($_GET['id']) && isset($_POST['EditForm'])) {
        $FlowerShop_ID = $_GET['id'];
        $FlowerShop_Addres = $_POST['FlowerShop_Addres'];
        $FlowerShop_HouseNumber = $_POST['FlowerShop_HouseNumber'];
        $FlowerShop_PostalCode = $_POST['FlowerShop_PostalCode'];
        $FlowerShop_TownShip = $_POST['FlowerShop_TownShip'];
        $FlowerShop_PhoneNumber = $_POST['FlowerShop_PhoneNumber'];
        $FlowerShop_Email = $_POST['FlowerShop_Email'];


        $sql = "UPDATE `FlowerShops` SET 
        `FlowerShop_Addres`='$FlowerShop_Addres',
        `FlowerShop_HouseNumber`='$FlowerShop_HouseNumber',
        `FlowerShop_PostalCode`='$FlowerShop_PostalCode',
        `FlowerShop_TownShip`='$FlowerShop_TownShip',
        `FlowerShop_PhoneNumber`='$FlowerShop_PhoneNumber',
        `FlowerShop_Email`='$FlowerShop_Email'
        WHERE FlowerShop_ID = $FlowerShop_ID";

        if ($conn->query($sql) === TRUE) {
            header("location: ../dashboard.php");
        } else {
            echo "something went wrong";
        }


    }else {
        echo "not from edit page";
    }
?>