<?php

if (isset($_POST['submit'])) {
   $Employee_Name = $_POST["Employee_Name"];
   $Employee_MiddleName = $_POST["Employee_MiddleName"];
   $Employee_LastName = $_POST["Employee_LastName"];
   $Employee_Addres = $_POST["Employee_Addres"];
   $Employee_HouseNumber = $_POST["Employee_HouseNumber"];
   $Employee_PostcalCode = $_POST["Employee_PostalCode"];
   $Employee_TownShip = $_POST["Employee_TownShip"];
   $Employee_Email = $_POST["Employee_Email"];
   $Employee_Password = $_POST["Employee_Password"];
   $password_confirmation = $_POST["password_confirmation"];
   $Employee_PhoneNumber = $_POST["Employee_PhoneNumber"];
   $Employee_DateOfBirth = $_POST["Employee_DateOfBirth"];
   
   
   

   require_once 'databasehandler-include.php';
   require_once 'functions-include.php';

   if (EmptyInputFieldEmployee($Employee_Name, $Employee_LastName, $Employee_Email, $Employee_Password, $password_confirmation, $Employee_Addres, $Employee_HouseNumber, $Employee_PostcalCode, $Employee_TownShip, $Employee_PhoneNumber, $Employee_DateOfBirth) !== False) {
    header("location: ../index.php?error=emptyinput");
    Exit();

    if (InvalidEmployeeEmail($Employee_Email) !== False) {
        header("location: ../index.php?error=invalidemail");
        Exit();
       }
   }

   

   if (EmailAndPhoneExistsEmployee($conn, $Employee_Email, $Employee_PhoneNumber) !== False) {
    header("location: ../index.php?error=emailtaken");
    Exit();
   }
   
   CreateEmployee($conn, $Employee_Name, $Employee_MiddleName, $Employee_LastName, $Employee_Addres, $Employee_HouseNumber, $Employee_PostcalCode,  $Employee_TownShip, $Employee_Email, $Employee_Password, $Employee_PhoneNumber, $Employee_DateOfBirth);
}
else {
    header("location: ../index.php");
    Exit();
}