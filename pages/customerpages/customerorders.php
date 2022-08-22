<?php
session_start();
include_once "../../includes/databasehandler-include.php";
?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="../../css/employees/employees.css" rel="stylesheet" />
<link rel="icon" type="image/png" href="../../images/favicon.png">

<div class="event-schedule-area-two bg-color pad100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="home" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">Bestellingnummer</th>
                                        <th scope="col">Datum</th>
                                        <th scope="col">vestiging</th>
                                        <th scope="col">opgehaald?</th>
                                        <th class="text-center" scope="col">Opties</th>
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
                                            //order picked up
                                            "<td>" .
                                                "<div class='r-no'>" .
                                                    "<a href='changeorder.php?action=checkout' class='btn btn-update'>Bestel</a>" .
                                                "</div>" .
                                            "</td>" .
                                            
                                            "</tr>";
                                        }
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

