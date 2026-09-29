<?php

require 'vendor/autoload.php';

session_start();

$gamePrice = $_POST['gPrice'];
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
          'name' => 'You can find game names in Invoice',
          'description' => 'You can find game description in Invoice',
        ],
        'unit_amount' => $gamePrice * 100,
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