<?php
    include_once "databasehandler-include.php";

    if (isset($_GET['id']) && isset($_POST['EditForm'])) {
        $Product_ID = $_GET['id'];
        $Product_Name = $_POST['Product_Name'];
        $Product_Description = $_POST['Product_Description'];
        $Product_Price = $_POST['Product_Price'];
        $Product_Stock = $_POST['Product_Stock'];
        $Product_Image = $_FILES["Product_Image"];

        
        
        if (!empty($Product_Image)) {
            $Product_Image = $_FILES["Product_Image"];
            $Temp_Location = $_FILES["Product_Image"] ["tmp_name"];
            $Target_Location = "../Images/productimages/" . time(). $_FILES["Product_Image"] ["name"];

            move_uploaded_file($Temp_Location, $Target_Location);
            
        } else {
            echo "no picture set";
        }




        
        


        $sql = "UPDATE `products` SET 
        `Product_Name`='$Product_Name',
        `Product_Description`='$Product_Description',
        `Product_Price`='$Product_Price',
        `Product_Stock`='$Product_Stock',
        `Product_ImgLocation`='$Target_Location'
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