<?php
    include_once "../../includes/databasehandler-include.php";
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
                                    
                                        $sql = "SELECT * FROM employees;";
                                        $Result = mysqli_query($conn, $sql);
                                        $ResultCheck = mysqli_num_rows($Result);

                                        if ($ResultCheck > 0) {
                                            while ($Row = mysqli_fetch_assoc($Result)) {
                                                //defined variables
                                                $Employee_ID = $Row['Employee_ID'];
                                                $Employee_Name = $Row['Employee_Name'];
                                                $Employee_MiddleName = $Row['Employee_MiddleName'];
                                                $Employee_LastName = $Row['Employee_LastName'];
                                                $Employee_Addres = $Row['Employee_Addres'];
                                                $Employee_HouseNumber = $Row['Employee_HouseNumber'];
                                                $Employee_PostalCode = $Row['Employee_Addres'];
                                                $Employee_TownShip = $Row['Employee_Addres'];
                                                $Employee_Email = $Row['Employee_Addres'];
                                                $Employee_PhoneNumber = $Row['Employee_Addres'];
                                                $Employee_DateOfBirth = $Row['Employee_Addres'];

                                                // begin row
                                                echo "<tr class='inner-box'>" .
                                                "<th scope='row'>" .
                                                // event-date is the styling for the id 
                                                    "<div class='event-date'>" .
                                                        $Employee_ID .
                                                    "</div>" .
                                                "</th>" .
                                                //name
                                                "<td>" .
                                                    "<div class='event-wrap'>" .
                                                        "<h4>" . "<a href='#'>" . $Employee_Name . "</a>" . "</h4>" .
                                                    "</div>" .
                                                "</td>" .
                                                //middlename
                                                "<td>" .
                                                    "<div class='r-no'>" .
                                                    $Employee_MiddleName .
                                                    "</div>" .
                                                "</td>" .
                                                "<td>" .
                                                    "<div class='r-no'>" .
                                                    $Employee_LastName .
                                                    "</div>" .
                                                "</td>" .
                                                "<td>" .
                                                    "<div class='r-no'>" .
                                                    $Employee_Addres .
                                                    "</div>" .
                                                "</td>" .
                                                "<td>" .
                                                    "<div class='r-no'>" .
                                                    $Employee_HouseNumber .
                                                    "</div>" .
                                                "</td>" .
                                                "<td>" .
                                                    "<div class='r-no'>" .
                                                    $Employee_PostalCode .
                                                    "</div>" .
                                                "</td>" .
                                                "<td>" .
                                                    "<div class='r-no'>" .
                                                    $Employee_TownShip .
                                                    "</div>" .
                                                "</td>" .
                                                "<td>" .
                                                    "<div class='r-no'>" .
                                                    $Employee_Email .
                                                    "</div>" .
                                                "</td>" .
                                                "<td>" .
                                                    "<div class='r-no'>" .
                                                    $Employee_PhoneNumber .
                                                    "</div>" .
                                                "</td>" .
                                                "<td>" .
                                                    "<div class='r-no'>" .
                                                    $Employee_DateOfBirth .
                                                    "</div>" .
                                                "</td>" .
                                                "<td>" .
                                                 "<div class='btn-group'>" .
                                                     "<a class='btn btn-secondary' href='view-employee.php?id=" . $Employee_ID . "''>" . "wijzig " . "</a>" .
                                                     "<a class='btn btn-secondary' href='../../includes/delete-employee-include.php?id=" . $Employee_ID . "''>" . " verwijder" . "</a>" .
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
                                    
