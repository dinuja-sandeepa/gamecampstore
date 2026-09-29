<?php

session_start();
require "connection.php";

if(isset($_GET["p"])){

    $p = $_GET["p"];

    $publisher = Database::search("SELECT * FROM `publisher` WHERE `publisher_name`='".$p."'");
    $num = $publisher->num_rows;

    if($num == 1){
        echo ("Publisher Already Added");
    }else{

        Database::iud("INSERT INTO `publisher` (`publisher_name`) VALUES 
                ('" . $p . "')");

        echo ("Successfully Added");
    }

}else{
    echo ("Please enter Publisher name");
}

?>