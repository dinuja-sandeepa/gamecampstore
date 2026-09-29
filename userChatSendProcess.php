<?php

session_start();
require "connection.php";

if (isset($_GET["msg"])) {

    $uid = $_SESSION["u"]["id"];

    $message = $_GET["msg"];

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    $contactAdmin = Database::search("SELECT * FROM `user` WHERE `email` = 'contact@admin.com'");
    $contactAdminData = $contactAdmin->fetch_assoc();

    $contactAdminId = $contactAdminData["id"];

    Database::search("INSERT INTO `chat` (`user_from_id`,`user_to_id`,`message`,`date_time`,`msg_status_id`)
    VALUES ('" . $uid . "','" . $contactAdminId . "','" . $message . "','" . $date . "','1') ");

    echo ("Success");

} else {

    echo ("Please Enter Your Message");
}
?>