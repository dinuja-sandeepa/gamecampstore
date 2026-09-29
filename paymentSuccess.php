<!DOCTYPE html>

<html>

<head>
    <title>Payment Success</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="mdb.min.css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire">

    <link rel="icon" href="resources/logo2.png" />

</head>

<body>

    <?php

    include "header.php";

    $umail = $_SESSION["u"]["email"];

    $code = $_SESSION["code"];


    ?>

    <?php




    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto mt-5 mb-5 bg-white rounded-4 text-center">
                <div class="payment">
                    <div class="payment_header mt-2">
                        <div class="check">
                            <h1><i class="bi bi-check-circle-fill text-warning"></i></h1>
                        </div>
                    </div>
                    <hr />
                    <div class="content mb-2">
                        <h1 class="fw-bold">Payment Success !</h1>
                        <p>Thanks For Your Download</p>
                    </div>
                    <hr />


                    <?php

                    $game_IDs = $_SESSION["game_IDs"];

                    foreach ($game_IDs as $game_ID) {

                        $id = $game_ID['id'];

                        $game_rs = Database::search("SELECT * FROM `game` INNER JOIN `developer` ON game.developer_id=developer.id INNER JOIN `publisher` ON game.publisher_id=publisher.id 
                        INNER JOIN `platform` ON game.platform_id=platform.id  INNER JOIN game_position ON game_position.id=game.game_position_id WHERE game.id='" . $id . "'");
                        $game_data = $game_rs->fetch_assoc();
                        $game_num = $game_rs->num_rows;

                        ?>
                        <div class="col-12 mb-4">
                            <div class="row">
                                <div class=" text-start offset-1  col-6">
                                    <p>User Email -
                                        <?php echo $umail ?>
                                    </p>
                                    <p>Order Id -
                                        <?php echo $code ?>
                                    </p>
                                    <p>Game Id -
                                        <?php echo $id ?>
                                    </p>
                                    <p>Game Name -
                                        <?php echo $game_data["game_name"]; ?>
                                    </p>
                                    <p>Publisher -
                                        <?php echo $game_data["publisher_name"]; ?>
                                    </p>
                                    <p>Developer -
                                        <?php echo $game_data["developer_name"]; ?>
                                    </p>
                                    <p>Released Date -
                                        <?php echo $game_data["release_date"]; ?>
                                    </p>
                                </div>

                                <?php
                                $image_rs = Database::search("SELECT * FROM `game_images` WHERE `game_id`='" . $id . "'");
                                $image_data = $image_rs->fetch_assoc();
                                ?>

                                <div class="col-5 mt-5">
                                    <img src="<?php echo $image_data["path"]; ?>" style=" height: 150px;">
                                </div>
                            </div>
                        </div>
                        <?php
                    }

                    ?>

                    <button class="btn btn-primary mb-2" onclick="createInvoice(<?php echo $id; ?>);">Download
                        Invoice</button>

                </div>
            </div>
        </div>
    </div>


    <?php include "footer.php"; ?>
    <script src="mdb.min.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="script.js"></script>
</body>

</html>