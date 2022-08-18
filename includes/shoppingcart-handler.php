<?php
session_start();
include_once "databasehandler-include.php";

//prepares customer login to insert his data into the database
if (isset($_SESSION['Customer_ID'])) {

    $ID = $_SESSION['Customer_ID'];
    $Name = $_SESSION['Customer_Name'];
    $PickedUp = 0;
    $Date = date("Y-m-d");

    echo $ID;
    echo $Name;
}

// adds the products to the productsoninvoice
if($_GET["action"] == 'checkout')
    {
        $InvoiceQuery = "INSERT INTO invoices (Customer_ID, Invoice_Date, Invoice_OrderPickedUp) VALUES (?, ?, ?);";
        $InvoiceStatement = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($InvoiceStatement, $InvoiceQuery)) {
        header("location: ../index.php?error=stmt2failed");
        Exit();
        }
 
        mysqli_stmt_bind_param($InvoiceStatement, "sss", $ID, $Date, $PickedUp);
        mysqli_stmt_execute($InvoiceStatement);
        mysqli_stmt_close($InvoiceStatement);
        echo $Date;
        //header("location: ../index.php?error=none");
        Exit();

        echo "check database for invoice";

    }


// adds the products to the productsoninvoice
if($_GET["action"] == 'checkout')
    {
        if(isset($_SESSION["AddedToCart"]))
        {
            foreach($_SESSION["AddedToCart"] as $values)
        {
            echo "sql is defined";
             $sql ="INSERT INTO productsoninvoices (Product_ID, ItemOnInvoice_Quantity)
                    values ('{$values['Product_ID']}', '{$values['Product_Quantity']}')";
                    $statement = $conn->prepare($sql);
                    $statement->execute();

                    echo "check database for products";

        }
    }
}

?>


