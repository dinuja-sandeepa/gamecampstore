<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Contact Admin</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="mdb.min.css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire">

    <link rel="icon" href="resources/logo2.png" />

</head>

<body style="background-color: #121313;">

    <?php
    include "header.php";
    

    $uid = $_SESSION["u"]["id"];

    Database::iud("UPDATE `chat` SET `msg_status_id` = '2' WHERE `user_to_id`='" . $uid . "'");
    ?>


    <div class="container-fluid" id="basicSearchResult">
        <div class="row">

            <div class="row d-flex justify-content-center mt-4 mb-4">
                <div class="col-10">

                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center p-3"
                            style="border-top: 4px solid #ffa900;">
                            <h5 class="mb-0">Contact Admin</h5>
                            <div class="d-flex flex-row align-items-center">
                            </div>
                        </div>

                        <div class="card-body" style="overflow-y: scroll; height:400px;" id="userChat">


                            <?php

                            $contactAdmin = Database::search("SELECT * FROM `user` WHERE `email` = 'contact@admin.com'");
                            $contactAdminData = $contactAdmin->fetch_assoc();

                            $contactAdminId = $contactAdminData["id"];

                            $msg_rs = Database::search("SELECT * FROM `chat` WHERE `user_from_id`='" . $uid . "' OR `user_to_id`='" . $uid . "'");
                            $msg_num = $msg_rs->num_rows;

                            for ($x = 0; $x < $msg_num; $x++) {
                                $msg_data = $msg_rs->fetch_assoc();

                                if ($msg_data["user_from_id"] == $contactAdminId && $msg_data["user_to_id"] == $uid) {

                                    $user_rs = Database::search("SELECT * FROM `user` WHERE `id`='" . $uid . "'");
                                    $user_data = $user_rs->fetch_assoc();

                                    $img_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_id`='" . $uid . "'");
                                    $img_data = $img_rs->fetch_assoc();

                                    ?>

                                    <div class="d-flex justify-content-start mb-4">

                                        <div class="">
                                            <label class="fw-bold text-secondary mb-0 text-dark">
                                                Admin
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



                                    <?php

                                } else if ($msg_data["user_from_id"] == $uid && $msg_data["user_to_id"] == $contactAdminId) {
                                    ?>

                                        <div class="d-flex justify-content-end mb-4 mx-4">

                                            <div class="">
                                                <label class="fw-bold mb-0 text-dark text-end">
                                                    Me
                                                </label>
                                                <div class="bg-warning rounded py-2 px-3 mb-2">
                                                    <p class="mb-0 text-dark text-end">
                                                    <?php echo $msg_data["message"]; ?>
                                                    </p>
                                                </div>
                                                <p class="text-dark small mb-0">
                                                <?php echo $msg_data["date_time"]; ?>
                                                </p>
                                            </div>
                                        </div>

                                    <?php
                                }
                            }

                            ?>

                        </div>
                        <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                            <div class="input-group mb-0">
                                <input type="text" id="userMessage" class="form-control" placeholder="Type message" />
                                <button class="btn btn-warning" type="button" id="button-addon2"
                                    style="padding-top: .55rem;" onclick="userChatSend();">
                                    Button
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        </section>

    </div>
    </div>

    <?php include "footer.php"; ?>
    <script src="mdb.min.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>