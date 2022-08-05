<table class="table">
    <thead>
        <tr>
            <th scope="col">Naam</th>
            <th scope="col">Adress</th>
            <th scope="col">Postcode</th>
            <th scope="col">Plaats</th>
            <th scope="col">Geboortedatum</th>
        </tr>
    </thead>
    <tbody>
        <?php
            // query fetches the birthdays equal to today minus 2 daya
            $sql = "SELECT * FROM customers
            WHERE MONTH(Customer_DateOfBirth) = MONTH(CURDATE() - interval 0 day)
            AND Day(Customer_DateOfBirth) = Day(CURDATE() + interval -2 day)"; 

            

            


            $Result = mysqli_query($conn, $sql);
            $ResultCheck = mysqli_num_rows($Result);

            // make a join with customers for the name of the customer
            //and a join for the name/location of the flowershop

            if ($ResultCheck > 0) {
                while ($Row = mysqli_fetch_assoc($Result)) {
                    //defined variables
                    $Customer_Name = $Row['Customer_Name'];
                    $Customer_MiddleName = $Row['Customer_MiddleName'];
                    $Customer_LastName = $Row['Customer_LastName'];
                    $Customer_Addres = $Row['Customer_Addres'];
                    $Customer_PostalCode = $Row['Customer_PostalCode'];
                    $Customer_TownShip = $Row['Customer_TownShip'];
                    $Customer_DateOfBirth = $Row['Customer_DateOfBirth'];
                    
                    

                    // begin row
                    echo "<tr class='inner-box'>" .
                    "<th scope='row'>" .
                    // event-date is styling for the customer name
                        "<div class='event-date'>" .
                        $Customer_Name .' '. $Customer_MiddleName. " " . $Customer_LastName .
                        "</div>" .
                    "</th>" .
                    //addres
                    "<td>" .
                        "<div class='r-no'>" .
                            $Customer_Addres .
                        "</div>" .
                    "</td>" .
                    //postalcode
                    "<td>" .
                        "<div class='r-no'>" .
                            $Customer_PostalCode .
                        "</div>" .
                    "</td>" .
                    //township
                    "<td>" .
                        "<div class='r-no'>" .
                            $Customer_TownShip .
                        "</div>" .
                    "</td>" .
                    //date of birth
                    "<td>" .
                        "<div class='r-no'>" .
                        $Customer_DateOfBirth .
                        "</div>" .
                    "</td>" .
                    "</tr>";
                }
            }
        ?>
    </tbody>
</table>