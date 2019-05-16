<?php

require_once ("../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();

$objAuth = new \App\User\Auth();
$objAuth->setData($_POST);
$status = $objAuth->is_registered();


if($status){
    $_SESSION['email'] = $_POST['email'];
    header("Location: profile.php");
}
else{
    echo "Wrong Information! Pls try again...";
}

