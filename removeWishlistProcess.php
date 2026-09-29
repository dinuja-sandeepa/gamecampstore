<?php

require "connection.php";

if(isset($_GET["id"])){

    $wid = $_GET["id"];

    $watch_rs = Database::search("SELECT * FROM `Wishlist` WHERE `id`='".$wid."'");
    $watch_num = $watch_rs->num_rows;
    $watch_data = $watch_rs->fetch_assoc();

    if($watch_num == 0){
        echo ("Something went wrong. Please try again later.");
    }else{

        Database::iud("DELETE FROM `Wishlist` WHERE `id`='".$wid."'");

        echo ("success");

    }


}else{
    echo ("Please select a product");
}

?>