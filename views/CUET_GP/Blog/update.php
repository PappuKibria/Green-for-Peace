<?php

require_once ("../../../vendor/autoload.php");

$objBlog = new App\Blog\Blog();

$objBlog->setData($_POST);

$objBlog->update();