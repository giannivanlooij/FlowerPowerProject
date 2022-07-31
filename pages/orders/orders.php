<?php
   session_start();
   include_once "../../includes/databasehandler-include.php"
?>

<table class="table">
    <thead>
        <tr>
            <th class="text-center" scope="col">Bestelling Nummer</th>
            <th scope="col">Datum</th>
            <th scope="col">Klant</th>
            <th scope="col">vestiging</th>
            <th class="text-center" scope="col">opgehaald</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
            $sql = "SELECT Invoice_ID, Invoice_OrderPickedUp, Invoice_Date, Customer_Name, FlowerShop_Addres
            FROM invoices
            INNER JOIN customers
            ON invoices.Customer_ID = customers.Customer_ID
            INNER JOIN flowershops
            ON invoices.FlowerShop_ID = flowershops.FlowerShop_ID";


            $Result = mysqli_query($conn, $sql);
            $ResultCheck = mysqli_num_rows($Result);

            // make a join with customers for the name of the customer
            //and a join for the name/location of the flowershop

            if ($ResultCheck > 0) {
                while ($Row = mysqli_fetch_assoc($Result)) {
                    //defined variables
                    $Invoice_ID = $Row['Invoice_ID'];
                    $OrderDate = $Row['Invoice_Date'];
                    $Customer_Name = $Row['Customer_Name'];
                    $FlowerShop = $Row['FlowerShop_Addres'];
                    $OrderPickedUp = $Row['Invoice_OrderPickedUp'];

                    if ($OrderPickedUp == 1) {
                        $OrderPickedUp = "Ja";
                    }else {
                        $OrderPickedUp = "nee";
                    }
                    

                    // begin row
                    echo "<tr class='inner-box'>" .
                    "<th scope='row'>" .
                    // event-date is the styling for the invoice id 
                        "<div class='event-date'>" .
                        $Invoice_ID .
                        "</div>" .
                    "</th>" .
                    //order date
                    "<td>" .
                        "<div class='r-no'>" .
                            $OrderDate .
                        "</div>" .
                    "</td>" .
                    //customer name
                    "<td>" .
                        "<div class='r-no'>" .
                        $Customer_Name .
                        "</div>" .
                    "</td>" .
                    //flowershop location
                    "<td>" .
                        "<div class='r-no'>" .
                        $FlowerShop .
                        "</div>" .
                    "</td>" .
                    
                    //order picked up
                    "<td>" .
                        "<div class='r-no'>" .
                        $OrderPickedUp .
                        "</div>" .
                    "</td>" .
                    
                    "</tr>";
                }
            }
        ?>
    </tbody>
</table>