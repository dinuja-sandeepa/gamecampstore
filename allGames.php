<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Manage Games</title>

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


    <div class=" container-fluid">
        <div class="row">

            <div class="col-12 my-4">
                <div class="row text-center text-white">
                    <a class="text-start text-decoration-none text-white" href="home.php">
                            
                    <h1 class=" fw-bolder text-center">All Games</h1>
                </div>
            </div>

            <div class="col-12">
                <div class="row justify-content-center gap-2">

                    <?php

                    $query = "SELECT * FROM `game` WHERE `game_position_id`='1' AND `game_status_id`='1' ORDER BY `release_date` DESC";

                    $pageno;

                    if (isset($_GET["page"])) {
                        $pageno = $_GET["page"];
                    } else {
                        $pageno = 1;
                    }

                    $game_rs = Database::search($query);
                    $game_num = $game_rs->num_rows;

                    $results_per_page = 20;
                    $number_of_pages = ceil($game_num / $results_per_page);

                    $page_results = ($pageno - 1) * $results_per_page;
                    $selected_rs = Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                    $selected_num = $selected_rs->num_rows;



                    for ($z = 0; $z < $selected_num; $z++) {
                        $selected_data = $selected_rs->fetch_assoc();
                        ?>

                        <div class="card mt-4 hover-zoom" style="width: 18rem; background-color: #2A2B2B;">
                            <a href='<?php echo "singleProductView.php?id=" . $selected_data["id"]; ?>'>

                                <?php

                                $image_rs = Database::search("SELECT * FROM `game_images` WHERE `game_id`='" . $selected_data["id"] . "'");
                                $image_data = $image_rs->fetch_assoc();

                                ?>
<div class="bg-image hover-zoom">
                                <img src="<?php echo $image_data["path"]; ?>" class="card-img-top mt-2 rounded-4"
                                    alt="Sunset Over the Sea" />
</div>
                                <div class="card-body">
                                    <h5 class=" text-white">
                                        <?php echo $selected_data["game_name"]; ?>
                                    </h5>
                                    <p class=" text-white-50">
                                        <?php echo $selected_data["slogan"]; ?>
                                    </p>
                                    <h4 class=" text-white">$
                                        <?php echo $selected_data["price"]; ?>
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



    <!--  -->
    <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3 mt-3" >
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-lg justify-content-center">
                <li class="page-item" style="background-color: #2A2B2B;">
                    <a class="page-link" href="
                                                <?php if ($pageno <= 1) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno - 1);
                                                } ?>
                                                " aria-label="Previous">
                        <span aria-hidden="true" class=" text-white">&laquo;</span>
                    </a>
                </li>
                <?php

                for ($x = 1; $x <= $number_of_pages; $x++) {
                    if ($x == $pageno) {
                        ?>
                        <li class="page-item active">
                            <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li class="page-item" style="background-color: aqua;">
                            <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                        </li>
                        <?php
                    }
                }

                ?>

                <li class="page-item" style="background-color: #2A2B2B;">
                    <a class="page-link" href="
                                                <?php if ($pageno >= $number_of_pages) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno + 1);
                                                } ?>
                                                " aria-label="Next">
                        <span aria-hidden="true" class=" text-white">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!--  -->

    </div>
    </div>




    <script src="mdb.min.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>