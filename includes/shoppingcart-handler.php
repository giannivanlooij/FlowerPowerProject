<?php
session_start();
include_once "databasehandler-include.php";

//prepares the arrays
if (isset($_SESSION['Customer_ID'])) {

    $ID = $_SESSION['Customer_ID'];
    $Name = $_SESSION['Customer_Name'];
    $PickedUp = 0;
    $Date = date("Y-m-d");

    //$product_ID = $values['Product_ID'];
    //$Product_Quantity = $values['Product_Quantity'];
}

// adds the products to the productsoninvoice
if($_GET["action"] == 'checkout')
    {
        //prepares the invoice 
        $InvoiceQuery = "INSERT INTO invoices (Customer_ID, Invoice_Date, Invoice_OrderPickedUp) VALUES (?, ?, ?);";
        $InvoiceStatement = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($InvoiceStatement, $InvoiceQuery)) {
        header("location: ../index.php?error=stmt2failed");
        Exit();
        }
        mysqli_stmt_bind_param($InvoiceStatement, "sss", $ID, $Date, $PickedUp);
        mysqli_stmt_execute($InvoiceStatement);
        mysqli_stmt_close($InvoiceStatement);
        echo "Invoice created";


        //fetches the id from the just generated invoice
        $FetchID = "SELECT MAX(Invoice_ID) FROM invoices;";
        $ResultID = mysqli_query($conn, $FetchID);
        $ResultIDCheck = mysqli_num_rows($ResultID);

        
        

        if ($ResultIDCheck > 0) {
            while ($row = $ResultID->fetch_row()) {
                $GeneratedID = $row[0] ?? false;
                echo $GeneratedID;
                

                foreach($_SESSION["AddedToCart"] as $Keys => $values){
                    

                    $ProductQuery = "INSERT INTO productsoninvoices (Invoice_ID, Product_ID, ItemOnInvoice_Quantity) VALUES (?, ?, ?);";
                    $ProductStatement = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($ProductStatement, $ProductQuery)) {
                    header("location: ../index.php?error=stmt2failed");
                    Exit();
                        }
                        mysqli_stmt_bind_param($ProductStatement, "sss", $GeneratedID, $values['Product_ID'], $values['Product_Quantity']);
                        mysqli_stmt_execute($ProductStatement);
                        mysqli_stmt_close($ProductStatement);
                        echo "productsoninvoices created";
                     }
                        header("location: ../index.php?error=none");
                        unset ($_SESSION["AddedToCart"]);
                        Exit();
            }

            // adds the products to the productsoninvoice
        echo "session is set for adding items and foreach";
        
    }
    }





?>


