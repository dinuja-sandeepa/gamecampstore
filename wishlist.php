<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wishlist</title>

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

            

            include "header.php";
       



            if (isset($_SESSION["u"])) {

                $uid = $_SESSION["u"]["id"];

                


            ?>


                <section class="h-100">
                    <div class="container py-5">
                        <div class="row d-flex justify-content-center my-4">

                            <?php

                            $Wishlist_rs = Database::search("SELECT * FROM `wishlist` WHERE `user_id`='" . $uid . "'");
                            $Wishlist_num = $Wishlist_rs->num_rows;

                            if ($Wishlist_num == 0) {

                            ?>

                                <!-- <> -->
                                <div class="col-md-12"  style="background-color: #2A2B2B;">
                                    <div class="card mb-4 text-white"  style="background-color: #2A2B2B;">
                                        <div class="card-header py-3">
                                            <h5 class="mb-0">Wishlist - 0 items</h5>
                                        </div>
                                        <div class="card-body">

                                            <div class="row">

                                                <label class="form-label fs-1 fw-bold text-center text-white">
                                                    You have no items in your Wishlist yet.
                                                </label>

                                                <div class="offset-lg-4 col-12 col-lg-4 d-grid mb-3">
                                                    <a href="home.php" class="btn btn-outline-info fs-3 fw-bold">
                                                        Add Games
                                                    </a>
                                                </div>

                                            </div>


                                            <hr class="my-4" />


                                        </div>
                                    </div>


                                </div>

                                <!-- <> -->

                            <?php

                            } else {


                            ?>

                                <!-- <> -->
                                <div class="col-md-12" style="background-color: #2A2B2B;">
                                    <div class="card mb-4 text-white" style="background-color: #2A2B2B;">
                                        <div class="card-header py-3">
                                            <h5 class="mb-0">Wishlist - <?php echo $Wishlist_num; ?> items</h5>
                                        </div>

                                        <?php
                                        for ($x = 0; $x < $Wishlist_num; $x++) {
                                            $Wishlist_data = $Wishlist_rs->fetch_assoc();

                                            $game_rs = Database::search("SELECT * FROM `game` INNER JOIN `developer` ON game.developer_id=developer.id WHERE game.id='" . $Wishlist_data["game_id"] . "'");
                                            $game_data = $game_rs->fetch_assoc();

                                            $actual_price = $game_data["price"];
                                            $discount = $game_data["discount"];

                                            $selling_price = $actual_price - ($actual_price * ($discount / 100));

                                            
                                        ?>
                                            <div class="zoom px-5 card-body" style=" background-color: #2A2B2B;">


                                                <!-- Single item -->
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                                        <!-- Image -->
                                                        <?php

                                                        $game_image_rs = Database::search("SELECT * FROM `game_images` WHERE `game_id`='" . $Wishlist_data["game_id"] . "'");
                                                        $game_image_data = $game_image_rs->fetch_assoc();



                                                        ?>
                                                        <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                                            <img src="<?php echo $game_image_data["path"]; ?>" class="w-100" alt="Blue Jeans Jacket" />
                                                            <a href="#!">
                                                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                                            </a>
                                                        </div>
                                                        <!-- Image -->
                                                    </div>

                                                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                                        <!-- Data -->
                                                        <p><strong><?php echo $game_data["game_name"] ?></strong></p>
                                                        <p>Developer: <?php echo $game_data["developer_name"] ?></p>
                                                        <p>Released Date: <?php echo $game_data["release_date"] ?></p>
                                                        <button type="button" class="btn btn-danger btn-sm mb-2" data-mdb-toggle="tooltip" onclick='removeFromWishlist(<?php echo $Wishlist_data["id"]; ?>);'>
                                                            Remove
                                                        </button>
                                                        <!-- Data -->
                                                    </div>

                                                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                                        <!-- Price -->
                                                        <?php
                                                        if ($discount == 0) {
                                                            ?>
                                                            <p class="text-start text-md-center">
                                                                <strong>$
                                                                    <?php echo $game_data["price"] ?>
                                                                </strong>
                                                            </p>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <h6 class=" text-white fw-bold">$
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
                                                        <!-- Price -->
                                                    </div>
                                                </div>
                                                <!-- Single item -->


                                                <hr class="my-4" />
                                            </div>


                                        <?php
                                        }
                                        ?>


                                    </div>
                                </div>

                                

                            <?PHP
                            }
                            ?>

                        </div>
                    </div>


                    <!-- <> -->

        </div>
    </div>
    </section>

<?php

            } else {
                echo ("Please Sign In or Register");
            }

            include "footer.php";

?>

</div>
</div>




<script src="mdb.min.js"></script>
<script src="script.js"></script>
<script src="bootstrap.js"></script>
</body>

</html>