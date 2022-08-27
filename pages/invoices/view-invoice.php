<?php
   session_start();
   include_once "../../includes/databasehandler-include.php";
   
   if (!isset($_GET['id'])) {
    die('id not provided');
}
    $ID = $_GET['id'];
    $total = 0;
?>


<?php
                                    
    $sql = "SELECT Invoice_ID, Invoice_OrderPickedUp, Invoice_Date, Customer_Name, Customer_MiddleName, Customer_LastName, FlowerShop_Addres, FlowerShop_PostalCode, FlowerShop_TownShip, FlowerShop_PhoneNumber
    FROM invoices
    INNER JOIN customers
    ON invoices.Customer_ID = customers.Customer_ID
    INNER JOIN flowershops
    ON invoices.FlowerShop_ID = flowershops.FlowerShop_ID
    WHERE invoices.Invoice_ID = $ID;";
    $Result = mysqli_query($conn, $sql);
    $ResultCheck = mysqli_num_rows($Result);

    if ($ResultCheck > 0) {
        while ($Row = mysqli_fetch_assoc($Result)) {
            //defined variables
            $Invoice_ID = $Row['Invoice_ID'];
            $Customer_Name = $Row['Customer_Name'];
            $Customer_MiddleName = $Row['Customer_MiddleName'];
            $Customer_LastName = $Row['Customer_LastName'];
            $Invoice_Date = $Row['Invoice_Date'];
            $Invoice_OrderPickedUp = $Row['Invoice_OrderPickedUp'];
            //$Employee_ID = $Row['Employee_ID'];
            $FlowerShop_Addres = $Row['FlowerShop_Addres'];
            $FlowerShop_PostalCode = $Row['FlowerShop_PostalCode'];
            $FlowerShop_TownShip = $Row['FlowerShop_TownShip'];
            $FlowerShop_PhoneNumber = $Row['FlowerShop_PhoneNumber'];
        }
    }
?>

<html>
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="content-type">
        <link rel="stylesheet" href="../../css/invoice-template.css">
    </head>
    <body style='max-width: 500px; margin: auto; background: white; padding: 10px;' class="c58 doc-content">
        <p style='margin-top: 25px;' class="c27"><span class="c30">FlowerPower </span></p>
        <p class="c28"><span class="c23">Af te halen: </span></p>
        <p class="c33"><span class="c23">Bloemenwinkel FlowerPower </span></p>
        <p class="c48"><span class="c23"><?php echo $FlowerShop_Addres ?> </span></p>
        <p class="c25"><span class="c23"><?php echo $FlowerShop_PostalCode?> <?php echo $FlowerShop_TownShip ?></span></p>
        <p class="c14"><span class="c23"><?php echo $FlowerShop_PhoneNumber ?> </span></p>
        <p class="c40"><span class="c41">Factuur </span></p>
        <p class="c12">
            <span class="c0">Factuurnummer: </span>
            <span class="c34"><?php echo $Invoice_ID ?> <?php echo $Invoice_Date ?> </span>
            <span class="c2"><?php echo $Customer_Name ?> <?php echo $Customer_MiddleName ?> <?php echo $Customer_LastName ?> </span>
        </p>
        <p class="c6"><span class="c2"><?php echo $FlowerShop_Addres ?></span></p>
        <p class="c45"><span class="c2"><?php $FlowerShop_PostalCode?> <?php echo $FlowerShop_TownShip ?> </span></p>
        <p class="c57"><span class="c0">Artikelen: </span></p>
        <?php
        $ProductsOnInvoices = "SELECT invoices.Invoice_ID, products.Product_Name, products.Product_Price, productsoninvoices.ItemOnInvoice_Quantity
        FROM invoices
        INNER JOIN productsoninvoices
        ON invoices.Invoice_ID = productsoninvoices.Invoice_ID
        INNER JOIN products
        ON productsoninvoices.Product_ID = products.Product_ID
        WHERE invoices.Invoice_ID = $ID;";
        $ResultProduct = mysqli_query($conn, $ProductsOnInvoices);
        $ResultProductCheck = mysqli_num_rows($ResultProduct);
    
            if ($ResultProductCheck > 0) {
                while ($Row = mysqli_fetch_assoc($ResultProduct)) {
                    //defined variables
                    $product_Name = $Row['Product_Name'];
                    $Product_Price = $Row['Product_Price'];
                    $ItemOnInvoice_Quantity = $Row['ItemOnInvoice_Quantity'];
                    $total += $Product_Price * $ItemOnInvoice_Quantity;

                    echo "<p class='c37'><span class='c44'>" . $product_Name . ' ' .  $Product_Price . ' ' .  $ItemOnInvoice_Quantity . "</span></p>" ;
                }
            }
            
        ?>

        <p class="c36"><span class="c3">Totaal: &euro; <?php echo $total; ?> </span></p>
    </body>
</html>
            
            