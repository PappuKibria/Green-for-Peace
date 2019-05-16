<?php

require_once ("../../../vendor/autoload.php");

$objAdmin = new App\Admin\Admin();

$objAdmin->setData($_POST);

$objAdmin->login();