<?php
    include_once "../../includes/databasehandler-include.php"
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
                                        <th scope="col">Naam</th>
                                        <th scope="col">Beschrijving</th>
                                        <th scope="col">Prijs</th>
                                        <th class="text-center" scope="col">Voorraad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                        $sql = "SELECT * FROM products;";
                                        $Result = mysqli_query($conn, $sql);
                                        $ResultCheck = mysqli_num_rows($Result);

                                        if ($ResultCheck > 0) {
                                            while ($Row = mysqli_fetch_assoc($Result)) {
                                                // begin row
                                                echo "<tr class='inner-box'>" .
                                                "<th scope='row'>" .
                                                // event-date is the styling for the id 
                                                    "<div class='event-date'>" .
                                                        $Row['Product_ID'] .
                                                    "</div>" .
                                                "</th>" .
                                                //name
                                                "<td>" .
                                                    "<div class='event-wrap'>" .
                                                        "<h4>" . "<a href='#'>" . $Row['Product_Name'] . "</a>" . "</h4>" .
                                                    "</div>" .
                                                "</td>" .
                                                //middlename
                                                "<td>" .
                                                    "<div class='r-no'>" .
                                                    $Row['Product_Description'] .
                                                    "</div>" .
                                                "</td>" .
                                                "<td>" .
                                                    "<div class='r-no'>" .
                                                    $Row['Product_Price'] .
                                                    "</div>" .
                                                "</td>" .
                                                "<td>" .
                                                    "<div class='r-no'>" .
                                                    $Row['Product_Stock'] .
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
                                    
                                   