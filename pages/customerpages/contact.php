<?php
   session_start();
   include_once "../../includes/databasehandler-include.php";
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
      <link rel="icon" type="image/png" href="../../images/favicon.png">
      <!-- <link rel="shortcut icon" href="../../images/favicon.png" type=""> -->
      <title>FlowerPower</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="../../css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="../../css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="../../css/responsive.css" rel="stylesheet" />
   </head>
   <body class="sub_page">
      <div class="hero_area">
         <!-- header section strats -->
         <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="../../index.php"><img width="250" src="../../images/logo.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item">
                           <a class="nav-link" href="../../index.php">Home</a>   
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="about.php">Over ons</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="productpage.php">Producten</a>
                        </li>
                        <li class="nav-item active">
                           <a class="nav-link" href="contact.php">Contact <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="shopping-cart.php  ">
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
                                    </g></g>
                                 <g></g>
                                 <g></g>
                                 <g></g>
                                 <g></g>
                                 <g></g>
                                 <g></g>
                                 <g></g>
                                 <g></g>
                                 <g></g>
                                 <g></g>
                                 <g></g>
                                 <g></g>
                                 <g></g>
                                 <g></g>
                                 <g></g>
                              </svg>
                           </a>
                        </li>
                        <?php
                           if (isset($_SESSION['Customer_ID'])) {

                              $ID = $_SESSION['Customer_ID'];
                              $Name = $_SESSION['Customer_Name'];

                              if (isset($Count)) {
                                 $Count++;
                                 echo 
                                 "<li style='margin-right: 25px;' class='nav-item'>" .
                                    "<h5>{$Count}</h5>" .
                                 "</li>";
                              }
                              echo 
                              "<li style='margin-right: 25px;' class='nav-item'>" .
                                 "<h5>Welcome {$Name}</h5>" .
                              "</li>";
                              echo 
                              "<li style='margin-right: 8px;' class='nav-item'>" .
                                 "<form class='form-inline' >" .
                                    "<a class='btn btn-primary' href='change-settings.php?id=$ID' role='button'>profile</a>" .
                                 "</form>" .
                              "</li>";
                              echo 
                              "<li style='margin-right: 8px;' class='nav-item'>" .
                                 "<form class='form-inline' >" .
                                    "<a class='btn btn-primary' href='customerorders.php?id=$ID' role='button'>bestellingen</a>" .
                                 "</form>" .
                              "</li>";
                              echo
                              "<li class='nav-item'>" .
                                 "<form class='form-inline' >" .
                                    "<a class='btn btn-primary' href='../../includes/logoutuser.php' role='button'>logout</a>" .
                                 "</form>" .
                              "</li>";
                           }else {
                              echo 
                              "<li style='margin-right: 8px;' class='nav-item'>" .
                                 "<form class='form-inline' >" .
                                    "<a class='btn btn-primary' href='login.php' role='button'>login</a>" .
                                 "</form>" .
                              "</li>";
                              echo
                              "<li class='nav-item'>" .
                                 "<form class='form-inline' >" .
                                    "<a class='btn btn-primary' href='register.php' role='button'>registreer</a>" .
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
      </div>
      <!-- inner page section -->
      <section class="inner_page_head">
            <div class="container_fuild">
               <div class="row">
                  <div class="col-md-12">
                     <div class="full">
                        <h3>Contact</h3>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- end inner page section -->               
         <table class="table">
               <thead>
               <tr>
                     <th scope="col">adress</th>
                     <th scope="col">huisnummer</th>
                     <th scope="col">postcode</th>
                     <th scope="col">provincie</th>
                     <th scope="col">Telefoonnummer</th>
                     <th class="text-center" scope="col">Email</th>
               </tr>
            </thead>
            <tbody>
               <?php
                                                   
                     $sql = "SELECT * FROM flowershops;";
                     $Result = mysqli_query($conn, $sql);
                     $ResultCheck = mysqli_num_rows($Result);

                     if ($ResultCheck > 0) {
                        while ($Row = mysqli_fetch_assoc($Result)) {
                           //defined variables
                           
                           $FlowerShop_Addres = $Row['FlowerShop_Addres'];
                           $FlowerShop_HouseNumber = $Row['FlowerShop_HouseNumber'];
                           $FlowerShop_PostalCode = $Row['FlowerShop_PostalCode'];
                           $FlowerShop_TownShip = $Row['FlowerShop_TownShip'];
                           $FlowerShop_PhoneNumber = $Row['FlowerShop_PhoneNumber'];
                           $FlowerShop_Email = $Row['FlowerShop_Email'];

                           
                           // begin row
                           echo 
                           "<td>" .
                                 "<div class='r-no'>" . $FlowerShop_Addres . "</div>" .
                           "</td>" .
                           //housenumber
                           "<td>" .
                                 "<div class='r-no'>" .$FlowerShop_HouseNumber ."</div>" .
                           "</td>" .
                           //postalcode
                           "<td>" .
                                 "<div class='r-no'>" .$FlowerShop_PostalCode ."</div>" .
                           "</td>" .
                           //township
                           "<td>" .
                                 "<div class='r-no'>" . $FlowerShop_TownShip ."</div>" .
                           "</td>" .
                           //phonenumber
                           "<td>" .
                                 "<div class='r-no'>" . $FlowerShop_PhoneNumber . "</div>" .
                           "</td>" .
                           //email
                           "<td>" .
                                 "<div class='r-no'>" . $FlowerShop_Email . "</div>" .
                           "</td>" .
                           "</tr>";
                        }
                     }
               ?>
            </tbody>
         </table>
         <!-- footer start -->
         <footer>
            <div class="container">
               <div class="row">
                  <div class="col-md-4">
                     <div class="full">
                        <div class="logo_footer">
                           <a href="#"><img width="210" src="../../images/logo.png" alt="#" /></a>
                        </div>
                        
                     </div>
                  </div>
                  <div class="col-md-8">
                     <div class="row">
                  <div class="col-md-7">
                     <div class="row">
                        <div class="col-md-6">
                     <div class="widget_menu">
                        <h3>Menu</h3>
                        <ul>
                           <li><a href="#">Home</a></li>
                           <li><a href="#">About</a></li>
                           <li><a href="#">Services</a></li>
                           <li><a href="#">Testimonial</a></li>
                           <li><a href="#">Blog</a></li>
                           <li><a href="#">Contact</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="widget_menu">
                        <h3>Account</h3>
                        <ul>
                           <li><a href="#">Account</a></li>
                           <li><a href="#">Checkout</a></li>
                           <li><a href="#">Login</a></li>
                           <li><a href="#">Register</a></li>
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
            <!-- footer section -->
            <!-- jQery -->
            <script src="../../js/jquery-3.4.1.min.js"></script>
            <!-- popper js -->
            <script src="../../js/popper.min.js"></script>
            <!-- bootstrap js -->
            <script src="../../js/bootstrap.js"></script>
            <!-- custom js -->
            <script src="../../js/custom.js"></script>
    </body>
</html>


<!-- contact form --> 
<!--<form action="../includes/contactform.php">
   <fieldset>
      <input type="text" placeholder="Volledige naam " name="name" required />
      <input type="email" placeholder="Email" name="email" required />
      <input type="text" placeholder="Onderwerp" name="subject" required />
      <textarea placeholder="Bericht" name="message" required></textarea>
      <input name="submit" type="submit" value="Verstuur" />
   </fieldset>
</form> --> 
<!-- end contact form --> 
                             