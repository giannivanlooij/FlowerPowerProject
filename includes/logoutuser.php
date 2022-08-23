<?php

 session_start();
 session_destroy();
 unset($_SESSION['Customer_ID']);
 header('location:../index.php');

