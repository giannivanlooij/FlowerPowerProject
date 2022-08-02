<?php
  session_start();
  include_once "../../includes/databasehandler-include.php";

  if (!isset($_SESSION['Employee_ID'])) {
    header("location: ../loginemployee.php");
  }
  $Employee_ID = $_SESSION['Employee_ID'];
  $Name = $_SESSION['Employee_Name'];

?>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="../../css/employees/employees.css" rel="stylesheet" />


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
                                        <th class="text-center" scope="col">ID</th>
                                        <th scope="col">adress</th>
                                        <th scope="col">postcode</th>
                                        <th scope="col">provincie</th>
                                        <th scope="col">Telefoonnummer</th>
                                        <th class="text-center" scope="col">Email</th>
                                        <th class="text-center" scope="col">Opties</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                                                      
                                        $sql = "SELECT * FROM flowershops;";
                                        $Result = mysqli_query($conn, $sql);
                                        $ResultCheck = mysqli_num_rows($Result);

                                        if ($ResultCheck > 0) {
                                            while ($Row = mysqli_fetch_assoc($Result)) {
                                                //defined variables
                                                $FlowerShop_ID = $Row['FlowerShop_ID'];
                                                $FlowerShop_Addres = $Row['FlowerShop_Addres'];
                                                $FlowerShop_PostalCode = $Row['FlowerShop_PostalCode'];
                                                $FlowerShop_TownShip = $Row['FlowerShop_TownShip'];
                                                $FlowerShop_PhoneNumber = $Row['FlowerShop_PhoneNumber'];
                                                $FlowerShop_Email = $Row['FlowerShop_Email'];

                                                
                                                // begin row
                                                echo "<tr class='inner-box'>" .
                                                "<th scope='row'>" .
                                                // event-date is the styling for the id 
                                                    "<div class='event-date'>" . $FlowerShop_ID ."</div>" .
                                                "</th>" .
                                                //image
                                                "<td>" .
                                                    "<div class='event-wrap'>" .
                                                        "<h4>" . "<a href='#'>" . $FlowerShop_Addres . "</a>" . "</h4>" .
                                                    "</div>" .
                                                "</td>" .
                                                //name
                                                "<td>" .
                                                    "<div class='event-wrap'>" .
                                                        "<h4>" . "<a href='#'>" . $FlowerShop_PostalCode . "</a>" . "</h4>" .
                                                    "</div>" .
                                                "</td>" .
                                                //description
                                                "<td>" .
                                                    "<div class='r-no'>" . $FlowerShop_TownShip ."</div>" .
                                                "</td>" .

                                                "<td>" .
                                                    "<div class='r-no'>" ."$". $FlowerShop_PhoneNumber . "</div>" .
                                                "</td>" .

                                                "<td>" .
                                                    "<div class='r-no'>" . $FlowerShop_Email . "</div>" .
                                                "</td>" .
                                                "<td>" .
                                                    "<div class='btn-group'>" .
                                                        "<a class='btn btn-secondary' href='view-shop.php?id=" . $FlowerShop_ID . "''>" . "wijzig " . "</a>" .
                                                        "<a class='btn btn-secondary' href='../../includes/delete-shop-include.php?id=" . $FlowerShop_ID . "''>" . " verwijder" . "</a>" .
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
                                    
                                   