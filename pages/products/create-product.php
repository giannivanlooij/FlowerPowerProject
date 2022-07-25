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
                        <form method="POST" action="../../includes/create-product-include.php" enctype="multipart/form-data">
                            <!-- product image -->
                            <div class="row mb-3">
                                <label for="Product_Image" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="Product_Image" placeholder="upload plaatje" autofocus>
                                </div>
                            </div>
                            <!-- product name -->
                            <div class="row mb-3">
                                <label for="Product_Name" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="Product_Name" type="text" class="form-control" name="Product_Name" placeholder="Product naam" required autocomplete="Product_Name" autofocus>
                                </div>
                            </div>
                            <!-- description  -->
                            <div class="row mb-3">
                                <label for="Product_Description" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="Product_Description" type="text" class="form-control" name="Product_Description" placeholder="Beschrijving" required autocomplete="Product_Description" autofocus>
                                </div>
                            </div>
                            <!-- price -->
                            <div class="row mb-3">
                                <label for="Product_Price" class="col-md-4 col-form-label text-md-end"></label>

                                <div class="col-md-6">
                                    <input id="Product_Price" type="text" class="form-control" name="Product_Price" placeholder="Prijs" required autocomplete="Product_Price" autofocus>                              
                                </div>
                            </div>
                            <!-- Stock -->
                            <div class="row mb-3">
                                <label for="Product_Stock" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="Product_Stock" type="number" class="form-control" name="Product_Stock" placeholder="Voorraad aantal" required autocomplete="Product_Stock" autofocus>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button name="submit" type="submit" class="btn btn-primary">voeg product toe</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</html>
