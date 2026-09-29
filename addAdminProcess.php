<?php

require "connection.php";

$email = $_POST["email"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$mobile = $_POST["mobile"];

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

Database::iud("INSERT INTO `user` (`email`,`fname`,`lname`,`mobile`,`joined_date`,`position_id`,`user_status_id`) VALUES 
('" . $email . "','" . $fname . "','" . $lname . "','" . $mobile . "','".$date."','1','1')");

echo ("Success");

?>