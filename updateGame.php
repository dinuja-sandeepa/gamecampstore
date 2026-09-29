<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Update Game</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/ebuy.png" />

</head>

<body style=" background-color: #FFFFFF;">

    <?php

    session_start();

    require "connection.php";

    if (isset($_SESSION["g"])) {

        ?>

        <div class=" container-fluid">
            <div class="row">

                <div class="col-12 my-4">
                    <div class="row text-center text-black fw-bolder">
                        <h1 class=" fw-bolder">Update Game</h1>
                    </div>
                </div>


                <div class="h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">

                        <div class="card card-registration" style=" background-color: #FFFFFF;">
                            <div class="row g-0">


                                <div class="col-12 col-lg-6">
                                    <div class="card-body p-md-5 text-black">

                                        <?php
                                        $game = $_SESSION["g"];
                                        ?>

                                        <div class="row">
                                            <div class="col-12 mb-5">
                                                <div class="form-outline">
                                                    <input type="text" class="form-control form-control-lg shadow"
                                                        id="title" value="<?php echo $game["game_name"]; ?>" />
                                                    <label class="form-label fw-bold" for="form3Example1m">Game Name</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <select class="form-select shadow" id="developer">

                                                        <?php
                                                        $developer_rs = Database::search("SELECT * FROM `developer` WHERE `id`='" . $game["developer_id"] . "'");
                                                        $developer_data = $developer_rs->fetch_assoc();
                                                        ?>

                                                        <option>
                                                            <?php echo $developer_data["developer_name"]; ?>
                                                        </option>

                                                    </select>
                                                    <label class="form-label fw-bold" for="form3Example1m1">Select
                                                        Developer</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <select class="form-select shadow" id="publisher">

                                                        <?php
                                                        $publisher_rs = Database::search("SELECT * FROM `publisher` WHERE `id`='" . $game["publisher_id"] . "'");
                                                        $publisher_data = $publisher_rs->fetch_assoc();
                                                        ?>

                                                        <option>
                                                            <?php echo $publisher_data["publisher_name"]; ?>
                                                        </option>

                                                    </select>
                                                    <label class="form-label fw-bold" for="form3Example1m1">Select
                                                        Publisher</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <select class="form-select shadow" id="position">
                                                        <option></option>

                                                        <?php

                                                        $position_rs = Database::search("SELECT * FROM `game_position`");
                                                        $position_num = $position_rs->num_rows;

                                                        for ($x = 0; $x < $position_num; $x++) {
                                                            $position_data = $position_rs->fetch_assoc();
                                                            ?>
                                                            <option value="<?php echo $position_data["id"]; ?>"><?php echo $position_data["game_position_name"]; ?></option>
                                                            <?php
                                                        }

                                                        ?>

                                                    </select>
                                                    <label class="form-label fw-bold" for="form3Example1m1">Change Game
                                                        Position</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <select class="form-select shadow" id="platform">
                                                        <option></option>

                                                        <?php

                                                        $platform_rs = Database::search("SELECT * FROM `platform`");
                                                        $platform_num = $platform_rs->num_rows;

                                                        for ($x = 0; $x < $platform_num; $x++) {
                                                            $platform_data = $platform_rs->fetch_assoc();
                                                            ?>
                                                            <option value="<?php echo $platform_data["id"]; ?>"><?php echo $platform_data["platform_name"]; ?></option>
                                                            <?php
                                                        }

                                                        ?>
                                                    </select>
                                                    <label class="form-label fw-bold" for="form3Example1m1">Change
                                                        Platform</label>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="">
                                                    <input type="text" class="shadow form-control form-control-lg"
                                                        id="price" value="<?php echo $game["price"]; ?>" />
                                                    <label class="form-label fw-bold" for="form3Example1m">Change Game
                                                        Price</label>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6 mb-4">
                                                <div class="input-group shadow">
                                                    <input type="text" class="form-control text-end"
                                                        placeholder="Game Discount"
                                                        value="<?php echo $game["discount"]; ?>" id="discount">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon2">%</span>
                                                    </div>
                                                </div>
                                                <label class="form-label fw-bold" for="form3Example1m">Change Game
                                                        Discount</label>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-4">
                                                <div class="">
                                                    <input type="date" id="date" class="shadow form-control"
                                                        value="<?php echo $game["release_date"]; ?>" />
                                                    <label class="form-label fw-bold" for="form3Example1m">Change Game
                                                        Release Date</label>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                        $spec_rs = Database::search("SELECT * FROM `specification` WHERE `game_id`='" . $game["id"] . "'");
                                        $spec_data = $spec_rs->fetch_assoc();
                                        ?>

                                        <div class="row">
                                            <div class="col-12 mb-4">
                                                <div class="">
                                                    <input type="text" class="shadow form-control form-control-lg" id="os"
                                                        value="<?php echo $spec_data["os"]; ?>" />
                                                    <label class="form-label fw-bold" for="form3Example1m">Operating
                                                        System</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 mb-4">
                                                <div class="">
                                                    <input type="text" class="shadow form-control form-control-lg" id="pro"
                                                        value="<?php echo $spec_data["processor"]; ?>" />
                                                    <label class="form-label fw-bold" for="form3Example1m">Processor</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 mb-4">
                                                <div class="">
                                                    <input type="text" class="shadow form-control form-control-lg" id="ram"
                                                        value="<?php echo $spec_data["memory"]; ?>" />
                                                    <label class="form-label fw-bold"
                                                        for="form3Example1m">Memory(RAM)</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 mb-4">
                                                <div class="">
                                                    <input type="text" class="shadow form-control form-control-lg"
                                                        id="vcard" value="<?php echo $spec_data["video_card"]; ?>" />
                                                    <label class="form-label fw-bold" for="form3Example1m">Video
                                                        Card</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 mb-4">
                                                <div class="">
                                                    <input type="text" class="shadow form-control form-control-lg"
                                                        id="scard" value="<?php echo $spec_data["sound_card"]; ?>" />
                                                    <label class="form-label fw-bold" for="form3Example1m">Sound
                                                        Card</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 mb-4">
                                                <div class="">
                                                    <input type="text" class="shadow form-control form-control-lg" id="hdd"
                                                        value="<?php echo $spec_data["hdd_space"]; ?>" />
                                                    <label class="form-label fw-bold" for="form3Example1m">HDD Space</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-12">
                                                <label class="shadow form-label fw-bold" style="font-size: 20px;">Game
                                                    Slogan</label>
                                            </div>
                                            <div class="col-12">
                                                <textarea cols="30" rows="6" class="shadow form-control"
                                                    id="slo"><?php echo $game["slogan"]; ?>"</textarea>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 offset-1 mt-5 ">
                                    <div class="row">

                                        <ul class="">

                                            <?php

                                            $img = array();
                                            $img[0] = "resources/addproductimg.svg";
                                            $img[1] = "resources/addproductimg.svg";
                                            $img[2] = "resources/addproductimg.svg";

                                            $images_rs = Database::search("SELECT * FROM `game_images` WHERE `game_id`='" . $game["id"] . "'");
                                            $images_num = $images_rs->num_rows;

                                            for ($x = 0; $x < $images_num; $x++) {
                                                $images_data = $images_rs->fetch_assoc();
                                                $img[$x] = $images_data["path"];
                                            }

                                            ?>

                                            <li class="shadow d-flex flex-column justify-content-center align-items-center border rounded-4 
                                border-secondary mb-1">
                                                <img src="<?php echo $img[0]; ?>" class="img-thumbnail mt-1 mb-1"
                                                    style="width: 50%;" id="i0" />
                                            </li>
                                            <li class="shadow d-flex flex-column justify-content-center align-items-center border rounded-4
                                border-secondary mb-1">
                                                <img src="<?php echo $img[1]; ?>" class="img-thumbnail mt-1 mb-1"
                                                    style="width: 50%;" id="i1" />
                                            </li>
                                            <li class="shadow d-flex flex-column justify-content-center align-items-center border rounded-4 
                                border-secondary mb-1">
                                                <img src="<?php echo $img[2]; ?>" class="img-thumbnail mt-1 mb-1"
                                                    style="width: 50%;" id="i2" />
                                            </li>


                                        </ul>
                                    </div>

                                    <div class="shadow d-flex justify-content-center mb-3">
                                        <input type="file" class="d-none" id="imageuploader" multiple />
                                        <label for="imageuploader" class="col-12 btn btn-primary"
                                            onclick="changeGameImage();">Upload Images</label>
                                    </div>

                                    <div class="row mt-5 mb-5">
                                        <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">Game
                                                Description</label>
                                        </div>
                                        <div class="col-12">
                                            <textarea cols="30" rows="10" class="shadow form-control"
                                                id="desc"><?php echo $game["description"]; ?>"</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 d-none" id="msgdiv">

                                        <div class="alert alert-danger" role="alert" id="alertdiv">
                                            <i class="bi bi-x-octagon-fill fs-6" id="msg"></i>

                                        </div>
                                    </div>


                                </div>
                            </div>
                            <hr />

                            <div class="d-flex justify-content-center my-4">

                                <button class="btn btn-warning btn-md ms-2" onclick="updateGame();">Update Game</button>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Modal -->

                <div class="modal rounded-5 " style=" margin-top: 300px;" tabindex="-1" id="successfully_updated">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body text-center text-dark">
                                <p>Update Successfully</p>
                                <a href="manageGames.php"><button type="button" class="btn btn-success"
                                        data-bs-dismiss="modal"><i class="bi bi-check-lg fw-bold fs-5"></i></button></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->

            </div>
        </div>
        </div>

        <?php
    } else {

        echo ("something Went Wrong");
    }
    ?>


    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>