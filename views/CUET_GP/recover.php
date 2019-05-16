<?php
require_once("../../vendor/autoload.php");

$objProfile = new \App\Profile\Profile();
$objProfile->setData($_GET);
$allData = $objProfile->recover();