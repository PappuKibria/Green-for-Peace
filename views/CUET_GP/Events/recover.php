<?php
require_once("../../../vendor/autoload.php");

$objEvent = new \App\Events\Events();
$objEvent->setData($_GET);
$allData = $objEvent->recover();