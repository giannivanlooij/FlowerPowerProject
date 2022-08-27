<?php
    session_start();
    include_once "../../includes/databasehandler-include.php";
  
    if (!isset($_SESSION['Employee_ID'])) {
      header("location: ../loginemployee.php");
    }
    $Employee_InSessionID = $_SESSION['Employee_ID'];
    $Name = $_SESSION['Employee_Name'];
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
                                        <th class="text-center" scope="col">Bestelling nummer</th>
                                        <th scope="col">id klant</th>
                                        <th scope="col">datum</th>
                                        <th scope="col">opgehaald?</th>
                                        <th class="text-center" scope="col">medewerker</th>
                                        <th class="text-center" scope="col">winkel id</th>
                                        <th class="text-center" scope="col">opties</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                        $sql = "SELECT * FROM invoices;";
                                        $Result = mysqli_query($conn, $sql);
                                        $ResultCheck = mysqli_num_rows($Result);

                                        if ($ResultCheck > 0) {
                                            while ($Row = mysqli_fetch_assoc($Result)) {
                                                //defined variables
                                                $Invoice_ID = $Row['Invoice_ID'];
                                                $Customer_ID = $Row['Customer_ID'];
                                                $Invoice_Date = $Row['Invoice_Date'];
                                                $Invoice_OrderPickedUp = $Row['Invoice_OrderPickedUp'];
                                                $Employee_ID = $Row['Employee_ID'];
                                                $FlowerShop_ID = $Row['FlowerShop_ID'];

                                                if ($Invoice_OrderPickedUp == 1) {
                                                    $Invoice_OrderPickedUp = "Ja";
                                                }else {
                                                    $Invoice_OrderPickedUp = "nee";
                                                }

                                                // begin row
                                                echo "<tr class='inner-box'>" .
                                                "<th scope='row'>" .
                                                // event-date is the styling for the id 
                                                    "<div class='event-date'>" .
                                                        $Invoice_ID .
                                                    "</div>" .
                                                "</th>" .
                                                //name
                                                "<td>" .
                                                    "<div class='event-wrap'>" .
                                                        "<h4>" . "<a href='#'>" . $Customer_ID . "</a>" . "</h4>" .
                                                    "</div>" .
                                                "</td>" .
                                                //middlename
                                                "<td>" .
                                                    "<div class='r-no'>" .
                                                    $Invoice_Date .
                                                    "</div>" .
                                                "</td>" .
                                                "<td>" .
                                                    "<div class='r-no'>" .
                                                    $Invoice_OrderPickedUp .
                                                    "</div>" .
                                                "</td>" .
                                                "<td>" .
                                                    "<div class='r-no'>" .
                                                    $Employee_ID .
                                                    "</div>" .
                                                "</td>" .
                                                "<td>" .
                                                    "<div class='r-no'>" .
                                                    $FlowerShop_ID .
                                                    "</div>" .
                                                "</td>" .
                                                "<td>" .
                                                 "<div class='btn-group'>" .
                                                     "<a class='btn btn-secondary' href='view-invoice.php?id=" . $Invoice_ID . "''>" . "bekijk " . "</a>" .
                                                     //"<a class='btn btn-secondary' href='../../includes/delete-invoice-include.php?id=" . $Invoice_ID . "''>" . " verwijder" . "</a>" .
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