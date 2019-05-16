<?php
require_once("../../../vendor/autoload.php");

$objBlog = new \App\Member\Member();
$objBlog->setData($_GET);
$allData = $objBlog->trash();