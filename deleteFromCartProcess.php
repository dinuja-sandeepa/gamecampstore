<?php

require "connection.php";

if(isset($_GET["id"])){

    $cid = $_GET["id"];

    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `id`='".$cid."'");
    $cart_data = $cart_rs->fetch_assoc();

    Database::iud("DELETE FROM `cart` WHERE `id`='".$cid."'");

    echo ("success");

}else{
    echo ("Something went wrong");
}

?>