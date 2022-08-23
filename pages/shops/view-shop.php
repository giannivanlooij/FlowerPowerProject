<?php
session_start();

$Employee_ID = $_SESSION['Employee_ID'];
$Name = $_SESSION['Employee_Name'];

if (!isset($_SESSION['Employee_ID'])) {
    header("location: ../loginemployee.php");
  }

  


if (!isset($_GET['id'])) {
    die('id not provided');
}
    include_once "../../includes/databasehandler-include.php";

    $ID = $_GET['id'];
    $sql = "SELECT * FROM flowershops where FlowerShop_ID = $ID;";
    $Result = mysqli_query($conn, $sql);
    if ($Result->num_rows != 1) {
        die('id not found');
    }
    $Data = mysqli_fetch_assoc($Result);

    
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
                        <form method="POST" action="../../includes/update-shop-include.php?id=<?= $ID; ?>">
                            <!-- FlowerShop Addres -->
                            <div class="row mb-3">
                                <label for="FlowerShop_Addres" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="FlowerShop_Addres" type="text" class="form-control" name="FlowerShop_Addres" placeholder="Winkel adress" required value="<?= $Data['FlowerShop_Addres']; ?>">
                                </div>
                            </div>
                            <!-- housenumber  -->
                            <div class="row mb-3">
                                <label for="FlowerShop_HouseNumber" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="FlowerShop_HouseNumber" type="text" class="form-control" name="FlowerShop_HouseNumber" placeholder="huisnummer" required value="<?= $Data['FlowerShop_HouseNumber']; ?>">
                                </div>
                            </div>
                            <!-- postalcode -->
                            <div class="row mb-3">
                                <label for="FlowerShop_PostalCode" class="col-md-4 col-form-label text-md-end"></label>

                                <div class="col-md-6">
                                    <input id="FlowerShop_PostalCode" type="text" class="form-control" name="FlowerShop_PostalCode" placeholder="postcode" required value="<?= $Data['FlowerShop_PostalCode']; ?>">                              
                                </div>
                            </div>
                            <!-- township -->
                            <div class="row mb-3">
                                <label for="FlowerShop_TownShip" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="FlowerShop_TownShip" type="text" class="form-control" name="FlowerShop_TownShip" placeholder="Winkel Plaats" required value="<?= $Data['FlowerShop_TownShip']; ?>">
                                </div>
                            </div>
                            <!-- FlowerShop_PhoneNumber -->
                            <div class="row mb-3">
                                <label for="FlowerShop_PhoneNumber" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="FlowerShop_PhoneNumber" type="text" class="form-control" name="FlowerShop_PhoneNumber" placeholder="Winkel Telefoonnummer" required value="<?= $Data['FlowerShop_PhoneNumber']; ?>">
                                </div>
                            </div>
                            <!-- email -->
                            <div class="row mb-3">
                                <label for="FlowerShop_Email" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="FlowerShop_Email" type="text" class="form-control" name="FlowerShop_Email" placeholder="Winkel email" required value="<?= $Data['FlowerShop_Email']; ?>">
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button name="EditForm" type="submit" class="btn btn-primary">Bewerk</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</html>
