<?php
   session_start();
   include_once "../../includes/databasehandler-include.php";
   $total = 0;
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
<form action='../../includes/shoppingcart-handler.php?action=checkout' method='post'>
  <table class="table">
      <div class="layout-inline th">
        <div class="col"></div>
        <div class="col">Producten</div>
        <div class="col">Aantal</div>
        <div class="col">Prijs</div>
        <div class="col">opties</div>
        <div class="col"></div>
      </div>
      <tbody>
          <?php
          if (isset($_GET['action'])) {

             if ($_GET['action'] == 'delete') {
              
              foreach($_SESSION['AddedToCart'] as $Keys => $Values)
              {
                if ($Values['Product_ID'] == $_GET['id']) 
                {  
                  unset($_SESSION['AddedToCart'] [$Keys]);
                  header('location: shopping-cart.php');
                }
              }

            }
            
          }
          if (!empty($_SESSION['AddedToCart'])) {
            foreach($_SESSION['AddedToCart'] as $Keys => $Values) {
              $total += $Values['Product_Quantity'] * $Values['Product_price'];
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
                  "<a class='btn btn-secondary' href='shopping-cart.php?action=delete&id=" . $Values['Product_ID'] . "''>" . "verwijder " . "</a>" .
                "</div>" .
              "</div>" .
            "</div>";

          };

        };
          
              
          ?>
      </tbody>
      <label style='font-size:15px; margin-left:5px;' for="Flowershop" class="col-md-4 col-form-label text-md-end"><b>Ophaal adress:</b></label>
      <dropdown>
      <SELECT id ='FlowerShopAddres' name='FlowerShopAddres'>
        <?php
                $FlowerShopQuery = "SELECT * FROM flowershops;";
                $FlowerShopResult = mysqli_query($conn, $FlowerShopQuery);
                $FlowerShopResultCheck = mysqli_num_rows($FlowerShopResult); 

                if ($FlowerShopResultCheck > 0) {
                    while ($Row = mysqli_fetch_assoc($FlowerShopResult)) {
                        //defined variables
                        $FlowerShop_ID = $Row['FlowerShop_ID'];
                        $FlowerShop_Addres = $Row['FlowerShop_Addres'];
                        
                        
                        echo "<option value=$FlowerShop_ID>$FlowerShop_Addres</option>";

                        
                    }
                }
            ?>
      </SELECT>
      </dropdown>
  </table>        
  
</div>
<div  class="tf">
  <div  class="row layout-inline ">
    <div class="col"><p>Totaal:</p></div>
    <div class="col"></div> <!-- SPACE-->
    <div class="col col-price col-numeric align-center "><?php echo number_format($total,2); ?></div>
  </div>
</div>         
<button type='submit' class="btn btn-update">Bestel</button>
</form>



                      


