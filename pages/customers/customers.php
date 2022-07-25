<?php
    include_once "../../includes/databasehandler-include.php"
?>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="../../css/customers.css" rel="stylesheet" />

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
                                        <th scope="col">Tussenvoegsels</th>
                                        <th scope="col">Achternaam</th>
                                        <th class="text-center" scope="col">Adres</th>
                                        <th class="text-center" scope="col">Huisnummer</th>
                                        <th scope="col">Postcode</th>
                                        <th scope="col">Plaats</th>
                                        <th scope="col">Email</th>
                                        <th class="text-center" scope="col">Telefoonnummer</th>
                                        <th class="text-center" scope="col">Geboortedatum</th>
                                        <th class="text-center" scope="col">Opties</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                        $sql = "SELECT * FROM customers;";
                                        $Result = mysqli_query($conn, $sql);
                                        $ResultCheck = mysqli_num_rows($Result);

                                        if ($ResultCheck > 0) {
                                            while ($Row = mysqli_fetch_assoc($Result)) {
                                                //defined variables
                                                $Customer_ID = $Row['Customer_ID'];
                                                $Customer_Name = $Row['Customer_Name'];
                                                $Customer_MiddleName = $Row['Customer_MiddleName'];
                                                $Customer_LastName = $Row['Customer_LastName'];
                                                $Customer_Addres = $Row['Customer_Addres'];
                                                $Customer_HouseNumber = $Row['Customer_HouseNumber'];
                                                $Customer_PostalCode = $Row['Customer_Addres'];
                                                $Customer_TownShip = $Row['Customer_Addres'];
                                                $Customer_Email = $Row['Customer_Addres'];
                                                $Customer_PhoneNumber = $Row['Customer_Addres'];
                                                $Customer_DateOfBirth = $Row['Customer_Addres'];

                                                // begin row
                                                echo "<tr class='inner-box'>" .
                                                "<th scope='row'>" .
                                                // event-date is the styling for the id 
                                                    "<div class='event-date'>" .
                                                    $Customer_ID .
                                                    "</div>" .
                                                "</th>" .
                                                //name
                                                "<td>" .
                                                    "<div class='event-wrap'>" .
                                                        "<h4>" . "<a href='#'>" . $Row['Customer_Name'] . "</a>" . "</h4>" .
                                                    "</div>" .
                                                "</td>" .
                                                //middlename
                                                "<td>" .
                                                    "<div class='r-no'>" .
                                                    $Customer_MiddleName .
                                                    "</div>" .
                                                "</td>" .
                                                "<td>" .
                                                    "<div class='r-no'>" .
                                                    $Customer_LastName .
                                                    "</div>" .
                                                "</td>" .
                                                "<td>" .
                                                    "<div class='r-no'>" .
                                                    $Customer_Addres .
                                                    "</div>" .
                                                "</td>" .
                                                "<td>" .
                                                    "<div class='r-no'>" .
                                                    $Customer_HouseNumber .
                                                    "</div>" .
                                                "</td>" .
                                                "<td>" .
                                                    "<div class='r-no'>" .
                                                    $Customer_PostalCode .
                                                    "</div>" .
                                                "</td>" .
                                                "<td>" .
                                                    "<div class='r-no'>" .
                                                    $Customer_TownShip .
                                                    "</div>" .
                                                "</td>" .
                                                "<td>" .
                                                    "<div class='r-no'>" .
                                                    $Customer_Email .
                                                    "</div>" .
                                                "</td>" .
                                                "<td>" .
                                                    "<div class='r-no'>" .
                                                    $Customer_PhoneNumber .
                                                    "</div>" .
                                                "</td>" .
                                                "<td>" .
                                                    "<div class='r-no'>" .
                                                    $Customer_DateOfBirth .
                                                    "</div>" .
                                                "</td>" .
                                                "<td>" .
                                                    "<div class='btn-group'>" .
                                                        "<a class='btn btn-secondary' href='../../pages/customers/view-customer.php?id=" . $Customer_ID . "''>" . "wijzig " . "</a>" .
                                                        "<a class='btn btn-secondary' href='../../includes/delete-customer-include.php?id=" . $Customer_ID . "''>" . " verwijder" . "</a>" .
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
                                    
                                   