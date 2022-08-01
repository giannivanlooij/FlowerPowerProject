<?php
   session_start();
   include_once "includes/databasehandler-include.php";
?>


<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <!-- image directory --> 
      <a rel="shortcut icon" type="" href= "/images/favicon.png"></a>
      <title>FlowerPower</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href= "css/home/bootstrap.css">
      <!-- font awesome style -->
      <link rel="stylesheet" href= "css/home/font-awesome.min.css">
      <!-- Custom styles for this template -->
      <link rel="stylesheet" href= "css/home/style.css">
      <!-- responsive style -->
      <link rel="stylesheet" href= "css/home/responsive.css">
      <!-- reset for the css in the browser-->
      <link rel="stylesheet" href= "css/reset.css">
   </head>
   <body>
      <div class="hero_area">
       <!-- header section strats -->
         <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="index.php"><img width="250" src="images/logo.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="pages/customerpages/about.php">Over ons</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="pages/customerpages/productpage.php">Producten</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="pages/customerpages/contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="pages/customerpages/shopping-cart.php">
                              <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                                 <g>
                                    <g>
                                       <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                                          c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                                    </g>
                                 </g>
                                 <g>
                                    <g>
                                       <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                                          C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                                          c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                                          C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                    </g>
                                 </g>
                                 <g>
                                    <g>
                                       <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                                          c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                    </g>
                                 </g>
                                 
                              </svg>
                           </a>
                        </li>
                        <?php
                           if (isset($_SESSION['Customer_ID'])) {

                              $ID = $_SESSION['Customer_ID'];
                              $Name = $_SESSION['Customer_Name'];


                              echo 
                              "<li style='margin-right: 25px;' class='nav-item'>" .
                                 "<h1>Welcome {$Name}</h1>" .
                              "</li>";
                              echo 
                              "<li style='margin-right: 8px;' class='nav-item'>" .
                                 "<form class='form-inline' >" .
                                    "<a class='btn btn-primary' href='pages/customers/view-customer.php?id=$ID' role='button'>profile</a>" .
                                 "</form>" .
                              "</li>";
                              echo
                              "<li class='nav-item'>" .
                                 "<form class='form-inline' >" .
                                    "<a class='btn btn-primary' href='includes/logoutuser.php' role='button'>logout</a>" .
                                 "</form>" .
                              "</li>";
                           }else {
                              echo 
                              "<li class='nav-item'>" .
                                 "<form class='form-inline' >" .
                                    "<a class='btn btn-primary' href='pages/customerpages/login.php' role='button'>login</a>" .
                                 "</form>" .
                              "</li>";
                              echo
                              "<li class='nav-item'>" .
                                 "<form class='form-inline' >" .
                                    "<a class='btn btn-primary' href='pages/customerpages/register.php' role='button'>registreer</a>" .
                                 "</form>" .
                              "</li>";

                           }
                           
                        ?>
                     </ul>
                  </div>
               </nav>
            </div>
         </header>
         <!-- end header section -->

         <!-- slider section -->
         <section class="slider_section ">
            <div class="slider_bg_box">
               <img src="images/slider-bg.jpg" alt="">
            </div>
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="container ">
                        <div class="row">
                           <div class="col-md-7 col-lg-6 ">
                              <div class="detail-box">
                                 <h1>
                                    <span>
                                    Voorbeeld
                                    </span>
                                    <br>
                                    voorbeeld
                                 </h1>
                                 <p>
                                    Explicabo esse amet tempora quibusdam laudantium, laborum eaque magnam fugiat hic? Esse dicta aliquid error repudiandae earum suscipit fugiat molestias, veniam, vel architecto veritatis delectus repellat modi impedit sequi.
                                 </p>
                                 <div class="btn-box">
                                    <a href="" class="btn1">
                                    voorbeeld
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item ">
                     <div class="container ">
                        <div class="row">
                           <div class="col-md-7 col-lg-6 ">
                              <div class="detail-box">
                                 <h1>
                                    <span>
                                    Sale
                                    </span>
                                    <br>
                                    3de boeket gratis
                                 </h1>
                                 <p>
                                    Explicabo esse amet tempora quibusdam laudantium, laborum eaque magnam fugiat hic? Esse dicta aliquid error repudiandae earum suscipit fugiat molestias, veniam, vel architecto veritatis delectus repellat modi impedit sequi.
                                 </p>
                                 <div class="btn-box">
                                    <a href="pages/product.php" class="btn1">
                                    Bekijk Producten
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="container ">
                        <div class="row">
                           <div class="col-md-7 col-lg-6 ">
                              <div class="detail-box">
                                 <h1>
                                    
                                    <br>
                                    Word lid
                                 </h1>
                                 <p>
                                    wordt lid en krijg 10% korting op uw eerste bestelling.
                                 </p>
                                 <div class="btn-box">
                                    <a href="pages/register.php" class="btn1">
                                    Registreer nu
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="container">
                  <ol class="carousel-indicators">
                     <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                     <li data-target="#customCarousel1" data-slide-to="1"></li>
                     <li data-target="#customCarousel1" data-slide-to="2"></li>
                  </ol>
               </div>
            </div>
         </section>
         <!-- end slider section -->
      </div>
      <!-- product section -->
      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  onze <span>producten</span>
               </h2>
            </div>
            <div class="row">
            <?php
                  $sql = "SELECT * FROM products LIMIT 6;";
                  $Result = mysqli_query($conn, $sql);
                  $ResultCheck = mysqli_num_rows($Result);

                  if ($ResultCheck > 0) {
                     while ($Row = mysqli_fetch_assoc($Result)) {
                        
                  // card 
                           echo "<div class='col-sm-6 col-md-4 col-lg-4'>" .
                                 "<div class='box'>" .
                  //hover over card options/
                                    "<div class='option_container'>" .
                                       "<div class='options'>".
                                          "<a href='' class='option1'>" . 'voeg toe' . "</a>" .
                                          "<a href='shopping-cart.php' class='option2'>" . 'koop nu' . "</a>" .
                                       "</div>".
                                    "</div>" .
                                    "<div class='img-box'>" . 
                                       "<img src='"  . "Images/" .  $Row['Product_ImgLocation'] . "'/>" . 
                                    "</div>" .
                                    "<div class='detail-box'>" .
                  //item or product name
                                       "<h5>" . $Row['Product_Name'] . "</h5>".
                  //price
                                       "<h6>" . $Row['Product_Price'] . "</h6>".
                                    "</div>" . 
                                 "</div>" .
                              "</div>";
                  //end card
                     }
                  }
                  
               ?>
            <div style = "margin-left: 480px;" class="btn-box">
               <a href="pages/customerpages/productpage.php"> Alle producten </a>
            </div>
         </div>
      </section>
      <!-- end product section -->

      
      <!-- footer start -->
      <footer>
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                   <div class="full">
                      <div class="logo_footer">
                        <a href="#"><img width="210" src="images/logo.png" alt="#" /></a>
                      </div>
                      
                   </div>
               </div>
               <div  class="col-md-8">
                  <div class="row">
                  <div class="col-md-7">
                     <div class="row">
                        <div class="col-md-6">
                     <div class="widget_menu">
                        <h3>Menu</h3>
                        <ul>
                           <li><a href="#">Home</a></li>
                           <li><a href="#">Over ons</a></li>
                           <li><a href="#">Producten</a></li>
                           <li><a href="#">Reviews</a></li>
                           <li><a href="#">Contact</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="widget_menu">
                        <h3>Account</h3>
                        <ul>
                           <li><a href="#">Account</a></li>
                           <li><a href="#">Winkelwagen</a></li>
                           <li><a href="#">Login</a></li>
                           <li><a href="#">Registreer</a></li>
                           <li><a href="#">Shopping</a></li>
                        </ul>
                     </div>
                  </div>
                     </div>
                  </div>     
                  </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- footer end -->
      <!-- jQery -->
      <script src="js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
   </body>
</html>
