<?php

require_once ("../../../vendor/autoload.php");

$objMember = new App\Member\Member();

$fileName = time().$_FILES["member_photo"]["name"];

$_POST["member_photo"] = $fileName;

$objMember->setData($_POST);

$objMember->store();

$source = $_FILES["member_photo"]["tmp_name"];

$destination = "Upload/$fileName";

move_uploaded_file($source,$destination);

