<?php
   session_start();
   include_once "../../includes/databasehandler-include.php"
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
    <!-- Register -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <form action="../../includes/register-include.php" method="POST">
                            <!-- name -->
                            <div class="row mb-3">
                                <label for="Customer_Name" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="Customer_Name"  type="text" class="form-control" name="Customer_Name" placeholder="Naam" required autocomplete="customer_name" autofocus >
                                </div>
                            </div>
                            <!-- middle name -->
                            <div class="row mb-3">
                                <label for="Customer_MiddleName" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="Customer_MiddleName" type="text" class="form-control" name="Customer_MiddleName" placeholder="Tussenvoegsels"  autocomplete="customer_Middlename" autofocus>
                                </div>
                            </div>
                            <!-- last name -->
                            <div class="row mb-3">
                                <label for="Customer_LastName" class="col-md-4 col-form-label text-md-end"></label>

                                <div class="col-md-6">
                                    <input id="Customer_LastName" type="text" class="form-control" name="Customer_LastName" placeholder="Achternaam" required autocomplete="Customer_LastName" autofocus>                              
                                </div>
                            </div>
                            <!-- addres -->
                            <div class="row mb-3">
                                <label for="Customer_Addres" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="Customer_Addres" type="text" class="form-control" name="Customer_Addres" placeholder="Addres" required autocomplete="Customer_Addres" autofocus>
                                </div>
                            </div>
                            <!-- house number -->
                            <div class="row mb-3">
                                <label for="Customer_HouseNumber" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="Customer_HouseNumber" type="number" class="form-control" name="Customer_HouseNumber" placeholder="Huisnummer" required autocomplete="Customer_HouseNumber" autofocus>
                                </div>
                            </div>
                            <!-- postalcode -->
                            <div class="row mb-3">
                                <label for="Customer_PostalCode" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="Customer_PostalCode" type="text" class="form-control" name="Customer_PostalCode" placeholder="Postcode" required autocomplete="Customer_PostalCode" autofocus>    
                                </div>
                            </div>
                            <!-- township -->
                            <div class="row mb-3">
                                <label for="Customer_TownShip" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="Customer_TownShip" type="text" class="form-control" name="Customer_TownShip" placeholder="Plaats" required autocomplete="Customer_TownShip" autofocus>                                   
                                </div>
                            </div>
                            <!-- Email -->
                            <div class="row mb-3">
                                <label for="Customer_Email" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="Customer_Email" type="email" class="form-control" name="Customer_Email" placeholder="Email"  autocomplete="Customer_Email">          
                                </div>
                            </div>
                            <!-- password -->
                            <div class="row mb-3">
                                <label for="Customer_Password" class="col-md-4 col-form-label text-md-end"></label>

                                <div class="col-md-6">
                                    <input id="Customer_Password" type="password" class="form-control" name="Customer_Password" placeholder="Wachtwoord" required autocomplete="new-password">     
                                </div>
                            </div>
                            <!-- password confirmation -->
                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Herhaal Wachtwoord" required autocomplete="new-password">
                                </div>
                            </div>
                            <!-- phone number -->
                            <div class="row mb-3">
                                <label for="Customer_PhoneNumber" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="Customer_PhoneNumber" type="text" class="form-control" name="Customer_PhoneNumber" placeholder="Telefoonnummer" required autocomplete="Customer_PhoneNumber" autofocus> 
                                </div>
                            </div>
                            <!-- date of birth -->
                            <div class="row mb-3">
                                <label for="Customer_DateOfBirth" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="Customer_DateOfBirth" type="date" class="form-control" name="Customer_DateOfBirth" placeholder="{{ old('Customer_DateOfBirth') }}" required autocomplete="Customer_DateOfBirth" autofocus>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button name="submit" type="submit" class="btn btn-primary">Registreer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</html>
