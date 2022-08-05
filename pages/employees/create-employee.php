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
                        <form action="../../includes/create-employee-include.php" method="POST">
                            <!-- employee name -->
                            <div class="row mb-3">
                                <label for="Employee_Name" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input minlength="3" id="Employee_Name" type="text" class="form-control" name="Employee_Name" placeholder="Naam" required autocomplete="Product_Name" autofocus>
                                </div>
                            </div>
                            <!-- Employee MiddleName  -->
                            <div class="row mb-3">
                                <label for="Employee_MiddleName" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="Employee_MiddleName" type="text" class="form-control" name="Employee_MiddleName" placeholder="Tussenvoegsels"  autofocus>
                                </div>
                            </div>
                            <!-- Employee LastName -->
                            <div class="row mb-3">
                                <label for="Employee_LastName" class="col-md-4 col-form-label text-md-end"></label>

                                <div class="col-md-6">
                                    <input minlength="3" id="Employee_LastName" type="text" class="form-control" name="Employee_LastName" placeholder="Achternaam" required autocomplete="Employee_LastName" autofocus>                              
                                </div>
                            </div>
                            <!-- Employee Addres -->
                            <div class="row mb-3">
                                <label for="Employee_Addres" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="Employee_Addres" type="text" class="form-control" name="Employee_Addres" placeholder="Adres" required autocomplete="Employee_Addres" autofocus>
                                </div>
                            </div>
                            <!-- Employee HouseNumber -->
                            <div class="row mb-3">
                                <label for="Employee_HouseNumber" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="Employee_HouseNumber" type="number" class="form-control" name="Employee_HouseNumber" placeholder="Huisnummer" required autocomplete="Employee_HouseNumber" autofocus>
                                </div>
                            </div>
                            <!-- Employee PostalCode -->
                            <div class="row mb-3">
                                <label for="Employee_PostalCode" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input maxlength="6" id="Employee_PostalCode" type="text" class="form-control" name="Employee_PostalCode" placeholder="Postcode" required autocomplete="Employee_PostalCode" autofocus>
                                </div>
                            </div>
                            <!-- Employee TownShip -->
                            <div class="row mb-3">
                                <label for="Employee_TownShip" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input minlength="2" id="Employee_TownShip" type="text" class="form-control" name="Employee_TownShip" placeholder="Plaats" required autocomplete="Employee_TownShip" autofocus>
                                </div>
                            </div>
                            <!-- Employee Email -->
                            <div class="row mb-3">
                                <label for="Employee_Email" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="Employee_Email" type="email" class="form-control" name="Employee_Email" placeholder="Email" required autocomplete="Employee_Email" autofocus>
                                </div>
                            </div>
                            <!-- password -->
                            <div class="row mb-3">
                                <label for="Employee_Password" class="col-md-4 col-form-label text-md-end"></label>

                                <div class="col-md-6">
                                    <input id="Employee_Password" type="password" class="form-control" name="Employee_Password" placeholder="Wachtwoord" required autocomplete="new-password">     
                                </div>
                            </div>
                            <!-- password confirmation -->
                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Herhaal wachtwoord" required autocomplete="new-password">
                                </div>
                            </div>
                            <!-- Employee PhoneNumber -->
                            <div class="row mb-3">
                                <label for="Employee_PhoneNumber" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="Employee_PhoneNumber" type="number" class="form-control" name="Employee_PhoneNumber" placeholder="Telefoonnummer" required autocomplete="Employee_PhoneNumber" autofocus>
                                </div>
                            </div>
                            <!-- date of birth -->
                            <div class="row mb-3">
                                <label for="Employee_DateOfBirth" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input  id="EmployeeDateOfBirth" type="date" class="form-control" name="Employee_DateOfBirth" placeholder="{{ old('Employee_DateOfBirth') }}" required autocomplete="Employee_DateOfBirth" autofocus>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button name="submit" type="submit" class="btn btn-primary">Registreer medewerker</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</html>
