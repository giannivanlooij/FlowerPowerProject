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
    $sql = "SELECT * FROM products where Product_ID = $ID;";
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
                        <form method="POST" action="../../includes/update-product-include.php?id=<?= $ID; ?> " enctype="multipart/form-data">
                            <!-- product image -->
                            <div class="row mb-3">
                                <label for="Product_Image" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="Product_Image" placeholder="upload plaatje" >
                                </div>
                            </div>
                            <!-- product name -->
                            <div class="row mb-3">
                                <label for="Product_Name" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="Product_Name" type="text" class="form-control" name="Product_Name" placeholder="Product naam" required value="<?= $Data['Product_Name']; ?>">
                                </div>
                            </div>
                            <!-- description  -->
                            <div class="row mb-3">
                                <label for="Product_Description" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="Product_Description" type="text" class="form-control" name="Product_Description" placeholder="Beschrijving" required value="<?= $Data['Product_Description']; ?>">
                                </div>
                            </div>
                            <!-- price -->
                            <div class="row mb-3">
                                <label for="Product_Price" class="col-md-4 col-form-label text-md-end"></label>

                                <div class="col-md-6">
                                    <input id="Product_Price" type="text" class="form-control" name="Product_Price" placeholder="Prijs" required value="<?= $Data['Product_Price']; ?>">                              
                                </div>
                            </div>
                            <!-- Stock -->
                            <div class="row mb-3">
                                <label for="Product_Stock" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="Product_Stock" type="number" class="form-control" name="Product_Stock" placeholder="Voorraad aantal" required value="<?= $Data['Product_Stock']; ?>">
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
