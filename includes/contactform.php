<?php

if (isset($_POST['submit'])) {
    $Name = $_POST['name'];
    $Subject = $_POST['subject'];
    $MailFrom = $_POST['email'];
    $Message = $_POST['message'];

    $MailTo = "giannivanlooij@outlook.com";
    $Headers = "From:" . $MailFrom;
    $Txt = "You have received a email from " . $Name . ".\n\n". $Message;

    mail($MailFrom, $Subject, $Txt, $Headers);
    header("Location: index.php?mailsend");
}