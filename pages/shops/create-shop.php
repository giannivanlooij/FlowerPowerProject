<?php
    session_start();
    include_once "../../includes/databasehandler-include.php";
  
    if (!isset($_SESSION['Employee_ID'])) {
      header("location: ../loginemployee.php");
    }
    $Employee_ID = $_SESSION['Employee_ID'];
    $Name = $_SESSION['Employee_Name'];
  
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
        <a rel="shortcut icon" type="" href= "..//images/favicon.png"></a>
        <title>FlowerPower</title>
        <!-- bootstrap core css -->
        <link rel="stylesheet" type="text/css" href= "../../css/home/bootstrap.css">
        <!-- font awesome style -->
        <link rel="stylesheet" href= "../../css/home/font-awesome.min.css">
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href= "../../css/home/style.css">
        <!-- responsive style -->
        <link rel="stylesheet" href= "../../css/home/responsive.css">
    </head>


    <!-- add -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <form method="POST" action="../../includes/create-shop-include.php" enctype="multipart/form-data">
                            <!-- shop addres -->
                            <div class="row mb-3">
                                <label for="FlowerShop_Addres" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="FlowerShop_Addres" type="text" class="form-control" name="FlowerShop_Addres" placeholder="Winkel Adress" required> 
                                </div>
                            </div>
                            <!-- flowershop postalcode  -->
                            <div class="row mb-3">
                                <label for="FlowerShop_PostalCode" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="FlowerShop_PostalCode" type="text" class="form-control" name="FlowerShop_PostalCode" placeholder="winkel Postcode" required>
                                </div>
                            </div>
                            <!-- flowershop township -->
                            <div class="row mb-3">
                                <label for="FlowerShop_TownShip" class="col-md-4 col-form-label text-md-end"></label>

                                <div class="col-md-6">
                                    <input id="FlowerShop_TownShip" type="text" class="form-control" name="FlowerShop_TownShip" placeholder="Winkel Provincie" required>                              
                                </div>
                            </div>
                            <!-- flowershop phonenumber -->
                            <div class="row mb-3">
                                <label for="FlowerShop_PhoneNumber" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="FlowerShop_PhoneNumber" type="text" class="form-control" name="FlowerShop_PhoneNumber" placeholder="Winkel Telefoonnummer" required>
                                </div>
                            </div>
                            <!-- flowershop email -->
                            <div class="row mb-3">
                                <label for="FlowerShop_Email" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="FlowerShop_Email" type="text" class="form-control" name="FlowerShop_Email" placeholder="Winkel Email" required>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button name="submit" type="submit" class="btn btn-primary">Voeg winkel toe</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</html>
