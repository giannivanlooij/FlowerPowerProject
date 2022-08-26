<?php
session_start();

$Employee_ID = $_SESSION['Employee_ID'];


if (!isset($_GET['id'])) {
    die('id not provided');
}
    include_once "../../includes/databasehandler-include.php";

    
     $ID = $_GET['id'];
    $sql = "SELECT * FROM invoices where Invoice_ID = $ID;";
    $Result = mysqli_query($conn, $sql);
    if ($Result->num_rows != 1) {
        die('id not found');
    }
    $Data = mysqli_fetch_assoc($Result);
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Basic -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Site Metas -->
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="icon" type="image/png" href="../../images/favicon.png">
        <title>FlowerPower</title>
        <!-- bootstrap core css -->
        <link rel="stylesheet" type="text/css" href= "../../css/home/bootstrap.css">
        <!-- font awesome style -->
        <link rel="stylesheet" href= "../../css/home/font-awesome.min.css">
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href= "../../css/home/style.css">
        <!-- responsive style -->
        <link rel="stylesheet" href= "../../css/home/responsive.css">
    </head>
    <!-- Register -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <form action="../../includes/update-order-include.php?id=<?= $ID; ?> " method="POST">
                            <!-- invoice_ID -->
                            <div class="row mb-3">
                                <label for="Invoice_ID" class="col-md-4 col-form-label text-md-end">Bestelling nummer:</label>
                                <div class="col-md-6">
                                    <input readonly id="Invoice_ID" type="text" class="form-control" name="Invoice_ID" placeholder="Bestelling nummer" required value="<?= $Data['Invoice_ID']; ?>">
                                </div>
                            </div>
                            <!-- customer name-->
                            <div class="row mb-3">
                                <label for="Customer_Name" class="col-md-4 col-form-label text-md-end">Naam:</label>
                                <div class="col-md-6">
                                <?php
                                    $CustomerQuery = "SELECT Invoice_ID, Invoice_OrderPickedUp, Invoice_Date, Customer_Name, FlowerShop_Addres
                                    FROM invoices
                                    INNER JOIN customers
                                    ON invoices.Customer_ID = customers.Customer_ID
                                    INNER JOIN flowershops
                                    ON invoices.FlowerShop_ID = flowershops.FlowerShop_ID
                                    Where Invoice_ID = $ID;";

                                    $CustomerResult = mysqli_query($conn, $CustomerQuery);
                                    $CustomerResultCheck = mysqli_num_rows($CustomerResult);

                                    if ($CustomerResultCheck > 0) {
                                        while ($Row = mysqli_fetch_assoc($CustomerResult)) {
                                            //defined variables
                                            $Customer_Name = $Row['Customer_Name'];
                                            
                                            echo "<input readonly value='$Customer_Name'>";

                                            
                                        }
                                    }
                                ?>
                                
                                </div>
                            </div>
                            <!-- invoice_date -->
                            <div class="row mb-3">
                                <label for="Invoice_Date" class="col-md-4 col-form-label text-md-end">Datum:</label>

                                <div class="col-md-6">
                                    <input readonly id="Invoice_Date" type="text" class="form-control" name="Invoice_Date" placeholder="Datum" required value="<?= $Data['Invoice_Date']; ?>">                              
                                </div>
                            </div>
                            <!-- FlowerShop Addres -->
                            <div class="row mb-3">
                                <label for="Employee_WorksAt" class="col-md-4 col-form-label text-md-end">Werk locatie:</label>
                                <div class="col-md-6">
                                <select id="FlowerShop_ID" class="form-control" name="FlowerShop_ID" placeholder="Werk locatie">
                                    <?php
                                        $FlowerShopQuery = "SELECT * FROM flowershops;";
                                        $FlowerShopResult = mysqli_query($conn, $FlowerShopQuery);
                                        $FlowerShopResultCheck = mysqli_num_rows($FlowerShopResult);

                                        if ($FlowerShopResultCheck > 0) {
                                            while ($Row = mysqli_fetch_assoc($FlowerShopResult)) {
                                                //defined variables
                                                $FlowerShop_ID = $Row['FlowerShop_ID'];
                                                $FlowerShop_Addres = $Row['FlowerShop_Addres'];
                                                
                                                echo "<option value=$FlowerShop_ID>$FlowerShop_Addres</option>";

                                                
                                            }
                                        }
                                    ?>
                                </select>
                                </div>
                            </div>
                            <!-- this input assigns the employee to the order -->
                            <div class="row mb-3">
                                <label for="Employee_Name" class="col-md-4 col-form-label text-md-end">Weknemer:</label>
                                <div class="col-md-6">
                                    <SELECT value='Employee_ID'>
                                    <?php
                                            $EmployeesQuery = "SELECT * FROM employees;";
                                            $EmployeesResult = mysqli_query($conn, $EmployeesQuery);
                                            $EmployeesResultCheck = mysqli_num_rows($EmployeesResult); 

                                            if ($EmployeesResultCheck > 0) {
                                                while ($Row = mysqli_fetch_assoc($EmployeesResult)) {
                                                    //defined variables
                                                    $Employee_ID = $Row['Employee_ID'];
                                                    $Employee_Name = $Row['Employee_Name'];
                                                    
                                                    
                                                    echo "<option value=$Employee_ID>$Employee_Name</option>";

                                                    
                                                }
                                            }
                                        ?>
                                    </SELECT>
                                </div>
                            </div>
                            <!-- Invoice_OrderPickedUp. the employee can set the order as picked up. -->
                            <div class="row mb-3">
                                <label for="Employee_PostalCode" class="col-md-4 col-form-label text-md-end">Afgehandeld?</label>
                                <div class="col-md-6">
                                    <SELECT value=>
                                <?php
        
                                    $PickedUpQuery = "SELECT Invoice_ID, Invoice_OrderPickedUp, Invoice_Date, Customer_Name, FlowerShop_Addres
                                    FROM invoices
                                    INNER JOIN customers
                                    ON invoices.Customer_ID = customers.Customer_ID
                                    INNER JOIN flowershops
                                    ON invoices.FlowerShop_ID = flowershops.FlowerShop_ID
                                    Where Invoice_ID = $ID";


                                    $PickedUpResult = mysqli_query($conn, $PickedUpQuery);
                                    $PickedUpResultCheck = mysqli_num_rows($PickedUpResult);

                                    if ($PickedUpResultCheck > 0) {
                                        while ($Row = mysqli_fetch_assoc($PickedUpResult)) {
                                            //defined variables
                                            $Invoice_OrderPickedUp = $Row['Invoice_OrderPickedUp'];
                                            $Employee_Name = $Row['Customer_Name'];
                                            
                                            
                                            echo "<option value=0>Nee</option>";
                                            echo "<option value=1>Ja</option>";

                                            
                                        }
                                    }
                                ?>
                                </SELECT>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button name="EditForm" type="submit" class="btn btn-primary">Bewerk</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</html>
