<?php




if (isset($_POST['submit'])) {
   $FlowerShop_Addres = $_POST["FlowerShop_Addres"];
   $FlowerShop_PostalCode = ucwords($_POST["FlowerShop_PostalCode"]);
   $FlowerShop_TownShip = $_POST["FlowerShop_TownShip"];
   $FlowerShop_PhoneNumber = $_POST["FlowerShop_PhoneNumber"];
   $FlowerShop_Email = $_POST["FlowerShop_Email"];
   $FlowerShop_HouseNumber = $_POST["FlowerShop_HouseNumber"];
   
   


   require_once 'databasehandler-include.php';
   require_once 'functions-include.php';

   
   
    

   


    if (EmptyInputFieldFlowerShop($FlowerShop_Addres, $FlowerShop_HouseNumber, $FlowerShop_PostalCode, $FlowerShop_TownShip, $FlowerShop_PhoneNumber, $FlowerShop_Email) !== False) {
     header("location: ../index.php?error=emptyinput");
     Exit();
     }
   

    if (FlowerShopExists($conn, $FlowerShop_Addres, $FlowerShop_HouseNumber) !== False) {
     header("location: ../index.php?error=FlowerShopalreadylisted");
     Exit();
    }

    CreateFlowerShop($conn, $FlowerShop_Addres, $FlowerShop_HouseNumber, $FlowerShop_PostalCode, $FlowerShop_TownShip, $FlowerShop_PhoneNumber, $FlowerShop_Email);

}
else {
    header("location: ../dashboard.php?error=nothingposted");
    Exit();
}