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
          if (!empty($_SESSION['AddedToCart'])) {

            $total = 0;
            foreach($_SESSION['AddedToCart'] as $keys => $Values) {
              echo 
            "<div class='layout-inline row'>" .
                // item row
                "<div class='col'>" .
                "<img src='"  . "../" .  $Values['Product_Image'] . "'/>" . 
                "</div>" .
               //product
                "<div class='col'>" .
                   $Values['Product_Name'].
                "</div>" .
              //quantity
                "<div class='col'>" .
                  $Values['Product_Quantity'].
                "</div>" .
              //price
                "<div class='col'>" .
                  $Values['Product_price'].
                "</div>" .
              //options
                "<div class='col'>" .
                  "<a style='margin-top:5px;' class='btn btn-secondary' href='../../includes/nothing.php?id=''>" . " verwijder" . "</a>" .
                "</div>" .
              "</div>" .
            "</div>";

          };

        };
          
              
          ?>
      </tbody>
  </table>
  

    
    
  
      


      
      
        <div class="col col-price col-numeric align-center ">
          <p>€10.99</p>
        </div>
      </div>
      
    
  
       <div  class="tf">
          <div  class="row layout-inline ">
           <div class="col"><p>Totaal:</p></div>
            <div class="col"></div> <!-- SPACE-->
           <div class="col col-price col-numeric align-center "><p>€46.49</p></div>
         </div>
       </div>         
    
    <a href="../../index.php" class="btn btn-update">Bestel</a>
  
</div>



                      


