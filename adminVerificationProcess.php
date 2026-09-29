<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST["Ae"])) {
    $email = $_POST["Ae"];

    $admin_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' AND `position_id`='1' AND `user_status_id`='1'");
    $admin_num = $admin_rs->num_rows;

    if ($admin_num > 0) {

        $code = uniqid();

        Database::iud("UPDATE `user` SET `verification_code`='" . $code . "' WHERE `email`='" . $email . "'");

        $env = parse_ini_file(__DIR__ . '/.env');

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ebuyonlinestore2022@gmail.com';
        $mail->Password = $env['MAIL_PASSWORD'];
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('ebuyonlinestore2022@gmail.com', 'Admin Verification');
        $mail->addReplyTo('ebuyonlinestore2022@gmail.com', 'Admin Verification');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'GameCamp Admin Login Verification Code';
        $bodyContent = '<h1 style="color:blue">Your Verification code is ' . $code . '</h1>';
        $mail->Body    = $bodyContent;

        if (!$mail->send()) {
            echo 'Verification code sending failed';
        } else {
            echo 'success';
        }
    } else {
        echo ("You are not a valid user");
    }
} else {
    echo ("Email field should not be empty.");
}
