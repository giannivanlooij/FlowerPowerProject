<?php

if (isset($_POST['submit'])) {
   $Product_Name = $_POST["Product_Name"];
   $Product_Description = $_POST["Product_Description"];
   $Product_Price = $_POST["Product_Price"];
   $Product_Stock = $_POST["Product_Stock"];
   

   require_once 'databasehandler-include.php';
   require_once 'functions-include.php';

   if (EmptyInputFieldProduct($Product_Name, $Product_Description, $Product_Price, $Product_Stock) !== False) {
    header("location: ../index.php?error=emptyinput");
    Exit();
    }
   

   if (ProductExists($conn, $Product_Name) !== False) {
    header("location: ../index.php?error=emailtaken");
    Exit();
   }

   CreateProduct($conn, $Product_Name, $Product_Description, $Product_Price, $Product_Stock);

}
else {
    header("location: ../dashboard.php");
    Exit();
}