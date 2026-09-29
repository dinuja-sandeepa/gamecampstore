<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

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
    ?>


    <div class="container-fluid" id="basicSearchResult">
        <div class="row">



            <div class="col-12" style="background-color: #121313;">
                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="input-group mt-5 ">
                            <input type="text" class="form-control text-white border-0 "
                                style="background-color: #202020; border-color: yellow" placeholder="Search Games" id="basic_search_txt">
                            <button class=" text-black-50 rounded-end px-4" type="button" id="button-addon2"
                                onclick="basicSearch(0);" style="background-color: #17E6E6;"> <i
                                    class="bi bi-search"></i> Search</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="row">

                    <div id="carouselExampleControls" class="carousel slide mt-4 rounded-5" data-bs-ride="carousel">
                        <div class="carousel-inner rounded-5" style="height: 500px;">
                            <div class="carousel-item active">
                                <img src="resources/banner/banner4.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="resources/banner/banner5.jpg." class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="resources/banner/banner6.jpeg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12">
                <div class=" row justify-content-start">
                    <a href="gameSale.php">
                        <h4 class="text-white mt-5">Games On Sale<i class="bi bi-arrow-right-circle offset-9" style="font-size: 15px;"> View More</i> </h4> 
                    </a>
                </div>
            </div>

            <div class="col-12">
                <div class="row">

                    <div class="col-12">
                        <div class="row justify-content-center gap-2">

                            <?php

                            $new_rs = Database::search("SELECT * FROM `game` WHERE `discount`!='0' ORDER BY `release_date` DESC LIMIT 6 OFFSET 0");
                            $new_num = $new_rs->num_rows;

                            for ($z = 0; $z < $new_num; $z++) {
                                $new_data = $new_rs->fetch_assoc();
                                ?>

                                <div class="zoom card mt-4 hover-zoom shadow-2"
                                    style="width: 15rem; background-color: #2A2B2B;">
                                    <a href='<?php echo "singleProductView.php?id=" . $new_data["id"]; ?>'>

                                        <?php

                                        $new_image_rs = Database::search("SELECT * FROM `game_images` WHERE `game_id`='" . $new_data["id"] . "'");
                                        $new_image_data = $new_image_rs->fetch_assoc();

                                        $actual_price = $new_data["price"];
                                        $discount = $new_data["discount"];

                                        $selling_price = $actual_price - ($actual_price * ($discount / 100));

                                        ?>
                                         <div class="bg-image hover-zoom">
                                            <img src="<?php echo $new_image_data["path"]; ?>"
                                                class="card-img-top mt-2 rounded-4" alt="Sunset Over the Sea" />
                                        </div>
                                        <div class="card-body">
                                            <h5 class=" text-white">
                                                <?php echo $new_data["game_name"]; ?>
                                            </h5>
                                            <p class=" text-white-50">
                                                <!-- <?php echo $new_data["slogan"]; ?> -->
                                                <?php echo substr_replace($new_data["slogan"], "...", 100); ?>
                                            </p>
                                            <?php
                                            if($discount == 0){
                                                ?>
                                                <h4 class=" text-white">$
                                                <?php echo $new_data["price"]; ?>
                                            </h4>
                                            <?php
                                            }else{
                                                ?>
                                            <h6 class="text-white">$<?php echo round($selling_price,2); ?>
                                            <del class="text-white mx-2">$<?php echo round($actual_price,2); ?></del> 
                                            <span class="badge badge-secondary text-white bg-primary">-<?php echo $discount?>%</span></h6>
                                                <?php
                                            }
                                            ?>
                                            

                                           
                                        </div>
                                    </a>
                                </div>



                                <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class=" row justify-content-start">
                    <a href="allGames.php">
                        <h4 class="text-white mt-5">New Releases <i class="bi bi-arrow-right-circle offset-9" style="font-size: 15px;"> View More</i> </h4> 
                    </a>
                </div>
            </div>

            <div class="col-12">
                <div class="row">

                    <div class="col-12">
                        <div class="row justify-content-center gap-2">

                            <?php

                            $new_rs = Database::search("SELECT * FROM `game` WHERE `game_position_id`='1' AND `game_status_id`='1' ORDER BY `release_date` DESC LIMIT 12 OFFSET 0");
                            $new_num = $new_rs->num_rows;

                            for ($z = 0; $z < $new_num; $z++) {
                                $new_data = $new_rs->fetch_assoc();
                                ?>

                                <div class="zoom card mt-4 hover-zoom shadow-2"
                                    style="width: 15rem; background-color: #2A2B2B;">
                                    <a href='<?php echo "singleProductView.php?id=" . $new_data["id"]; ?>'>

                                        <?php

                                        $new_image_rs = Database::search("SELECT * FROM `game_images` WHERE `game_id`='" . $new_data["id"] . "'");
                                        $new_image_data = $new_image_rs->fetch_assoc();

                                        $actual_price = $new_data["price"];
                                        $discount = $new_data["discount"];

                                        $selling_price = $actual_price - ($actual_price * ($discount / 100));

                                        ?>
                                         <div class="bg-image hover-zoom">
                                            <img src="<?php echo $new_image_data["path"]; ?>"
                                                class="card-img-top mt-2 rounded-4" alt="Sunset Over the Sea" />
                                        </div>
                                        <div class="card-body">
                                            <h5 class=" text-white">
                                                <?php echo $new_data["game_name"]; ?>
                                            </h5>
                                            <p class=" text-white-50">
                                                <!-- <?php echo $new_data["slogan"]; ?> -->
                                                <?php echo substr_replace($new_data["slogan"], "...", 100); ?>
                                            </p>
                                            <?php
                                            if($discount == 0){
                                                ?>
                                                <h4 class=" text-white">$
                                                <?php echo $new_data["price"]; ?>
                                            </h4>
                                            <?php
                                            }else{
                                                ?>
                                            <h6 class="text-white">$<?php echo round($selling_price,2); ?>
                                            <del class="text-white mx-2">$<?php echo round($actual_price,2); ?></del> 
                                            <span class="badge badge-secondary text-white bg-primary">-<?php echo $discount?>%</span></h6>
                                                <?php
                                            }
                                            ?>
                                            

                                           
                                        </div>
                                    </a>
                                </div>



                                <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="row justify-content-start">
                    <a href="mostPopularGames.php">
                        <h4 class="text-white mt-5">Most Popular <i class="bi bi-arrow-right-circle offset-9" style="font-size: 15px;"> View More</i></h4>
                    </a>
                </div>
            </div>

            <div class="col-12">
                <div class="row">

                    <div class="col-12">
                        <div class="row justify-content-center gap-2">

                            <?php

                            $count_rs = Database::search("SELECT `game_id`, COUNT(`id`) FROM `sellings` GROUP BY game_id ORDER BY COUNT(`id`) DESC LIMIT 12");
                            $count_num = $count_rs->num_rows;

                            for ($c = 0; $c < $count_num; $c++) {
                                $count_data = $count_rs->fetch_assoc();



                                $popular_rs = Database::search("SELECT * FROM `game` WHERE `game`.`id`='" . $count_data["game_id"] . "' LIMIT 6 OFFSET 0");
                                $popular_num = $popular_rs->num_rows;

                                for ($p = 0; $p < $popular_num; $p++) {
                                    $popular_data = $popular_rs->fetch_assoc();

                                    $actual_price = $popular_data["price"];
                                    $discount = $popular_data["discount"];

                                    $selling_price = $actual_price - ($actual_price * ($discount / 100));
                                    ?>

                                    <div class="zoom card mt-4 mb-4 hover-zoom"
                                        style="width: 15rem; background-color: #2A2B2B;">
                                        <a href='<?php echo "singleProductView.php?id=" . $popular_data["id"]; ?>'>

                                            <?php

                                            $popular_image_rs = Database::search("SELECT * FROM `game_images` WHERE `game_id`='" . $popular_data["id"] . "'");
                                            $popular_image_data = $popular_image_rs->fetch_assoc();

                                            ?>
                <div class="bg-image hover-zoom">
                                                <img src="<?php echo $popular_image_data["path"]; ?>"
                                                    class="card-img-top mt-2 rounded-4" alt="Sunset Over the Sea" />
                                            </div>
                                            <div class="card-body">
                                                <h5 class=" text-white">
                                                    <?php echo $popular_data["game_name"]; ?>
                                                </h5>
                                                <p class=" text-white-50">
                                                    <!-- <?php echo $popular_data["slogan"]; ?> -->
                                                    <?php echo substr_replace($popular_data["slogan"], "...", 100); ?>
                                                </p>
                                                <?php
                                            if($discount == 0){
                                                ?>
                                                <h4 class=" text-white">$
                                                <?php echo $popular_data["price"]; ?>
                                            </h4>
                                            <?php
                                            }else{
                                                ?>
                                            <h6 class="text-white">$<?php echo round($selling_price,2); ?>
                                            <del class="text-white mx-2">$<?php echo round($actual_price,2); ?></del> 
                                            <span class="badge badge-secondary text-white bg-primary">-<?php echo $discount?>%</span></h6>
                                                <?php
                                            }
                                            ?>
                                            </div>
                                        </a>
                                    </div>



                                    <?php
                                }
                            }

                            ?>


                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="row justify-content-start">
                    <a href="upcomingGames.php">
                        <h4 class="text-white mt-5">Upcoming <i class="bi bi-arrow-right-circle offset-9" style="font-size: 15px;"> View More</i></h4>
                    </a>
                </div>
            </div>

            <div class="col-12">
                <div class="row">

                    <div class="col-12">
                        <div class="row justify-content-center gap-2">

                            <?php

                            $upcoming_rs = Database::search("SELECT * FROM `game` WHERE `game_position_id`='2' AND `game_status_id`='1' ORDER BY `release_date` DESC LIMIT 12 OFFSET 0");
                            $upcoming_num = $upcoming_rs->num_rows;

                            for ($z = 0; $z < $upcoming_num; $z++) {
                                $upcoming_data = $upcoming_rs->fetch_assoc();
                                ?>

                                <div class=" zoom card mt-4 mb-4 hover-zoom"
                                    style="width: 15rem; background-color: #2A2B2B;">
                                    <a href='<?php echo "singleProductView.php?id=" . $upcoming_data["id"]; ?>'>

                                        <?php

                                        $upcoming_image_rs = Database::search("SELECT * FROM `game_images` WHERE `game_id`='" . $upcoming_data["id"] . "'");
                                        $upcoming_image_data = $upcoming_image_rs->fetch_assoc();

                                        ?>
    <div class="bg-image hover-zoom">
                                            <img src="<?php echo $upcoming_image_data["path"]; ?>"
                                                class="card-img-top mt-2 rounded-4" alt="Sunset Over the Sea" />
                                        </div>
                                        <div class="card-body">
                                            <h5 class=" text-white">
                                                <?php echo $upcoming_data["game_name"]; ?>
                                            </h5>
                                            <p class=" text-white-50">
                                                <!-- <?php echo $upcoming_data["slogan"]; ?> -->
                                                <?php echo substr_replace($upcoming_data["slogan"], "...", 100); ?>
                                            </p>
                                            <h4 class=" text-white fs-6">Not Released
                                            </h4>
                                        </div>
                                    </a>
                                </div>



                                <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>


            </div>
            <div class="col-12">
                <div class="row justify-content-start">
                    <a href="">
                        <h4 class="text-white mt-5">Most Wishlisted <i class="bi bi-arrow-right-circle offset-9" style="font-size: 15px;"> View More</i></h4>
                    </a>
                </div>
            </div>

            <div class="col-12">
                <div class="row">

                    <div class="col-12">
                        <div class="row justify-content-center gap-2">

                            <?php

                            $wishlist_rs = Database::search("SELECT `game_id`, COUNT(`game_id`) FROM `wishlist` GROUP BY game_id ORDER BY COUNT(`game_id`) DESC LIMIT 12");
                            $wishlist_num = $wishlist_rs->num_rows;

                            for ($w = 0; $w < $wishlist_num; $w++) {
                                $wishlist_data = $wishlist_rs->fetch_assoc();

                               
                                ?>

                                <div class="zoom card mt-4 mb-4 hover-zoom"
                                    style="width: 15rem; background-color: #2A2B2B;">
                                    <a href='<?php echo "singleProductView.php?id=" . $wishlist_data["game_id"]; ?>'>

                                        <?php

                                        $wishlisted_rs = Database::search("SELECT * FROM `game` WHERE `id` = '" . $wishlist_data["game_id"] . "'");
                                        $wishlisted_data = $wishlisted_rs->fetch_assoc();

                                        $actual_price = $wishlisted_data["price"];
                                        $discount = $wishlisted_data["discount"];
        
                                        $selling_price = $actual_price - ($actual_price * ($discount / 100));

                                        $wishlist_image_rs = Database::search("SELECT * FROM `game_images` WHERE `game_id`='" . $wishlist_data["game_id"] . "'");
                                        $wishlist_image_data = $wishlist_image_rs->fetch_assoc();

                                        ?>
                                        
                                         <div class="bg-image hover-zoom">
                                            <img src="<?php echo $wishlist_image_data["path"]; ?>"
                                                class="card-img-top mt-2 rounded-4" alt="Sunset Over the Sea" />
                                        </div>
                                        <div class="card-body">
                                            <h5 class=" text-white">
                                                <?php echo $wishlisted_data["game_name"]; ?>
                                            </h5>
                                            <p class=" text-white-50">
                                                <!-- <?php echo $wishlisted_data["slogan"]; ?> -->
                                                <?php echo substr_replace($wishlisted_data["slogan"], "...", 100); ?>
                                            </p>
                                            <?php
                                            if($discount == 0){
                                                ?>
                                                <h4 class=" text-white">$
                                                <?php echo $wishlisted_data["price"]; ?>
                                            </h4>
                                            <?php
                                            }else{
                                                ?>
                                            <h6 class="text-white">$<?php echo round($selling_price,2); ?>
                                            <del class="text-white mx-2">$<?php echo round($actual_price,2); ?></del> 
                                            <span class="badge badge-secondary text-white bg-primary">-<?php echo $discount?>%</span></h6>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </a>
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
    </div>



    <?php include "footer.php"; ?>
    <script src="mdb.min.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>