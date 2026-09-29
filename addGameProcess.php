<?php

session_start();
require "connection.php";

$developer = $_POST["de"];
$publisher = $_POST["pu"];
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
$gamelink = $_POST["glink"];
$discount = $_POST["discount"];


if ($developer == "0") {
    echo ("Please select a developer");
} else if ($publisher == "0") {
    echo ("Please select a publisher");
} else if ($position == "0") {
    echo ("Please select a position");
} else if (empty($title)) {
    echo ("Please Enter a Title");
} else if (strlen($title) >= 100) {
    echo ("Title should have lover than 100 characters");
} else if (empty($price)) {
    echo ("Please Enter a Price.");
} else if (empty($OS)) {
    echo ("Please Enter a Operating System.");
} else if (empty($processor)) {
    echo ("Please Enter a Processor.");
} else if (empty($ram)) {
    echo ("Please Enter a RAM Size.");
} else if (empty($vcard)) {
    echo ("Please Enter Compatible Video Card.");
} else if (empty($scard)) {
    echo ("Please Enter a Compatible Sound Card.");
} else if (empty($hdd)) {
    echo ("Please Enter a Hard Disk Space.");
} else if (empty($date)) {
    echo ("Please Enter a Game Release Date.");
} else if (empty($slo)) {
    echo ("Please Enter a Slogan.");
} else if (empty($desc)) {
    echo ("Please Enter a Description.");
} else {


    $status = 1;

    Database::iud("INSERT INTO `game`
    (`game_name`,`release_date`,`price`,`description`,`slogan`,`publisher_id`,`developer_id`,`game_position_id`,
    `platform_id`,`game_status_id`,`path`,`discount`) VALUES 
    ('" . $title . "','" . $date . "','" . $price . "','" . $desc . "','" . $slo . "','" . $publisher . "','" . $developer . "','" . $position . "',
    '" . $platform . "','" . $status . "','".$gamelink."','".$discount."')");

    // echo ("Game saved successfully");

    $game_id = Database::$connection->insert_id;

    Database::iud("INSERT INTO `specification`
    (`game_id`,`os`,`processor`,`memory`,`video_card`,`sound_card`,`hdd_space`) VALUES 
    ('" . $game_id . "','" . $OS . "','" . $processor . "','" . $ram . "','" . $vcard . "','" . $scard . "','" . $hdd . "')");

    $length = sizeof($_FILES);

    if ($length <= 3 && $length > 0) {

        $allowed_img_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");

        for ($x = 0; $x < $length; $x++) {
            if (isset($_FILES["image" . $x])) {

                $img_file = $_FILES["image" . $x];
                $file_extention = $img_file["type"];

                if (in_array($file_extention, $allowed_img_extentions)) {

                    $new_img_extention;

                    if ($file_extention == "image/jpg") {
                        $new_img_extention = ".jpg";
                    } else if ($file_extention == "image/jpeg") {
                        $new_img_extention = ".jpeg";
                    } else if ($file_extention == "image/png") {
                        $new_img_extention = ".png";
                    } else if ($file_extention == "image/svg+xml") {
                        $new_img_extention = ".svg";
                    }

                    $file_name = "resources//game_images//" . $title . "_" . $x . "_" . uniqid() . $new_img_extention;
                    move_uploaded_file($img_file["tmp_name"], $file_name);

                    Database::iud("INSERT INTO `game_images`(`path`,`game_id`) VALUES ('" . $file_name . "','" . $game_id . "')");
                } else {
                    echo ("Invalid Image type");
                }
            }
        }

        // echo ("Product image saved successfully");
    } else {
        echo ("Invalid image count");
    }

    echo ("success");
}
