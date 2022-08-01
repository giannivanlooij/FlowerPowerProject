<?php




if (isset($_POST['submit'])) {
   $Product_Image = $_FILES["Product_Image"];
   $Product_Name = ucwords($_POST["Product_Name"]);
   $Product_Description = $_POST["Product_Description"];
   $Product_Price = $_POST["Product_Price"];
   $Product_Stock = $_POST["Product_Stock"];
   
   $Temp_Location = $_FILES["Product_Image"] ["tmp_name"];
   $Target_Location = "../Images/productimages/" . time(). $_FILES["Product_Image"] ["name"];

   


   require_once 'databasehandler-include.php';
   require_once 'functions-include.php';

   
   echo $Product_Name;
   
    

   

   move_uploaded_file($Temp_Location, $Target_Location);

   if (EmptyInputFieldProduct($Product_Name, $Product_Description, $Product_Price, $Product_Stock) !== False) {
    header("location: ../index.php?error=emptyinput");
    Exit();
    }
   

   if (ProductExists($conn, $Product_Name) !== False) {
    header("location: ../index.php?error=productalreadylisted");
    Exit();
   }

   CreateProduct($conn, $Product_Name, $Product_Description, $Product_Price, $Product_Stock, $Target_Location);

}
else {
    header("location: ../dashboard.php?error=nothingposted");
    Exit();
}