<?php

require_once ("../../../vendor/autoload.php");

$objEvent = new App\Events\Events();

$fileName = time().$_FILES["event_photo"]["name"];

$_POST["event_photo"] = $fileName;

$objEvent->setData($_POST);

$objEvent->store();

$source = $_FILES["event_photo"]["tmp_name"];

$destination = "Upload/$fileName";

move_uploaded_file($source,$destination);