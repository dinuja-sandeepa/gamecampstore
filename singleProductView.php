<?php
include "header.php";

if (isset($_GET["id"])) {

    $gid = $_GET["id"];


    $game_rs = Database::search("SELECT * FROM `game` INNER JOIN `developer` ON game.developer_id=developer.id INNER JOIN `publisher` ON game.publisher_id=publisher.id 
    INNER JOIN `platform` ON game.platform_id=platform.id  INNER JOIN game_position ON game_position.id=game.game_position_id WHERE game.id='" . $gid . "'");
    $game_num = $game_rs->num_rows;



    if ($game_num == 1) {

        $game_data = $game_rs->fetch_assoc();

        $actual_price = $game_data["price"];
        $discount = $game_data["discount"];

        $selling_price = $actual_price - ($actual_price * ($discount / 100));


        $game_IDs = array();

        $game_ID = array(
            'id' => $gid,
            'total' => $game_data["price"],
        );
        array_push($game_IDs, $game_ID);

        $_SESSION["game_IDs"] = $game_IDs;


        ?>


        <!DOCTYPE html>

        <html>

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Game View</title>

            <link rel="stylesheet" href="bootstrap.css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
            <link rel="stylesheet" href="style.css" />
            <link rel="stylesheet" href="mdb.min.css" />

            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire">

            <link rel="icon" href="resources/logo2.png" />

        </head>

        <body style="background-color: #121313;">

            <div class="container-fluid">
                <div class="row">



                    <?php

                    ?>

                    <div class="fade-in container mt-5 mb-5">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-10 rounded-4" style="background-color: #2A2B2B;">
                                <div class="card" style="background-color: #2A2B2B;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row justify-content-center">
                                                <!-- carousal -->


                                                <?php



                                                $specification_rs = Database::search("SELECT * FROM `specification` WHERE game_id='" . $gid . "'");
                                                $specification_data = $specification_rs->fetch_assoc();

                                                $image = array();

                                                $image_rs = Database::search("SELECT * FROM `game_images` WHERE `game_id`='" . $gid . "'");


                                                for ($i = 0; $i < $image_rs->num_rows; $i++) {
                                                    $image_data = $image_rs->fetch_assoc();

                                                    $image[] = $image_data["path"];
                                                }


                                                ?>

                                                <!-- <div id="carouselExampleInterval" class="carousel slide img-fluid "
                                                    data-bs-ride="carousel" style="width: 500px;">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active mt-5 text-center img-fluid"
                                                            data-bs-interval="2000">
                                                            <img src="<?php echo $image_data["path"]; ?>"
                                                                style="max-height: 400px;">
                                                        </div>
                                                    </div>
                                                </div> -->

                                                <div id="carouselExampleFade" class="carousel slide carousel-fade"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner mt-4 rounded-4">
                                                        <div class="carousel-item active bg-image hover-zoom">
                                                            <img src="<?php echo $image[0]; ?>" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item bg-image hover-zoom">
                                                            <img src="<?php echo $image[1]; ?>" class="d-block w-100" alt="...">
                                                        </div>
                                                        <div class="carousel-item  bg-image hover-zoom">
                                                            <img src="<?php echo $image[2]; ?>" class="d-block w-100" alt="...">
                                                        </div>
                                                    </div>
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#carouselExampleFade" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
                                                <!-- carousal -->

                                            </div>
                                        </div>
                                        <div class="fade-in col-md-6">
                                            <div class="product p-4 bg-dark text-white-50">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex align-items-center"> <i
                                                            class="fa fa-long-arrow-left"></i> <span class="ml-1">Back</span>
                                                    </div> <i class="fa fa-shopping-cart text-muted"></i>
                                                </div>
                                                <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">
                                                        <?php echo $game_data["developer_name"]; ?>
                                                    </span>
                                                    <h4 class="text-uppercase text-white">
                                                        <?php echo $game_data["game_name"]; ?>
                                                    </h4>

                                                    <?php
                                                    if ($discount == 0) {
                                                        ?>
                                                        <div class="price d-flex flex-row align-items-center"
                                                            style="color: #17E6E6;"> <span class="">$
                                                                <?php echo $game_data["price"]; ?>
                                                            </span>
                                                        </div>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <h6 class="" style="color: #17E6E6;">$
                                                            <?php echo round($selling_price, 2); ?>
                                                            <del class="text-danger mx-2">$
                                                                <?php echo round($actual_price, 2); ?>
                                                            </del>
                                                            <span class="badge badge-secondary text-white bg-primary">-
                                                                <?php echo $discount ?>%
                                                            </span>
                                                        </h6>
                                                        <?php
                                                    }
                                                    ?>




                                                    <p class="about">
                                                        <?php echo $game_data["slogan"]; ?>
                                                    </p>

                                                    <span class="text-uppercase brand fw-bold">Developer - </span><span
                                                        class="text-uppercase text-muted brand">
                                                        <?php echo $game_data["developer_name"]; ?>
                                                    </span></br>
                                                    <span class="text-uppercase brand fw-bold">Publisher - </span><span
                                                        class="text-uppercase text-muted brand">
                                                        <?php echo $game_data["publisher_name"]; ?>
                                                    </span></br>
                                                    <span class="text-uppercase brand fw-bold">Release Date - </span><span
                                                        class="text-uppercase text-muted brand">
                                                        <?php echo $game_data["release_date"]; ?>
                                                    </span></br>
                                                    <span class="text-uppercase brand fw-bold">Platform -

                                                        <?php
                                                        if ($game_data["platform_id"] == '1') {
                                                            ?>

                                                        </span><span class="text-uppercase text-muted brand"><i
                                                                class="bi bi-windows"></i></span>

                                                        <?php
                                                        } else {
                                                            ?>
                                                        <span class="text-uppercase text-muted brand"><i
                                                                class="bi bi-apple"></i></span>
                                                        <?php
                                                        }
                                                        ?>

                                                    <?php


                                                    if (isset($_SESSION["u"])) {

                                                        $uid = $_SESSION["u"]["id"];

                                                        if ($game_data["game_position_id"] == '2') {
                                                            ?>
                                                            <div class="cart mt-4 align-items-center">
                                                                <button
                                                                    class="btn btn-outline-success text-uppercase mr-2 px-4 border-3 fw-bold">Not
                                                                    Releassed</button>
                                                            </div>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <div class="cart mt-4 align-items-center">


                                                                <?php

                                                                $g_rs = Database::search("SELECT * FROM `game` WHERE `game_name`='" . $game_data["game_name"] . "'");
                                                                $g_data = $g_rs->fetch_assoc();

                                                                $purchased_rs = Database::search("SELECT * FROM `sellings` WHERE `user_id`='" . $uid . "' AND `game_id`='" . $g_data["id"] . "' ");
                                                                $purchase_data = $purchased_rs->fetch_assoc();

                                                                if ($purchased_rs->num_rows >= 1) {
                                                                    ?>



                                                                    <div class=" text-center col-12">
                                                                        <button
                                                                            class="btn btn-outline-success text-uppercase col-10 mt-2 fw-bold border-3">You
                                                                            have
                                                                            already purchased this game</button>
                                                                    </div>

                                                                    <?php
                                                                } else {
                                                                    ?>

                                                                    <div class=" text-center">
                                                                        <button
                                                                            class=" col-5 btn btn-outline-danger text-uppercase mr-2 px-4 fw-bold border-3"
                                                                            onclick="addToCart(<?php echo $g_data['id']; ?>);">Add to
                                                                            cart</button>
                                                                        <button
                                                                            class="col-5 btn btn-outline-info text-uppercase mr-2 px-4 fw-bold border-3"
                                                                            onclick='addToWishlist(<?php echo $g_data["id"]; ?>);'>Add to
                                                                            Wishlist</button>
                                                                    </div>


                                                                    <div class=" text-center col-12">
                                                                        <form action="buyNow.php" method="POST">
                                                                            <input hidden type="text" id="gId" name="gId"
                                                                                value="<?php echo $g_data["id"]; ?>">
                                                                            <!-- <input hidden type="text" id="gName" name="gName"
                                                                                value="<?php echo $game_data["game_name"]; ?>">
                                                                            <input hidden type="text" id="gPrice" name="gPrice"
                                                                                value="<?php echo $game_data["price"]; ?>">
                                                                            <input hidden type="text" id="gDescription" name="gDescription"
                                                                                value="<?php echo $game_data["description"]; ?>"> -->
                                                                            <button
                                                                                class="btn btn-outline-success text-uppercase col-10 mt-2 fw-bold border-3">Buy
                                                                                Now</button>
                                                                        </form>
                                                                    </div>

                                                                    <?php
                                                                }
                                                                ?>




                                                            </div>
                                                            <?php
                                                        }

                                                    } else {
                                                        ?>

                                                        <div class=" text-center col-12">
                                                            <a href="signIn.php"><button
                                                                    class=" btn btn-dark text-uppercase col-10 mt-4">Please Login
                                                                    Or SignUp</button></a>
                                                        </div>

                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>




                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-12 mt-5">
                                            <div class="row text-center">
                                                <h2 class="fade-in fw-bolder text-white"><i class="bi bi-controller"></i>
                                                    Description
                                                    <i class="bi bi-controller"></i>
                                                </h2>
                                            </div>
                                            <div class="fade-in row text-center px-4 text-white-50 mt-2">
                                                <p>
                                                    <?php echo $game_data["description"]; ?>
                                                </p>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-12 mt-5">
                                            <div class="row text-center">
                                                <h2 class="fade-in fw-bolder text-white"><i class="bi bi-controller"></i>
                                                    Specifications <i class="bi bi-controller"></i></h2>
                                            </div>
                                            <div class="fade-in row  px-4 text-white-50 mt-2">
                                                <span class="text-uppercase brand fw-bold">OS - </span>
                                                <p class="text-uppercase text-muted brand">
                                                    <?php echo $specification_data["os"]; ?>
                                                </p></br>
                                                <span class="text-uppercase brand fw-bold">Processor - </span>
                                                <p class="text-uppercase text-muted brand">
                                                    <?php echo $specification_data["processor"]; ?>
                                                </p></br>
                                                <span class="text-uppercase brand fw-bold">Memory - </span>
                                                <p class="text-uppercase text-muted brand">
                                                    <?php echo $specification_data["memory"]; ?>
                                                </p></br>
                                                <span class="text-uppercase brand fw-bold">Video Card - </span>
                                                <p class="text-uppercase text-muted brand">
                                                    <?php echo $specification_data["video_card"]; ?>
                                                </p></br>
                                                <span class="text-uppercase brand fw-bold">Sound Card - </span>
                                                <p class="text-uppercase text-muted brand">
                                                    <?php echo $specification_data["sound_card"]; ?>
                                                </p></br>
                                                <span class="text-uppercase brand fw-bold">HDD Space - </span>
                                                <p class="text-uppercase text-muted brand">
                                                    <?php echo $specification_data["hdd_space"]; ?>
                                                </p></br>

                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!--  -->

                    <div class="modal" style=" margin-top: 300px;" tabindex="-1" id="Already_Added_Cart_Modal">
                        <div class="modal-dialog">
                            <div class="modal-content text-center">
                                <div class="modal-body fs-4 fw-bold">
                                    <p>This Game Already Added to your Cart</p>
                                    <button type="button" class="btn btn-outline-danger fs-5" data-bs-dismiss="modal"><i
                                            class="bi bi-exclamation-triangle-fill"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--  -->

                    <!--  -->

                    <div class="modal" style=" margin-top: 300px;" tabindex="-1" id="Successfully_added_cart_Modal">
                        <div class="modal-dialog">
                            <div class="modal-content text-center">
                                <div class="modal-body fs-4 fw-bold">
                                    <p>Game Successfully Added to Cart</p>
                                    <button type="button" class="btn btn-outline-success fs-5" data-bs-dismiss="modal"><i
                                            class="bi bi-check-lg fw-bold"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--  -->

                    <!--  -->

                    <div class="modal" style=" margin-top: 300px;" tabindex="-1" id="Already_added_Wishlist_Modal">
                        <div class="modal-dialog">
                            <div class="modal-content text-center">
                                <div class="modal-body fs-4 fw-bold">
                                    <p>This Game Already Added to Wishlist</p>
                                    <button type="button" class="btn btn-outline-danger fs-5" data-bs-dismiss="modal"><i
                                            class="bi bi-exclamation-triangle-fill"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--  -->

                    <!--  -->

                    <div class="modal" style=" margin-top: 300px;" tabindex="-1" id="Successfully_added_wishlist_Modal">
                        <div class="modal-dialog">
                            <div class="modal-content text-center">
                                <div class="modal-body fs-4 fw-bold">
                                    <p>Game Successfully Added to Wishlist</p>
                                    <button type="button" class="btn btn-outline-success fs-5" data-bs-dismiss="modal"><i
                                            class="bi bi-check-lg fw-bold"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--  -->

                    <!--  -->

                    <div class="modal" tabindex="-1" id="LogIn_SignUp">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Please LogIn Or SignUp</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--  -->



                </div>
            </div>


            <?php include "footer.php"; ?>
            <script src="mdb.min.js"></script>
            <script src="script.js"></script>
            <script src="bootstrap.js"></script>
            <!-- <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script> -->

        </body>

        </html>

        <?php

    } else {
        echo ("Sorry for the Inconvenience");
    }
} else {
    echo ("Something went wrong");
}

?>