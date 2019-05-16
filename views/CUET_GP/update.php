<?php

require_once ("../../vendor/autoload.php");

$objProfile = new App\Profile\Profile();

$objProfile->setData($_POST);

$objProfile->update();