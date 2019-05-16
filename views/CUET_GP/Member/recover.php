<?php
require_once("../../../vendor/autoload.php");

$objMember = new \App\Member\Member();
$objMember->setData($_GET);
$allData = $objMember->recover();