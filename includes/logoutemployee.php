<?php

 session_start();
 session_destroy();
 unset($_SESSION['Employee_ID']);
 header('location:../dashboard.php');

