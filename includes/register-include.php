<?php

if (isset($_POST['submit'])) {
   $Customer_Name = $_POST["Customer_Name"];
   $Customer_MiddleName = $_POST["Customer_MiddleName"];
   $Customer_LastName = $_POST["Customer_LastName"];
   $Customer_Addres = $_POST["Customer_Addres"];
   $Customer_HouseNumber = $_POST["Customer_HouseNumber"];
   $Customer_PostcalCode = $_POST["Customer_PostalCode"];
   $Customer_TownShip = $_POST["Customer_TownShip"];
   $Customer_Email = $_POST["Customer_Email"];
   $Customer_Password = $_POST["Customer_Password"];
   $password_confirmation = $_POST["password_confirmation"];
   $Customer_PhoneNumber = $_POST["Customer_PhoneNumber"];
   $Customer_DateOfBirth = $_POST["Customer_DateOfBirth"];
   
   
   

   require_once 'databasehandler-include.php';
   require_once 'functions-include.php';

   if (EmptyInputField($Customer_Name, $Customer_LastName, $Customer_Email, $Customer_Password, $password_confirmation, $Customer_Addres, $Customer_HouseNumber, $Customer_PostcalCode, $Customer_TownShip, $Customer_PhoneNumber, $Customer_DateOfBirth) !== False) {
    header("location: ../index.php?error=emptyinput");
    Exit();

    if (InvalidCustomerEmail($Customer_Email) !== False) {
        header("location: ../index.php?error=invalidemail");
        Exit();
       }
   }

   

   if (EmailAndPhoneExists($conn, $Customer_Email, $Customer_PhoneNumber) !== False) {
    header("location: ../index.php?error=emailtaken");
    Exit();
   }
   
   CreateUser($conn, $Customer_Name, $Customer_MiddleName, $Customer_LastName, $Customer_Addres, $Customer_HouseNumber, $Customer_PostcalCode,  $Customer_TownShip, $Customer_Email, $Customer_Password, $Customer_PhoneNumber, $Customer_DateOfBirth);
}
else {
    header("location: ../index.php");
    Exit();
}