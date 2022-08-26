
<table class="table">
    <thead>
        <tr>
            <th class="text-center" scope="col">Bestelling Nummer</th>
            <th scope="col">Datum</th>
            <th scope="col">Klant</th>
            <th scope="col">vestiging</th>
            <th scope="col">Werknemer</th>
            <th class="text-center" scope="col">opgehaald</th>
        </tr>
    </thead>
    <tbody>
        <?php

            $FetchWorkLocation = "SELECT Employee_WorksAt from Employees Where Employee_ID = $Employee_ID;";
            $FetchResult = mysqli_query($conn, $FetchWorkLocation);
            $FetchResultCheck = mysqli_num_rows($FetchResult);

            if ($FetchResultCheck > 0) {
                while ($Row = mysqli_fetch_assoc($FetchResult)) {
                    //defined variables
                    $Employee_WorksAt = $Row['Employee_WorksAt'];
                }
            }
                    
            

        
            $sql = "SELECT Invoice_ID, Invoice_OrderPickedUp, Invoice_Date, Customer_Name, Employee_Name, FlowerShop_Addres
            From invoices
            left outer join employees on invoices.Employee_ID = employees.Employee_WorksAt
            inner join customers on invoices.Customer_ID = customers.Customer_ID
            inner join flowershops on invoices.FlowerShop_ID = flowershops.FlowerShop_ID
            WHERE Invoices.Employee_ID is null
            
            union
            
            SELECT Invoice_ID, Invoice_OrderPickedUp, Invoice_Date, Customer_Name, Employee_Name, FlowerShop_Addres
            From flowershops
            inner join employees on flowershops.FlowerShop_ID = employees.Employee_WorksAt
            inner join invoices on employees.Employee_ID = invoices.Employee_ID
            inner join customers on invoices.Customer_ID = customers.Customer_ID
            WHERE Employees.Employee_WorksAt = 2;";


            $Result = mysqli_query($conn, $sql);
            $ResultCheck = mysqli_num_rows($Result);

            if ($ResultCheck > 0) {
                while ($Row = mysqli_fetch_assoc($Result)) {
                    //defined variables
                    $Invoice_ID = $Row['Invoice_ID'];
                    $OrderDate = $Row['Invoice_Date'];
                    $Customer_Name = $Row['Customer_Name'];
                    $FlowerShop = $Row['FlowerShop_Addres'];
                    $Employee_Name = $Row['Employee_Name'];
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
                    //Employee assigned
                    "<td>" .
                        "<div class='r-no'>" .
                        $Employee_Name .
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