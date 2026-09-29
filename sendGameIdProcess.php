<?php

session_start();

require "connection.php";

$gid = $_GET["id"];
$game_rs = Database::search("SELECT * FROM `game` WHERE `id`='".$gid."'");
$game_num = $game_rs->num_rows;

if($game_num == 1){

    $game_data = $game_rs->fetch_assoc();
    $_SESSION["g"] = $game_data;
    echo ("success");

}else{

    echo "Something went wrong";

}

?>