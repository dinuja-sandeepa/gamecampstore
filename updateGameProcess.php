<?php

session_start();
require "connection.php";

if (isset($_SESSION["g"])) {

    $gid = $_SESSION["g"]["id"];

    $position = $_POST["po"];
    $platform = $_POST["pla"];
    $slo = $_POST["slo"];
    $desc = $_POST["desc"];
    $title = $_POST["t"];
    $price = $_POST["p"];
    $OS = $_POST["os"];
    $processor = $_POST["pro"];
    $ram = $_POST["ram"];
    $vcard = $_POST["vcard"];
    $scard = $_POST["scard"];
    $hdd = $_POST["hdd"];
    $date = $_POST["date"];
    $discount = $_POST["discount"];

    if (empty($position)) {
        echo ("Please select a Position");
    } else if (empty($platform)) {
        echo ("Please select a Platform");
    } else {

        Database::iud("UPDATE `game` SET `game_name`='" . $title . "',`release_date`='" . $date . "',`price`='" . $price . "',
    `description`='" . $desc . "',`slogan`='" . $slo . "',`game_position_id`='" . $position . "',`platform_id`='" . $platform . "',`discount`='".$discount."' WHERE id='" . $gid . "'");

        Database::iud("UPDATE `specification` SET `os`='" . $OS . "',`processor`='" . $processor . "',`memory`='" . $ram . "',
    `video_card`='" . $vcard . "',`sound_card`='" . $scard . "',`hdd_space`='" . $hdd . "' WHERE `game_id`='" . $gid . "'");


        $length = sizeof($_FILES);
        $allowed_img_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");

        // Database::iud("DELETE FROM `game_images` WHERE `game_id`='" . $gid . "'");

        if ($length <= 3 && $length > 0) {

            Database::iud("DELETE FROM `game_images` WHERE `game_id`='" . $gid . "';");

            for ($x = 0; $x < $length; $x++) {
                if (isset($_FILES["i" . $x])) {

                    $img_file = $_FILES["i" . $x];
                    $file_type = $img_file["type"];

                    if (in_array($file_type, $allowed_img_extentions)) {

                        $new_img_extention;

                        if ($file_type == "image/jpg") {
                            $new_img_extention = ".jpg";
                        } else if ($file_type == "image/jpeg") {
                            $new_img_extention = ".jpeg";
                        } else if ($file_type == "image/png") {
                            $new_img_extention = ".png";
                        } else if ($file_type == "image/svg+xml") {
                            $new_img_extention = ".svg";
                        }

                        $file_name = "resources//game_images//" . $title . "_" . $x . "_" . uniqid() . $new_img_extention;
                        move_uploaded_file($img_file["tmp_name"], $file_name);

                        // Database::iud("INSERT INTO `game_images`(`path`,`game_id`) VALUES ('" . $file_name . "','" . $gid . "')");

                        Database::iud("INSERT INTO `game_images`(`path`,`game_id`) VALUES ('" . $file_name . "','" . $gid . "')");

                        
                    } else {
                        echo ("File type not allowed!");
                    }
                }
            }
        }
        echo ("success");
    }
    
}