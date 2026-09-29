<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GameCamp Library</title>

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


    if (isset($_SESSION["u"])) {

        $uid = $_SESSION["u"]["id"];



        $library_rs = Database::search("SELECT * FROM `sellings` WHERE `user_id`='" . $uid . "'");
        $library_num = $library_rs->num_rows;

        if ($library_num == 0) {



            ?>

            <section class="h-100 h-custom">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col">
                            <div class="card">
                                <div class="card-body p-4">

                                    <div class="row">

                                        <div class="col-lg-12">
                                            <h5 class="mb-3"><a href="#!" class="text-body"><i
                                                        class="fas fa-long-arrow-alt-left me-2"></i>Games Library</a></h5>
                                            <hr>

                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <div>
                                                    <p class="mb-0">You have no games in your library</p>
                                                </div>

                                            </div>


                                        </div>




                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section>

            <?php
        } else {
            ?>


            <section class="h-100 h-custom">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col">
                            <div class="card">
                                <div class="card-body p-4" style="background-color: #2A2B2B;">

                                    <div class="row text-white" >

                                        <div class="col-lg-12">
                                            <h5 class="mb-3"><i
                                                        class="fas fa-long-arrow-alt-left me-2"></i>Games Library</h5>
                                            <hr>

                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <div>
                                                    <p class="mb-0">You have
                                                        <?php echo $library_num; ?> games in your library
                                                    </p>
                                                </div>

                                            </div>

                                            <?php

                                            for ($x = 0; $x < $library_num; $x++) {
                                                $library_data = $library_rs->fetch_assoc();

                                                $game_rs = Database::search("SELECT * FROM `game` INNER JOIN `developer` ON game.developer_id=developer.id WHERE `game`.`id`='" . $library_data["game_id"] . "'");
                                                $game_data = $game_rs->fetch_assoc();

                                                $image_rs = Database::search("SELECT * FROM `game_images` WHERE `game_id`='".$library_data["game_id"]."'");
                                                $image_data = $image_rs->fetch_assoc();

                                                ?>

                                                <div class="zoom px-5 card mb-3" style="background-color: #2A2B2B;">
                                                    <div class="card-body">
                                                        <div class="d-flex">
                                                            <div class="d-flex flex-row align-items-center" style="width: 600px;">
                                                                <div>

                                                

                                                                    <img src="<?php echo $image_data["path"]; ?>"
                                                                        class="img-fluid rounded-3" alt="Shopping item"
                                                                        style="width: 100px;">
                                                                </div>
                                                                <div class="ms-3">
                                                                    <h5>
                                                                        <?php echo $game_data["game_name"]; ?>
                                                                    </h5>
                                                                    <p class="small mb-0">
                                                                        <?php echo $game_data["developer_name"]; ?>
                                                                    </p>
                                                                </div>
                                                            </div>

                                                            <div class="d-flex flex-row align-items-center justify-content-start" style="width: 400px;">

                                                                <div style="width: 150px;">
                                                                    <h5 class="mb-0 text-center fs-6">
                                                                        <?php echo $library_data["purchased_date"]; ?>
                                                                    </h5>
                                                                </div>


                                                            </div>
                                                            <div class="d-flex flex-row align-items-center">

                                                                <a href="<?php echo $game_data["path"]; ?>"><button
                                                                        class="btn btn-danger">Download</button></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php
                                            }
                                            ?>


                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section>

            <?php
        }
    }
    ?>

    <?php include "footer.php"; ?>
    <script src="mdb.min.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>