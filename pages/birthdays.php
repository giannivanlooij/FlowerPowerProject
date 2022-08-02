<table class="table">
    <thead>
        <tr>
            <th scope="col">Naam</th>
            <th scope="col">achternaam</th>
            <th scope="col">Geboortedatum</th>
        </tr>
    </thead>
    <tbody>
        <?php
                //query succesfully gets the birthday if it is equal to the current date
                
        
            $sql = "SELECT * FROM customers
            WHERE MONTH(Customer_DateOfBirth) = MONTH(CURDATE())
            AND Day(Customer_DateOfBirth) = Day(CURDATE())";


            $Result = mysqli_query($conn, $sql);
            $ResultCheck = mysqli_num_rows($Result);

            // make a join with customers for the name of the customer
            //and a join for the name/location of the flowershop

            if ($ResultCheck > 0) {
                while ($Row = mysqli_fetch_assoc($Result)) {
                    //defined variables
                    $Customer_Name = $Row['Customer_Name'];
                    $Customer_LastName = $Row['Customer_LastName'];
                    $Customer_DateOfBirth = $Row['Customer_DateOfBirth'];
                    
                    

                    // begin row
                    echo "<tr class='inner-box'>" .
                    "<th scope='row'>" .
                    // event-date is the styling for the invoice id 
                        "<div class='event-date'>" .
                        $Customer_Name .
                        "</div>" .
                    "</th>" .
                    //order date
                    "<td>" .
                        "<div class='r-no'>" .
                            $Customer_LastName .
                        "</div>" .
                    "</td>" .
                    //customer name
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