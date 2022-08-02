<?php




if (isset($_POST['submit'])) {
   $FlowerShop_Addres = $_POST["FlowerShop_Addres"];
   $FlowerShop_PostalCode = ucwords($_POST["FlowerShop_PostalCode"]);
   $FlowerShop_TownShip = $_POST["FlowerShop_TownShip"];
   $FlowerShop_PhoneNumber = $_POST["FlowerShop_PhoneNumber"];
   $FlowerShop_Email = $_POST["FlowerShop_Email"];
   
   


   require_once 'databasehandler-include.php';
   require_once 'functions-include.php';

   
   
    

   


//    if (EmptyInputFieldFlowerShop($FlowerShop_Name, $FlowerShop_Description, $FlowerShop_Price, $FlowerShop_Stock) !== False) {
//     header("location: ../index.php?error=emptyinput");
//     Exit();
//     }
   

//    if (FlowerShopExists($conn, $FlowerShop_Name) !== False) {
//     header("location: ../index.php?error=FlowerShopalreadylisted");
//     Exit();
//    }

//    CreateFlowerShop($conn, $FlowerShop_Name, $FlowerShop_Description, $FlowerShop_Price, $FlowerShop_Stock, $Target_Location);

}
else {
    header("location: ../dashboard.php?error=nothingposted");
    Exit();
}