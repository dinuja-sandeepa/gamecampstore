<?php

require "connection.php";

if(isset($_GET["id"])){

    $gid = $_GET["id"];

    $game_rs = Database::search("SELECT * FROM `game` WHERE `id`='".$gid."'");
    $game_num = $game_rs->num_rows;

    if($game_num == 1){

        $game_data = $game_rs->fetch_assoc();

        if($game_data["game_status_id"] == 1){
            Database::iud("UPDATE `game` SET `game_status_id`= '2' WHERE `id`='".$gid."'");
            echo ("blocked");
        }else if($game_data["game_status_id"] == 2){
            Database::iud("UPDATE `game` SET `game_status_id`= '1' WHERE `id`='".$gid."'");
            echo ("unblocked");
        }

    }else{
        echo ("Cannot find the product. Please try again later.");
    }

}else{
    echo ("Something went wrong.");
}

?>