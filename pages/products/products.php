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
                                        <th class="text-center" scope="col">ID</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Naam</th>
                                        <th scope="col">Beschrijving</th>
                                        <th scope="col">Prijs</th>
                                        <th class="text-center" scope="col">Voorraad</th>
                                        <th class="text-center" scope="col">Opties</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                                                      
                                        $sql = "SELECT * FROM products;";
                                        $Result = mysqli_query($conn, $sql);
                                        $ResultCheck = mysqli_num_rows($Result);

                                        if ($ResultCheck > 0) {
                                            while ($Row = mysqli_fetch_assoc($Result)) {
                                                //defined variables
                                                $Product_ID = $Row['Product_ID'];
                                                $Product_Image = $Row['Product_ImgLocation'];
                                                $Product_Name = $Row['Product_Name'];
                                                $Product_Description = $Row['Product_Description'];
                                                $Product_Price = $Row['Product_Price'];
                                                $Product_Stock = $Row['Product_Stock'];

                                                
                                                // begin row
                                                echo "<tr class='inner-box'>" .
                                                "<th scope='row'>" .
                                                // event-date is the styling for the id 
                                                    "<div class='event-date'>" . $Product_ID ."</div>" .
                                                "</th>" .
                                                //image
                                                "<td>" .
                                                    "<div class='event-wrap'>" .
                                                        "<img width='50' height='50' src='" .'../' . $Product_Image . "'/>" .
                                                    "</div>" .
                                                "</td>" .
                                                //name
                                                "<td>" .
                                                    "<div class='event-wrap'>" .
                                                        "<h4>" . "<a href='#'>" . $Product_Name . "</a>" . "</h4>" .
                                                    "</div>" .
                                                "</td>" .
                                                //description
                                                "<td>" .
                                                    "<div class='r-no'>" . $Product_Description ."</div>" .
                                                "</td>" .

                                                "<td>" .
                                                    "<div class='r-no'>" ."$". $Product_Price . "</div>" .
                                                "</td>" .

                                                "<td>" .
                                                    "<div class='r-no'>" . $Product_Stock . "</div>" .
                                                "</td>" .
                                                "<td>" .
                                                    "<div class='btn-group'>" .
                                                        "<a class='btn btn-secondary' href='view-product.php?id=" . $Product_ID . "''>" . "wijzig " . "</a>" .
                                                        "<a class='btn btn-secondary' href='../../includes/delete-product-include.php?id=" . $Product_ID . "''>" . " verwijder" . "</a>" .
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
                                    
                                   