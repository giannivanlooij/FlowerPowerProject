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
                "<div class='event-date'>" . $Row['Product_ID'] ."</div>" .
            "</th>" .
            //image
            "<td>" .
                "<div class='event-wrap'>" .
                    "<img width='50' height='50' src='" .'../' .  $Row['Product_ImgLocation'] . "'/>" .
                "</div>" .
            "</td>" .
            //name
            "<td>" .
                "<div class='event-wrap'>" .
                    "<h4>" . "<a href='#'>" . $Row['Product_Name'] . "</a>" . "</h4>" .
                "</div>" .
            "</td>" .
            //description
            "<td>" .
                "<div class='r-no'>" . $Row['Product_Description'] ."</div>" .
            "</td>" .

            "<td>" .
                "<div class='r-no'>" ."$".$Row['Product_Price'] . "</div>" .
            "</td>" .

            "<td>" .
                "<div class='r-no'>" . $Row['Product_Stock'] . "</div>" .
            "</td>" .
            "</tr>";
        }
    }
?>