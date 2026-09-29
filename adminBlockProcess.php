<?php

require "connection.php";

if(isset($_GET["id"])){

    $admin_id = $_GET["id"];

    $admin_rs = Database::search("SELECT * FROM `user` WHERE `id`='".$admin_id."'");
    $admin_num = $admin_rs->num_rows;

    if($admin_num == 1){

        $admin_data = $admin_rs->fetch_assoc();

        if($admin_data["user_status_id"] == 1){
            Database::iud("UPDATE `user` SET `user_status_id`= '2' WHERE `id`='".$admin_id."'");
            echo ("blocked");
        }else if($admin_data["user_status_id"] == 2){
            Database::iud("UPDATE `user` SET `user_status_id`= '1' WHERE `id`='".$admin_id."'");
            echo ("unblocked");
        }

    }else{
        echo ("Cannot find the Admin. Please try again later.");
    }

}else{
    echo ("Something went wrong.");
}

?>