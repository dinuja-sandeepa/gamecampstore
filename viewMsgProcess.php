<?php

session_start();
require "connection.php";

$admin_id = "10";
$user_id = $_GET["id"];

$msg_rs = Database::search("SELECT * FROM `chat` WHERE `user_from_id`='" . $user_id . "' OR `user_to_id`='" . $user_id . "'");
$msg_num = $msg_rs->num_rows;

$user_rs = Database::search("SELECT * FROM `user` WHERE `id`='" . $user_id . "'");
$user_data = $user_rs->fetch_assoc();

$img_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_id`='" . $user_id . "'");
$img_data = $img_rs->fetch_assoc();

Database::iud("UPDATE `chat` SET `msg_status_id` = '2' WHERE `user_from_id`='" . $user_id . "'");

for ($x = 0; $x < $msg_num; $x++) {
    $msg_data = $msg_rs->fetch_assoc();

    if ($msg_data["user_from_id"] == $admin_id && $msg_data["user_to_id"] == $user_id) {

        ?>
        <!-- sender -->
        <div class="d-flex justify-content-end mb-4">

            <div class="">
                <label class="fw-bold text-secondary mb-0 text-dark">
                    Me
                </label>
                <div class="bg-primary rounded py-2 px-3 mb-2">
                    <p class="mb-0 text-white text-start">
                        <?php echo $msg_data["message"]; ?>
                    </p>
                </div>
                <p class="text-dark small mb-0">
                    <?php echo $msg_data["date_time"]; ?>
                </p>
            </div>

        </div>
        <!-- sender -->
        <?php

    } else if ($msg_data["user_from_id"] == $user_id && $msg_data["user_to_id"] == $admin_id) {
        ?>
            <!-- receiver -->
            <div class="d-flex justify-content-start mb-4">

                <div class="">
                    <?php
                    if (isset($img_data["path"])) {
                        ?>
                        <img src="<?php echo $img_data["path"]; ?>" width="50px" class="rounded-circle" />
                    <?php
                    } else {
                        ?>
                        <img src="resource/new_user.svg" width="50px" class="rounded-circle">
                    <?php
                    }
                    ?>
                    <label><?php echo $user_data["fname"];?></label>
                    <div class="bg-primary rounded py-2 px-3 mb-2">
                        <p class="mb-0 text-white text-start">
                        <?php echo $msg_data["message"]; ?>
                        </p>
                    </div>
                    <p class="text-dark small mb-0">
                    <?php echo $msg_data["date_time"]; ?>
                    </p>
                </div>

            </div>
            <!-- receiver -->
        <?php
    }
}