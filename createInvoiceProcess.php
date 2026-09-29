<?php

require "connection.php";

session_start();

if (isset($_SESSION["game_IDs"])) {

    $uid = $_SESSION["u"]["id"];

    $game_IDs = $_SESSION["game_IDs"];

    foreach ($game_IDs as $game_ID) {

        $id = $game_ID['id'];
        $prices = $game_ID['price'];

        $game_rs = Database::search("SELECT * FROM `game` WHERE `id`='" . $id . "'");
        $game_num = $game_rs->num_rows;

        $game_data = $game_rs->fetch_assoc();

        $today = date("Y-m-d");


        Database::iud("INSERT INTO `sellings`(`game_id`,`user_id`,`purchased_date`,`selling_price`) VALUES ('" . $id . "','" . $uid . "','" . $today . "','".$prices."')");

        Database::iud("DELETE FROM `cart` WHERE `user_id`='" . $uid . "' AND `game_id`='".$id."' ");

    }

    // echo ("success");
    header("Location: invoice.php ");

} else {
    echo ("Something went wrong. Please Contact Customer Support.");
}

?>