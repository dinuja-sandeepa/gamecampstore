<?php

session_start();
require "connection.php";

if (isset($_SESSION["u"])) {

    $gid = $_GET["id"];
    $umail = $_SESSION["u"]["email"];

    $array;
    $order_id = uniqid();

    $game_rs = Database::search("SELECT * FROM `game` WHERE `id`='" . $gid . "'");
    $game_data = $game_rs->fetch_assoc();

    $item = $game_data["game_name"];
    $amount = ((int)$game_data["price"]);

    $fname = $_SESSION["u"]["fname"];
    $lname = $_SESSION["u"]["lname"];
    $mobile = $_SESSION["u"]["mobile"];

    $env = parse_ini_file(__DIR__ . '/.env');

    $merchant_id = $env['STRIPE_MERCHANT_ID'];
    $merchant_secret = $env['STRIPE_MERCHANT_SECRET'];
    $currency = "LKR";

    $hash = strtoupper(
        md5(
            $merchant_id . 
            $order_id . 
            number_format($amount, 2, '.', '') . 
            $currency .  
            strtoupper(md5($merchant_secret)) 
        ) 
    );

    

    $array["id"] = $order_id;
    $array["item"] = $item;
    $array["amount"] = $amount;
    $array["fname"] = $fname;
    $array["lname"] = $lname;
    $array["mobile"] = $mobile;
    $array["mail"] = $umail;
    $array["mid"] = $merchant_id;
    $array["msecret"] = $merchant_secret;
    $array["currency"] = $currency;
    $array["hash"] = $hash;

    echo json_encode($array);
} else {
    echo ("1");
}
