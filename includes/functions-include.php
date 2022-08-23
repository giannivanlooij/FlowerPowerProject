<?php

// functions made for customer login system

//login customer
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

function LoginUser($conn, $Customer_Email, $Customer_Password) {
    $EmailExists = EmailExists($conn, $Customer_Email);

    if ($EmailExists === false) {
        header("location: ../pages/login.php?error=usernotexists");
        exit();
    }

    $HashedPassword = $EmailExists["Customer_Password"];
    $CheckedPassword = password_verify($Customer_Password, $HashedPassword);

    if ($CheckedPassword === false) {
        header("location: ../pages/login.php?error=wrongpassword");
        exit();
    }
    else if ($CheckedPassword === true) {
        session_start();
        $_SESSION["Customer_ID"] = $EmailExists["Customer_ID"];
        $_SESSION["Customer_Email"] = $EmailExists["Customer_Email"];
        $_SESSION["Customer_Name"] = $EmailExists["Customer_Name"];
        header("location: ../index.php");
        exit();
    }
}

//login employees
function EmptyInputLoginEmployee($Employee_Email, $Employee_Password) {
    $Result;
    if (empty($Employee_Email) || empty($Employee_Password)) {
        $Result = true;
    } 
    else {
        $Result = false;
    }
    return $Result;
}

function LoginEmployee($conn, $Employee_Email, $Employee_Password) {
    $EmailExistsEmployee = EmailExistsEmployee($conn, $Employee_Email);

    if ($EmailExistsEmployee === false) {
        header("location: ../pages/login.php?error=usernotexists");
        exit();
    }

    $HashedPassword = $EmailExistsEmployee["Employee_Password"];
    $CheckedPassword = password_verify($Employee_Password, $HashedPassword);

    if ($CheckedPassword === false) {
        header("location: ../pages/login.php?error=wrongpassword");
        exit();
    }
    else if ($CheckedPassword === true) {
        session_start();
        $_SESSION["Employee_ID"] = $EmailExistsEmployee["Employee_ID"];
        $_SESSION["Employee_Email"] = $EmailExistsEmployee["Employee_Email"];
        $_SESSION["Employee_Name"] = $EmailExistsEmployee["Employee_Name"];
        header("location: ../dashboard.php");
        exit();
    }
}

function EmailExistsEmployee($conn, $Employee_Email) {
    $sql = "SELECT * FROM employees WHERE Employee_Email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
     header("location: ../index.php?error=stmtfailed");
     Exit();
    }
 
    mysqli_stmt_bind_param($stmt, "s", $Employee_Email);
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
 
    mysqli_stmt_bind_param($stmt, "sssssssssss", $Employee_Name, $Employee_MiddleName, $Employee_LastName, $Employee_Addres, $Employee_HouseNumber, $Employee_PostcalCode, $Employee_TownShip, $Employee_Email, $HashedPassword , $Employee_PhoneNumber, $Employee_DateOfBirth);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../dashboard.php?error=none");
    Exit();
 }

 //registration customer
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

function EmailExists($conn, $Customer_Email) {
   $sql = "SELECT * FROM customers WHERE Customer_Email = ?;";
   $stmt = mysqli_stmt_init($conn);
   if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../index.php?error=stmtfailed");
    Exit();
   }

   mysqli_stmt_bind_param($stmt, "s", $Customer_Email);
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
 
    mysqli_stmt_bind_param($stmt, "sssssssssss", $Customer_Name, $Customer_MiddleName, $Customer_LastName, $Customer_Addres, $Customer_HouseNumber, $Customer_PostcalCode, $Customer_TownShip, $Customer_Email, $HashedPassword, $Customer_PhoneNumber, $Customer_DateOfBirth);
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

 //flower shop functions

 //checks for empty input fields in create a shop 
function EmptyInputFieldFlowerShop($FlowerShop_Addres, $FlowerShop_HouseNumber, $FlowerShop_PostalCode, $FlowerShop_TownShip, $FlowerShop_PhoneNumber, $FlowerShop_Email) {
    $Result;
    if (empty($FlowerShop_Addres) || empty($FlowerShop_HouseNumber) || empty($FlowerShop_PostalCode) || empty($FlowerShop_TownShip) || empty($FlowerShop_PhoneNumber) || empty($FlowerShop_Email)  ) {
        $Result = true;
    } 
    else {
        $Result = false;
    }
    return $Result;
}

 //checks if the flowershop already exists in the database
 function FlowerShopExists($conn, $FlowerShop_Addres, $FlowerShop_HouseNumber) {
    $sql = "SELECT * FROM flowershops WHERE FlowerShop_Addres = ? AND FlowerShop_HouseNumber = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
     header("location: ../index.php?error=stmtfailed");
     Exit();
    }
 
    mysqli_stmt_bind_param($stmt, "ss", $FlowerShop_Addres, $FlowerShop_HouseNumber);
    mysqli_stmt_execute($stmt);
 
    $ResultData = mysqli_stmt_get_result($stmt);
 
    if($row  = mysqli_fetch_assoc($ResultData)) {
     return $row;
    }
 
    else {
     $Result = false;
     return $Result;
    }
}

 //adds the flowershop to the database
 function CreateFlowerShop($conn, $FlowerShop_Addres, $FlowerShop_HouseNumber, $FlowerShop_PostalCode, $FlowerShop_TownShip, $FlowerShop_PhoneNumber, $FlowerShop_Email) {
    $sql = "INSERT INTO flowershops (FlowerShop_Addres, FlowerShop_HouseNumber, FlowerShop_PostalCode, FlowerShop_TownShip, FlowerShop_PhoneNumber, FlowerShop_Email) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
     header("location: ../index.php?error=stmt2failed");
     Exit();
    }
 
    mysqli_stmt_bind_param($stmt, "ssssss", $FlowerShop_Addres, $FlowerShop_HouseNumber, $FlowerShop_PostalCode, $FlowerShop_TownShip, $FlowerShop_PhoneNumber, $FlowerShop_Email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../dashboard.php?error=none");
    Exit();
    }
