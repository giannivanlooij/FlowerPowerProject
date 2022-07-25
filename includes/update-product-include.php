<?php
    include_once "databasehandler-include.php";

    if (isset($_GET['id']) && isset($_POST['EditForm'])) {
        $Product_ID = $_GET['id'];
        $Product_Name = $_POST['Product_Name'];
        $Product_Description = $_POST['Product_Description'];
        $Product_Price = $_POST['Product_Price'];
        $Product_Stock = $_POST['Product_Stock'];
        $Product_ImgLocation = $_POST['Product_ImgLocation'];
        


        $sql = "UPDATE `products` SET 
        `Product_Name`='$Product_Name',
        `Product_Description`='$Product_Description',
        `Product_Price`='$Product_Price',
        `Product_Stock`='$Product_Stock',
        `Product_ImgLocation`='$Product_ImgLocation'
        WHERE Product_ID = $Product_ID";

        if ($conn->query($sql) === TRUE) {
            echo "Update query successfull";
        } else {
            echo "something went wrong";
        }


    }else {
        echo "not from edit page";
    }
?>