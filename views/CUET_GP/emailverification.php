<?php

require_once ("../../vendor/autoload.php");
use App\User\User;

$objUser = new User();
$objUser->setData($_GET);
$singleUser = $objUser->view();

if ($singleUser->email_verified == $_GET['email_token']){
    $objUser->setData($_GET);
    $objUser->validTokenUpdate();
}





