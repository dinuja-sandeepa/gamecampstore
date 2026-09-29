<?php

session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
    if (isset($_GET["id"])) {

        $uid = $_SESSION["u"]["id"];
        $gid = $_GET["id"];

        $cart_rs = Database::search("SELECT * FROM `cart` WHERE `game_id`='" . $gid . "' AND `user_id`='" . $uid . "'");
        $cart_data = $cart_rs->fetch_assoc();
        $cart_num = $cart_rs->num_rows;

        if ($cart_num == 1) {

            echo ("1");
        } else {

            Database::iud("INSERT INTO `cart`(`game_id`,`user_id`) VALUES ('" . $gid . "','" . $uid . "')");
            echo ("2");
        }
    } else {
        echo ("Something went wrong");
    }
} else {
    echo ("4");
}
