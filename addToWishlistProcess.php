<?php

session_start();
require "connection.php";

if(isset($_SESSION["u"])){
    if(isset($_GET["id"])){

        $uid = $_SESSION["u"]["id"];
        $gid = $_GET["id"];

        $Wishlist_rs = Database::search("SELECT * FROM `wishlist` WHERE `game_id`='" . $gid . "' AND 
        `user_id`='" . $uid . "'");
        $Wishlist_num =$Wishlist_rs->num_rows;

        if($Wishlist_num == 1){

            echo ("1");

        }else{

            Database::iud("INSERT INTO `wishlist`(`game_id`,`user_id`) VALUES ('" . $gid . "','" . $uid . "')");
            echo ("2");

        }

    }else{
        echo ("Something Went Wrong");
    }

}else{
    echo ("4");
}

?>