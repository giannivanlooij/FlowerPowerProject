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
  
  <div class="cart transition is-open">
    
    
    
    <div class="table">
      
      <div class="layout-inline row th">
        <div class="col col-pro">Producten</div>
        <div class="col col-price align-center "> 
          Prijs
        </div>
      </div>
      
      <div class="layout-inline row">
        
        <div class="col col-pro layout-inline">
          <img src="../../images/productimages/1658062437p2.png" alt="kitten" />
          <p>Bloem 1</p>
        </div>
        
        <div class="col col-price col-numeric align-center ">
          <p>€10.99</p>
        </div>
      </div>
      
      <div class="layout-inline row row-bg2">

        <div class="col col-pro layout-inline">
           <img src="../../images/productimages/1658062336p1.png" alt="kitten" /> 
          <p>Bloem 2</p>
        </div>
        
        <div class="col col-price col-numeric align-center ">
          <p>€10.50</p>
        </div>

        
        
        
      
      </div>
      
       <div class="layout-inline row">
        
        <div class="col col-pro layout-inline">
           <img src="../../images/productimages/1658837830825474895754938.png" alt="kitten" /> 
          <p>Boeket</p>
        </div>
        
        <div class="col col-price col-numeric align-center ">
          <p>€25.00</p>
        </div>

        
      </div>
  
       <div class="tf">
         
         
          <div class="row layout-inline">
           <div class="col">
             <p>Totaal:</p>
           </div>
           <div class="col"></div>
           <div class="col col-price col-numeric align-center ">
          <p>€46.49</p>
        </div>
         </div>
       </div>         
  </div>
    
    <a href="../../index.php" class="btn btn-update">Bestel</a>
  
</div>