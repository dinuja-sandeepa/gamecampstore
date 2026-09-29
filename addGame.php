<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Game</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/ebuy.png" />

</head>

<body class="" style="background-color: #FFFFFF;">

    <?php

    require "connection.php";

    ?>

    <div class=" container-fluid">
        <div class="row">

            <div class="col-12 my-4">
                <div class="row text-center text-black">
                    <a class="text-start text-decoration-none text-black" href="adminPanel.php"><i
                            class="bi bi-arrow-bar-left fw-bold"></i> Dashboard</a>
                    <h1 class=" fw-bolder">Add New Game</h1>
                </div>
            </div>

            <div class="h-100">
                <div class="row d-flex justify-content-center align-items-center h-100"
                    style="background-color: #2A2B2B;">

                    <div class="card card-registration text-white" style="background-color: #FFFFFF;">
                        <div class="row g-0">


                            <div class="col-12 col-lg-6">
                                <div class="card-body p-md-5 text-black">


                                    <div class="row">
                                        <div class="col-12 mb-5">
                                            <div class="form-outline">
                                                <input type="text" class="form-control form-control-lg shadow"
                                                    id="title" placeholder="Game Name" />
                                                <label class="form-label fw-bold">Game Name</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <select class="form-select shadow" id="developer"
                                                    onchange="load_brand();">
                                                    <option>Select Developer</option>
                                                    <?php

                                                    $developer_rs = Database::search("SELECT * FROM `developer` ORDER BY `developer_name` ASC");
                                                    $developer_num = $developer_rs->num_rows;

                                                    for ($x = 0; $x < $developer_num; $x++) {
                                                        $developer_data = $developer_rs->fetch_assoc();
                                                        ?>
                                                        <option value="<?php echo $developer_data["id"]; ?>"><?php echo $developer_data["developer_name"]; ?></option>
                                                        <?php
                                                    }

                                                    ?>
                                                </select>
                                                <label class="form-label fw-bold" for="form3Example1m1">Select
                                                    Developer</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control shadow"
                                                    placeholder="Add new Developer" id="newDev">
                                                <button class="btn btn-dark fw-bold" type="button" id="button-addon2"
                                                    onclick="addDeveloper();">Add</button>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <select class="form-select shadow" id="publisher">
                                                    <option>Select Publisher</option>
                                                    <?php

                                                    $publisher_rs = Database::search("SELECT * FROM `publisher` ORDER BY `publisher_name` ASC");
                                                    $publisher_num = $publisher_rs->num_rows;

                                                    for ($x = 0; $x < $publisher_num; $x++) {
                                                        $publisher_data = $publisher_rs->fetch_assoc();
                                                        ?>
                                                        <option value="<?php echo $publisher_data["id"]; ?>"><?php echo $publisher_data["publisher_name"]; ?></option>
                                                        <?php
                                                    }

                                                    ?>
                                                </select>
                                                <label class="form-label fw-bold" for="form3Example1m1">Select
                                                    Publisher</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control shadow"
                                                    placeholder="Add new Publisher" id="newPub">
                                                <button class="btn btn-dark fw-bold" type="button" id="button-addon2"
                                                    onclick="addPublisher();">Add</button>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <select class="form-select shadow" id="position">
                                                    <option>Select Game Position</option>
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
                                                <label class="form-label fw-bold" for="form3Example1m1">Select Game
                                                    Position</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <select class="form-select shadow" id="platform">
                                                    <option>Select Platform</option>
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
                                                <label class="form-label fw-bold" for="form3Example1m1">Select
                                                    Platform</label>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="">
                                                    <input type="text" class="shadow form-control form-control-lg"
                                                        id="price"  />
                                                    <label class="form-label fw-bold" for="form3Example1m">Game
                                                        Price</label>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6 mb-4">
                                                <div class="input-group shadow">
                                                    <input type="text" class="form-control text-end"
                                                        placeholder="Game Discount"
                                                         id="discount" value="0">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon2">%</span>
                                                    </div>
                                                </div>
                                                <label class="form-label fw-bold">Game
                                                        Discount</label>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 mb-4">
                                                <div class="">
                                                    <input type="date" id="date" class="shadow form-control"
                                                         />
                                                    <label class="form-label fw-bold" for="form3Example1m">Game
                                                        Release Date</label>
                                                </div>
                                            </div>
                                        </div>

                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <div class="">
                                                <input type="text" class="form-control form-control-lg shadow"
                                                    id="glink" />
                                                <label class="form-label fw-bold" for="form3Example1m">Game Link</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <div class="">
                                                <input type="text" class="form-control form-control-lg shadow"
                                                    id="os" />
                                                <label class="form-label fw-bold" for="form3Example1m">Operating
                                                    System</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <div class="">
                                                <input type="text" class="form-control form-control-lg shadow"
                                                    id="pro" />
                                                <label class="form-label fw-bold" for="form3Example1m">Processor</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <div class="">
                                                <input type="text" class="form-control form-control-lg shadow"
                                                    id="ram" />
                                                <label class="form-label fw-bold"
                                                    for="form3Example1m">Memory(RAM)</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <div class="">
                                                <input type="text" class="form-control form-control-lg shadow"
                                                    id="vcard" />
                                                <label class="form-label fw-bold" for="form3Example1m">Video
                                                    Card</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <div class="">
                                                <input type="text" class="form-control form-control-lg shadow"
                                                    id="scard" />
                                                <label class="form-label fw-bold" for="form3Example1m">Sound
                                                    Card</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 mb-4">
                                            <div class="">
                                                <input type="text" class="form-control form-control-lg shadow"
                                                    id="hdd" />
                                                <label class="form-label fw-bold" for="form3Example1m">HDD Space</label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-12">
                                            <textarea cols="30" rows="3" class="form-control shadow"
                                                id="slo"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label fw-bold">Game
                                                Slogan</label>
                                        </div>
                                    </div>



                                </div>
                            </div>
                            <div class="col-12 col-lg-4 offset-1 mt-5">
                                <div class="row">

                                    <ul>
                                        <li class="shadow d-flex flex-column justify-content-center align-items-center border rounded-4 
                                border-secondary mb-1">
                                            <img src="resources/addproductimg.svg" class="img-thumbnail mt-1 mb-1"
                                                style="width: 50%;" id="i0" />
                                        </li>
                                        <li class="shadow d-flex flex-column justify-content-center align-items-center border rounded-4
                                border-secondary mb-1">
                                            <img src="resources/addproductimg.svg" class="img-thumbnail mt-1 mb-1"
                                                style="width: 50%;" id="i1" />
                                        </li>
                                        <li class="shadow d-flex flex-column justify-content-center align-items-center border rounded-4 
                                border-secondary mb-1">
                                            <img src="resources/addproductimg.svg" class="img-thumbnail mt-1 mb-1"
                                                style="width: 50%;" id="i2" />
                                        </li>


                                    </ul>
                                </div>

                                <div class="d-flex justify-content-center mb-3">
                                    <input type="file" class="d-none shadow" id="imageuploader" multiple />
                                    <label for="imageuploader" class="col-12 btn btn-primary"
                                        onclick="changeGameImage();">Upload Images</label>
                                </div>

                                <div class="row mt-5">
                                    <div class="col-12">
                                        <label class="form-label fw-bold text-black">Game
                                            Description</label>
                                    </div>
                                    <div class="col-12">
                                        <textarea cols="30" rows="10" class="form-control shadow" id="desc"></textarea>
                                    </div>
                                </div>

                                <div class="col-12 d-none my-4" id="msgdiv">

                                    <div class="alert alert-danger" role="alert" id="alertdiv">
                                        <i class="bi bi-x-octagon-fill fs-6" id="msg"></i>

                                    </div>
                                </div>


                            </div>
                        </div>
                        <hr />

                        <div class="d-flex justify-content-center my-4">

                            <button class="btn btn-warning btn-md ms-2" onclick="addGame();">Save Game</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal -->

        <div class="modal rounded-5 " style=" margin-top: 300px;" tabindex="-1" id="successfully_added">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body text-center text-dark">
                        <p>Game added Successfully</p>
                        <a href="manageGames.php"><button type="button" class="btn btn-success"
                                data-bs-dismiss="modal"><i class="bi bi-check-lg fw-bold fs-5"></i></button></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->


    </div>
    </div>


    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>