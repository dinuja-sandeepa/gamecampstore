<?php

require 'vendor/autoload.php';
require("connection.php");

session_start();

$gameId = $_POST['gId'];

$g_rs = Database::search("SELECT * FROM `game` WHERE `id`='" . $gameId . "'");
$g_data = $g_rs->fetch_assoc();

$gameName = $g_data["game_name"];
$gameDescription = $g_data["description"];
$actual_price = $g_data["price"];
$discount = $g_data["discount"];

$selling_price = $actual_price - ($actual_price * ($discount / 100));
$price = round($selling_price,2);

$code = uniqid();

$_SESSION["code"] = $code;

$env = parse_ini_file(__DIR__ . '/.env');

$stripe = new \Stripe\StripeClient($env['STRIPE_SECRET_KEY']);

$checkout_session = $stripe->checkout->sessions->create([
  'line_items' => [
    [
      'price_data' => [
        'currency' => 'usd',
        'product_data' => [
          'name' => $gameName,
          'description' => $gameDescription,
        ],
        'unit_amount' => $price * 100,
      ],
      'quantity' => 1,
    ]
  ],
  'mode' => 'payment',
  'success_url' => 'http://localhost/gamecampstore/createInvoiceProcess.php',
  'cancel_url' => 'http://localhost:4242/cancel',
]);

echo ("OK");

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);

?>