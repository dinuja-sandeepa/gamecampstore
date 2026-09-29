<?php

session_start();

require "connection.php";

if (isset($_SESSION["au"])) {

    ?>


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

    <body style=" background-color:#121313 ">


        <div class=" container-fluid">
            <div class="row">

                <div class="col-12 my-4">
                    <div class="row text-center text-white">
                        <a class="text-start text-decoration-none text-white" href="adminPanel.php"><i
                                class="bi bi-arrow-bar-left fw-bold"></i> Dashboard</a>
                        <h1 class=" fw-bolder">Manage Games</h1>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                        <table class="table align-middle mb-0 text-white" style=" background-color:#2A2B2B ">
                            <thead class="" style=" background-color:#2A2B2B ">
                                <tr class=" fw-bolder">
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Release Date</th>
                                    <th>Actions</th>
                                    <th>Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $query = "SELECT * FROM `game`";

                                $pageno;

                                if (isset($_GET["page"])) {
                                    $pageno = $_GET["page"];
                                } else {
                                    $pageno = 1;
                                }

                                $game_rs = Database::search($query);
                                $game_num = $game_rs->num_rows;

                                $results_per_page = 5;
                                $number_of_pages = ceil($game_num / $results_per_page);

                                $page_results = ($pageno - 1) * $results_per_page;
                                $selected_rs = Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                                $selected_num = $selected_rs->num_rows;



                                for ($x = 0; $x < $selected_num; $x++) {
                                    $selected_data = $selected_rs->fetch_assoc();

                                    $actual_price = $selected_data["price"];
                                    $discount = $selected_data["discount"];

                                    $selling_price = $actual_price - ($actual_price * ($discount / 100));

                                    ?>

                                    <tr class="zoom">
                                        <td>
                                            <div class="d-flex align-items-center">

                                                <?php
                                                $image_rs = Database::search("SELECT * FROM `game_images` WHERE `game_id`='" . $selected_data["id"] . "' ");
                                                $image_data = $image_rs->fetch_assoc();
                                                ?>


                                                <img src="<?php echo $image_data["path"]; ?>" style="width: 100px; height: 50px"
                                                    class=" rounded-4" />
                                                <div class="ms-3">
                                                    <p class="fw-bold mb-1">
                                                        <?php echo $selected_data["game_name"]; ?>
                                                    </p>

                                                </div>
                                            </div>
                                        </td>
                                        <td>


                                            <?php
                                            if ($discount == 0) {
                                                ?>
                                                <h6 class="text-start">
                                                    <strong>$
                                                        <?php echo $selected_data["price"] ?>
                                                    </strong>
                                                </h6>
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

                                        </td>


                                        <td>
                                            <p class="fw-normal mb-1">$
                                                <?php echo $selected_data["release_date"]; ?>
                                            </p>

                                        </td>


                                        <td>
                                            <?php

                                            if ($selected_data["game_status_id"] == 1) {
                                                ?>
                                                <button id="pb<?php echo $selected_data['id']; ?>" type="button"
                                                    class="btn btn-danger"
                                                    onclick="blockProduct('<?php echo $selected_data['id']; ?>');">Block</button>
                                                <?php
                                            } else {
                                                ?>
                                                <button id="pb<?php echo $selected_data['id']; ?>" type="button"
                                                    class="btn btn-success"
                                                    onclick="blockProduct('<?php echo $selected_data['id']; ?>');">Unblock</button>
                                                <?php
                                            }
                                            ?>
                                        </td>

                                        <td>
                                            <button type="button" class="btn btn-info"
                                                onclick="sendId(<?php echo $selected_data['id']; ?>);">Update</button>
                                        </td>
                                    </tr>

                                    <?php
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>

                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-10">
                            <button type="button" class="btn btn-warning btn-block btn-lg rounded-3 mt-3"
                                data-mdb-ripple-color="dark" onclick="window.location='addGame.php'">Add New Game</button>
                        </div>
                    </div>
                </div>



                <!--  -->
                <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3 mt-3">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pagination-lg justify-content-center">
                            <li class="page-item">
                                <a class="page-link text-white" href="
                                                <?php if ($pageno <= 1) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno - 1);
                                                } ?>
                                                " aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php

                            for ($x = 1; $x <= $number_of_pages; $x++) {
                                if ($x == $pageno) {
                                    ?>
                                    <li class="page-item active">
                                        <a class="page-link text-white" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                    </li>
                                    <?php
                                } else {
                                    ?>
                                    <li class="page-item">
                                        <a class="page-link text-white" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                    </li>
                                    <?php
                                }
                            }

                            ?>

                            <li class="page-item">
                                <a class="page-link text-white" href="
                                                <?php if ($pageno >= $number_of_pages) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno + 1);
                                                } ?>
                                                " aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
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

    <?php

} else {
    echo ("You are Not a valid user");
}

?>