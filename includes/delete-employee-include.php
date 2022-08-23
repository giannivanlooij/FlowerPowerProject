<?php
include_once "databasehandler-include.php";

if (isset($_GET['id'])) {
    $Employee_ID = $_GET['id'];
    $DeleteQuery="DELETE FROM employees WHERE Employee_ID=$Employee_ID;";
    $Delete =  mysqli_query($conn, $DeleteQuery);

    if ($Delete) {
        echo "deleted";
        header("location: ../pages/employees/employees.php?Deleted");
        Exit();
    }else{
        die(mysqli_error($conn));
    }
}

?>