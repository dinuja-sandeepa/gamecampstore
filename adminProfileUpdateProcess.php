<?php

session_start();

require "connection.php";

if (isset($_SESSION["au"])) {

    $fname = $_POST["fn"];
    $lname = $_POST["ln"];
    $mobile = $_POST["m"];

    if (isset($_FILES["image"])) {
        $image = $_FILES["image"];

        $allowed_image_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
        $file_ex = $image["type"];

        if (!in_array($file_ex, $allowed_image_extentions)) {
            echo ("Please select a valid image.");
        } else {

            $new_file_extention;

            if ($file_ex == "image/jpg") {
                $new_file_extention = ".jpg";
            } else if ($file_ex == "image/jpeg") {
                $new_file_extention = ".jpeg";
            } else if ($file_ex == "image/png") {
                $new_file_extention = ".png";
            } else if ($file_ex == "image/svg+xml") {
                $new_file_extention = ".svg";
            }

            $file_name = "resources/profile_images/" . $_SESSION["au"]["fname"] . "_" . uniqid() . $new_file_extention;

            move_uploaded_file($image["tmp_name"], $file_name);

            $image_rs = Database::search("SELECT * FROM `profile_image` WHERE 
            `user_id`='" . $_SESSION["au"]["id"] . "'");
            $image_num = $image_rs->num_rows;

            if ($image_num == 1) {

                Database::iud("UPDATE `profile_image` SET `path`='" . $file_name . "' WHERE 
                `user_id`='" . $_SESSION["au"]["id"] . "'");
            } else {

                Database::iud("INSERT INTO `profile_image` (`path`,`user_id`) VALUES 
                ('" . $file_name . "','" . $_SESSION["au"]["id"] . "')");
            }
        }
    }

    Database::iud("UPDATE `user` SET `fname`='" . $fname . "',`lname`='" . $lname . "',`mobile`='" . $mobile . "' 
            WHERE `id`='" . $_SESSION["au"]["id"] . "'");



    echo ("success");
} else {
    echo ("Please login first");
}
