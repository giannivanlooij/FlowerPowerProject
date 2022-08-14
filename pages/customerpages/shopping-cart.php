<?php
   session_start();
   include_once "../../includes/databasehandler-include.php"
?>

<head> 
    <link rel="stylesheet" href="../../css/allpages/shopping-cart.css">
    <link rel="icon" type="image/png" href="../../images/favicon.png">
</head>
<div class="container">
  <div class="heading">
    <h1>
      Shopping Cart
    </h1>
  </div>

  <table class="table">
      <div class="layout-inline  th">
        <div class="col"></div>
        <div class="col">Producten</div>
        <div class="col">Aantal</div>
        <div class="col">Prijs</div>
        <div class="col">opties</div>
        <div class="col"></div>
      </div>
      <tbody>
          <?php
          
              $sql = "SELECT * FROM products ORDER BY Product_ID ASC;";
              $Result = mysqli_query($conn, $sql);
              $ResultCheck = mysqli_num_rows($Result);

              if ($ResultCheck > 0) {
                  while ($Row = mysqli_fetch_array($Result)) {
                      //defined variables
                      $Product_ID = $Row['Product_ID'];
                      // $Customer_ID = $Row['Customer_ID'];
                      // $Invoice_Date = $Row['Invoice_Date'];
                      // $Invoice_OrderPickedUp = $Row['Invoice_OrderPickedUp'];
                      // $Employee_ID = $Row['Employee_ID'];
                      // $FlowerShop_ID = $Row['FlowerShop_ID'];

                      echo 
                      "<div class='layout-inline row'>" .
                        // item row
                        "<div class='col'>" .
                          "<img src='../../images/productimages/1658062437p2.png' />" .
                        "</div>" .

                        "<div class='col'>" .
                          "<p>geel boeket</p>" .
                        "</div>" .

                        "<div class='col'>" .
                          "<p>2</p>" .
                        "</div>" .

                        "<div class='col'>" .
                          "<p>$50</p>" .
                        "</div>" .

                        "<div class='col'>" .
                          "<a style='margin-top:5px;' class='btn btn-secondary' href='../../includes/nothing.php?id=" . $Product_ID . "''>" . " verwijder" . "</a>" .
                        "</div>" .
                      "</div>" .
                    "</div>";
                  }
              }
          ?>
      </tbody>
  </table>
  

    
    
  
      


      
      
        <div class="col col-price col-numeric align-center ">
          <p>€10.99</p>
        </div>
      </div>
      
      <!-- <div class="layout-inline row row-bg2">
        <div class="col col-pro layout-inline">
           <img src="../../images/productimages/1658062336p1.png" alt="kitten" /> 
          <p>Bloem 2</p>
        </div>
        
        <div class="col col-price col-numeric align-center ">
          <p>€10.50</p>
        </div>
      </div> -->
      
       <!-- <div class="layout-inline row">
        <div class="col col-pro layout-inline">
           <img src="../../images/productimages/1658837830825474895754938.png" alt="kitten" /> 
           <p>Boeket</p>
        </div>
        <div class="col col-price col-numeric align-center ">
           <p>€25.00</p>
        </div>
      </div> -->
  
       <div style=" height:65px; margin-bottom:5px;" class="tf">
          <div style="position:absolute;" class="row layout-inline ">
           <div class="col"><p>Totaal:</p></div>
            <div class="col"></div> <!-- SPACE-->
           <div class="col col-price col-numeric align-center "><p>€46.49</p></div>
         </div>
       </div>         
    
    <a href="../../index.php" class="btn btn-update">Bestel</a>
  
</div>


