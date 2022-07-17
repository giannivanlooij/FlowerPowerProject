<?php

// functions made for customer login system

//login
function EmptyInputLogin($Customer_Email, $Customer_Password) {
    $Result;
    if (empty($Customer_Email) || empty($Customer_Password)) {
        $Result = true;
    } 
    else {
        $Result = false;
    }
    return $Result;
}

function LoginUser($Customer_Email, $Customer_Password) {
    $EmailAndPhoneExists = EmailAndPhoneExists($conn, $Customer_Email, $Customer_PhoneNumber);

    if ($EmailAndPhoneExists === false) {
        header("location: ../pages/login.php?error=wronglogin");
        exit();
    }

    $HashedPassword = $EmailAndPhoneExists["Customer_Password"];
    $CheckPassword = password_verify($Customer_Password, $HashedPassword);

    if ($CheckedPassword === false) {
        header("location: ../pages/login.php?error=wronglogin");
        exit();
    }
    elseif ($CheckedPassword === true) {
        session_start();
        $_SESSION["Customer_Id"] = $EmailAndPhoneExists["Customer_Id"];
        $_SESSION["Customer_Email"] = $EmailAndPhoneExists["Customer_Email"];
        header("location: ../pages/index.php");
        exit();
    }
}


//registration employees
function EmptyInputFieldEmployee($Employee_Name, $Employee_LastName, $Employee_Email, $Employee_Password, $password_confirmation, $Employee_Addres, $Employee_HouseNumber, $Employee_PostcalCode, $Employee_TownShip, $Employee_PhoneNumber, $Employee_DateOfBirth) {
    $Result;
    if (empty($Employee_Name) || empty($Employee_LastName) || empty($Employee_Email) || empty($Employee_Password) || empty($password_confirmation) || empty($Employee_Addres) || empty($Employee_HouseNumber) || empty($Employee_PostcalCode) || empty($Employee_TownShip) || empty($Employee_PhoneNumber) || empty($Employee_DateOfBirth) ) {
        $Result = true;
    } 
    else {
        $Result = false;
    }
    return $Result;
}


function InvalidEmployeeEmail($Employee_Email) {
    $Result;
    if (!Filter_Var($Email, FILTER_VAIDATE_EMAIL)) {
        $Result = true;
    }
    else {
        $Result = false;
    }
    return $Result;
}

function PasswordMatchEmployee($Employee_Password, $password_confirmation) {
    $Result;
    if ($Employee_Password !== $password_confirmation) {
        $Result = true;
    }
    else {
        $Result = false;
    }
    return $Result;
}

function EmailAndPhoneExistsEmployee($conn, $Employee_Email, $Employee_PhoneNumber) {
   $sql = "SELECT * FROM employees WHERE Employee_PhoneNumber = ? OR Employee_Email = ?;";
   $stmt = mysqli_stmt_init($conn);
   if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../index.php?error=stmtfailed");
    Exit();
   }

   mysqli_stmt_bind_param($stmt, "ss", $Employee_Email, $Employee_PhoneNumber);
   mysqli_stmt_execute($stmt);

   $ResultData = mysqli_stmt_get_result($stmt);

   if($row  = mysqli_fetch_assoc($ResultData)) {
    return $row;
   }

   else {
    $Result = false;
    return $Result;
   }

   mysql_stmt_close($stmt);
}

function CreateEmployee($conn, $Employee_Name, $Employee_MiddleName, $Employee_LastName, $Employee_Addres, $Employee_HouseNumber, $Employee_PostcalCode, $Employee_TownShip, $Employee_Email, $Employee_Password, $Employee_PhoneNumber, $Employee_DateOfBirth) {
    $sql = "INSERT INTO employees (Employee_Name, Employee_MiddleName, Employee_LastName, Employee_Addres,  Employee_HouseNumber,  Employee_PostalCode,  Employee_TownShip, Employee_Email, Employee_Password, Employee_PhoneNumber, Employee_DateOfBirth) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
     header("location: ../index.php?error=stmt2failed");
     Exit();
    }

    $HashedPassword = password_hash($Employee_Password, PASSWORD_DEFAULT);
 
    mysqli_stmt_bind_param($stmt, "ssssssissss", $Employee_Name, $Employee_MiddleName, $Employee_LastName, $Employee_Addres, $Employee_HouseNumber, $Employee_PostcalCode, $Employee_TownShip, $Employee_Email, $Employee_Password, $Employee_PhoneNumber, $Employee_DateOfBirth);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php?error=none");
    Exit();
 }

 //registration
function EmptyInputField($Customer_Name, $Customer_LastName, $Customer_Email, $Customer_Password, $password_confirmation, $Customer_Addres, $Customer_HouseNumber, $Customer_PostcalCode, $Customer_TownShip, $Customer_PhoneNumber, $Customer_DateOfBirth) {
    $Result;
    if (empty($Customer_Name) || empty($Customer_LastName) || empty($Customer_Email) || empty($Customer_Password) || empty($password_confirmation) || empty($Customer_Addres) || empty($Customer_HouseNumber) || empty($Customer_PostcalCode) || empty($Customer_TownShip) || empty($Customer_PhoneNumber) || empty($Customer_DateOfBirth) ) {
        $Result = true;
    } 
    else {
        $Result = false;
    }
    return $Result;
}


function InvalidCustomerEmail($Customer_Email) {
    $Result;
    if (!Filter_Var($Email, FILTER_VAIDATE_EMAIL)) {
        $Result = true;
    }
    else {
        $Result = false;
    }
    return $Result;
}

function PasswordMatch($Customer_Password, $password_confirmation) {
    $Result;
    if ($Customer_Password !== $password_confirmation) {
        $Result = true;
    }
    else {
        $Result = false;
    }
    return $Result;
}

function EmailAndPhoneExists($conn, $Customer_Email, $Customer_PhoneNumber) {
   $sql = "SELECT * FROM customers WHERE Customer_PhoneNumber = ? OR Customer_Email = ?;";
   $stmt = mysqli_stmt_init($conn);
   if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../index.php?error=stmtfailed");
    Exit();
   }

   mysqli_stmt_bind_param($stmt, "ss", $Customer_Email, $Customer_PhoneNumber);
   mysqli_stmt_execute($stmt);

   $ResultData = mysqli_stmt_get_result($stmt);

   if($row  = mysqli_fetch_assoc($ResultData)) {
    return $row;
   }

   else {
    $Result = false;
    return $Result;
   }

   mysql_stmt_close($stmt);
}

function CreateUser($conn, $Customer_Name, $Customer_MiddleName, $Customer_LastName, $Customer_Addres, $Customer_HouseNumber, $Customer_PostcalCode, $Customer_TownShip, $Customer_Email, $Customer_Password, $Customer_PhoneNumber, $Customer_DateOfBirth) {
    $sql = "INSERT INTO customers (Customer_Name, Customer_MiddleName, Customer_LastName, Customer_Addres,  Customer_HouseNumber,  Customer_PostalCode,  Customer_TownShip, Customer_Email, Customer_Password, Customer_PhoneNumber, Customer_DateOfBirth) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
     header("location: ../index.php?error=stmt2failed");
     Exit();
    }

    $HashedPassword = password_hash($Customer_Password, PASSWORD_DEFAULT);
 
    mysqli_stmt_bind_param($stmt, "ssssssissss", $Customer_Name, $Customer_MiddleName, $Customer_LastName, $Customer_Addres, $Customer_HouseNumber, $Customer_PostcalCode, $Customer_TownShip, $Customer_Email, $Customer_Password, $Customer_PhoneNumber, $Customer_DateOfBirth);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php?error=none");
    Exit();
 }


//add product functions

function UploadProductImage($Product_Name, $Product_Description, $Product_Price, $Product_Stock) {
    $Result;
    if (empty($Product_Name) || empty($Product_Description) || empty($Product_Price) || empty($Product_Stock)  ) {
        $Result = true;
    } 
    else {
        $Result = false;
    }
    return $Result;
}

//checks for empty input fields
function EmptyInputFieldProduct($Product_Name, $Product_Description, $Product_Price, $Product_Stock) {
    $Result;
    if (empty($Product_Name) || empty($Product_Description) || empty($Product_Price) || empty($Product_Stock)  ) {
        $Result = true;
    } 
    else {
        $Result = false;
    }
    return $Result;
}

//checks if the product name already exists in the database
 function ProductExists($conn, $Product_Name) {
    $sql = "SELECT * FROM products WHERE Product_Name = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
     header("location: ../index.php?error=stmtfailed");
     Exit();
    }
 
    mysqli_stmt_bind_param($stmt, "s", $Product_Name);
    mysqli_stmt_execute($stmt);
 
    $ResultData = mysqli_stmt_get_result($stmt);
 
    if($row  = mysqli_fetch_assoc($ResultData)) {
     return $row;
    }
 
    else {
     $Result = false;
     return $Result;
    }
 
    mysql_stmt_close($stmt);
 }
//adds the product to the database
 function CreateProduct($conn, $Product_Name, $Product_Description, $Product_Price, $Product_Stock, $Temp_Location) {
    $sql = "INSERT INTO products (Product_Name, Product_Description, Product_Price, Product_Stock, Product_ImgLocation) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
     header("location: ../index.php?error=stmt2failed");
     Exit();
    }
 
    mysqli_stmt_bind_param($stmt, "ssiis", $Product_Name, $Product_Description, $Product_Price, $Product_Stock, $Temp_Location);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../dashboard.php?error=none");
    Exit();
 }