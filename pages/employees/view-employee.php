<?php
session_start();

$Employee_ID = $_SESSION['Employee_ID'];


if (!isset($_GET['id'])) {
    die('id not provided');
}
    include_once "../../includes/databasehandler-include.php";

    
     $ID = $_GET['id'];
     // this piece of code makes sure no one but the emplyee himself can change his settings
     
    // if ($Employee_ID != $ID) {
    //     header('location: ../../dashboard.php?sessionnotset');
    //}
    $sql = "SELECT * FROM employees where Employee_ID = $ID;";
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
        <a rel="shortcut icon" type="" href= "../../images/favicon.png"></a>
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
                        <form action="../../includes/update-employee-include.php?id=<?= $ID; ?> " method="POST">
                            <!-- name -->
                            <div class="row mb-3">
                                <label for="Employee_Name" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="Employee_Name" type="text" class="form-control" name="Employee_Name" placeholder="Naam" required value="<?= $Data['Employee_Name']; ?>">
                                </div>
                            </div>
                            <!-- middle name -->
                            <div class="row mb-3">
                                <label for="Employee_MiddleName" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="Employee_MiddleName" type="text" class="form-control" name="Employee_MiddleName" placeholder="Tussenvoegsels" value="<?= $Data['Employee_MiddleName']; ?>">
                                </div>
                            </div>
                            <!-- last name -->
                            <div class="row mb-3">
                                <label for="Employee_LastName" class="col-md-4 col-form-label text-md-end"></label>

                                <div class="col-md-6">
                                    <input id="Employee_LastName" type="text" class="form-control" name="Employee_LastName" placeholder="Achternaam" required value="<?= $Data['Employee_LastName']; ?>">                              
                                </div>
                            </div>
                            <!-- addres -->
                            <div class="row mb-3">
                                <label for="Employee_Addres" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="Employee_Addres" type="text" class="form-control" name="Employee_Addres" placeholder="Addres" required value="<?= $Data['Employee_Addres']; ?>">
                                </div>
                            </div>
                            <!-- house number -->
                            <div class="row mb-3">
                                <label for="Employee_HouseNumber" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="Employee_HouseNumber" type="number" class="form-control" name="Employee_HouseNumber" placeholder="Huisnummer" required value="<?= $Data['Employee_HouseNumber']; ?>">
                                </div>
                            </div>
                            <!-- postalcode -->
                            <div class="row mb-3">
                                <label for="Employee_PostalCode" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="Employee_PostalCode" type="text" class="form-control" name="Employee_PostalCode" placeholder="Postcode" required value="<?= $Data['Employee_PostalCode']; ?>">    
                                </div>
                            </div>
                            <!-- township -->
                            <div class="row mb-3">
                                <label for="Employee_TownShip" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="Employee_TownShip" type="text" class="form-control" name="Employee_TownShip" placeholder="Plaats" required value="<?= $Data['Employee_TownShip']; ?>">                                   
                                </div>
                            </div>
                            <!-- Email -->
                            <div class="row mb-3">
                                <label for="Employee_Email" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="Employee_Email" type="email" class="form-control" name="Employee_Email" placeholder="Email" required value="<?= $Data['Employee_Email']; ?>">          
                                </div>
                            </div>
                            <!-- password -->
                            <div class="row mb-3">
                                <label for="Employee_Password" class="col-md-4 col-form-label text-md-end"></label>

                                <div class="col-md-6">
                                    <input id="Employee_Password" type="password" class="form-control" name="Employee_Password" placeholder="Wachtwoord" required>     
                                </div>
                            </div>
                            <!-- password confirmation -->
                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Herhaal wachtwoord" required >
                                </div>
                            </div>
                            <!-- phone number -->
                            <div class="row mb-3">
                                <label for="Employee_PhoneNumber" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="Employee_PhoneNumber" type="text" class="form-control" name="Employee_PhoneNumber" placeholder="Telefoonnummer" required value="<?= $Data['Employee_PhoneNumber']; ?>"> 
                                </div>
                            </div>
                            <!-- date of birth -->
                            <div class="row mb-3">
                                <label for="Employee_DateOfBirth" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <input id="Employee_DateOfBirth" type="date" class="form-control" name="Employee_DateOfBirth" placeholder="{{ old('Employee_DateOfBirth') }}" required value="<?= $Data['Employee_DateOfBirth']; ?>">
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
