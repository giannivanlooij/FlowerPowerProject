<?php

if (isset($_POST["submit"])) {
    
    $Customer_Email = $_POST["Customer_Email"];
    $Customer_Password = $_POST["Customer_Password"];

    require_once "databasehandler-include.php";
    require_once "functions-include.php";

    if (EmptyInputLogin($Customer_Email, $Customer_Password) !== False) {
        header("location: ../login.php?error=emptyinput");
        Exit();
    }

    LoginUser($conn, $Customer_Email, $Customer_Password);
} else if (isset($_POST["submitemployee"])) {
        
        $Employee_Email = $_POST["Employee_Email"];
        $Employee_Password = $_POST["Employee_Password"];
    
        require_once "databasehandler-include.php";
        require_once "functions-include.php";
    
        if (EmptyInputLoginEmployee($Employee_Email, $Employee_Password) !== False) {
            header("location: ../login.php?error=emptyinput");
            Exit();
        }
    
        LoginEmployee($conn, $Employee_Email, $Employee_Password);
    }

    else {
        header("location: ../index.php");
        Exit();
    }