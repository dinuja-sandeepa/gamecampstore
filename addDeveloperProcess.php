<?php

session_start();
require "connection.php";

if(isset($_GET["d"])){

    $d = $_GET["d"];

    $developer = Database::search("SELECT * FROM `developer` WHERE `developer_name`='".$d."'");
    $num = $developer->num_rows;

    if($num == 1){
        echo ("Developer Already Added");
    }else{

        Database::iud("INSERT INTO `developer` (`developer_name`) VALUES 
                ('" . $d . "')");

        echo ("Successfully Added");
    }

}else{
    echo ("Please enter Developer name");
}

?>