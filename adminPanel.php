<?php

session_start();

require "connection.php";

if (isset($_SESSION["au"])) {

    $admin = $_SESSION["au"]["email"];
    $admin_id = $_SESSION["au"]["id"];

    ?>

    <!DOCTYPE html>

    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin Panel</title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="mdb.min.css" />

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire">

        <link rel="icon" href="resources/logo2.png" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    </head>

    <body style=" background-color: #EAECEE ;">

        <div class=" container-fluid" style=" background-color: #FFFFFF;">
            <div class="row">

                <div class="card-body p-0">
                    <div class="row g-0">

                        <div class=" d-flex flex-row col-12 my-4 gap-4">
                            <div class="col-1  text-start">
                                <img src="resources/logo1.png" style="width: 100px;" />
                            </div>
                            <div class="col-3  text-start">
                                <h2 class=" font-weight-bolder">Admin Dashboard</h2>
                            </div>
                            <div class=" col-6 text-end">

                                <?php

                                $count_rs = Database::search("SELECT COUNT(`msg_status_id`) AS `value` FROM `chat` WHERE `user_to_id`='10' AND `msg_status_id`='1' ");
                                $count_data = $count_rs->fetch_assoc();
                                $count_num = $count_rs->num_rows;

                                ?>

                                <i class="bi bi-envelope fs-2" type="button" data-mdb-toggle="modal"
                                    data-mdb-target="#exampleModal">
                                    <?php
                                    if ($count_data["value"] == 0) {
                                        ?>
                                        <span class="badge bg-danger float-end rounded-5 text-center"
                                            style="font-size: 10px;"></span>
                                        <?php
                                    } else {
                                        ?>
                                        <span class="badge bg-danger float-end rounded-5 text-center" style="font-size: 10px;">
                                            <?php echo $count_data["value"]; ?>
                                        </span>
                                        <?php
                                    }
                                    ?>

                                </i>


                            </div>
                            <div class="col-1 text-start">

                                <?php

                                $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_id`='" . $admin_id . "'");
                                $image_data = $image_rs->fetch_assoc();


                                ?>



                                <?php

                                if (empty($image_data["path"])) {

                                    ?>
                                    <a href="adminProfile.php">
                                        <img src="resources/profile_images/user.svg" alt="Avatar" id="viewImg"
                                            class="img-fluid rounded-circle" style="width: 50px; height: 50px;" />
                                    </a>

                                    <?php

                                } else {

                                    ?>
                                    <a href="adminProfile.php">
                                        <img src="<?php echo $image_data["path"]; ?>" style="width: 50px; height: 50px;"
                                            class="img-fluid rounded-circle" />
                                    </a>

                                    <?php

                                }

                                ?>

                            </div>

                        </div>

                        <hr />

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-2  border-end" style=" background-color: #FFFFFF;">
                                    <div class="p-2">
                                        <nav class="nav flex-column">
                                            <a class="nav-link active zoom " aria-current="page"
                                                href="adminPanel.php">Dashboard</a>
                                            <a class="nav-link zoom" href="manageUsers.php">Manage Users</a>
                                            <a class="nav-link zoom" href="manageGames.php">Manage Games</a>
                                            <a class="nav-link zoom" href="manageAdmin.php">Manage Admin</a>
                                        </nav>

                                        <hr class="my-4">

                                        <button type="submit" class="btn btn-dark btn-block btn-lg"
                                            data-mdb-ripple-color="dark" onclick="adminSignOut();">Logout</button>

                                    </div>
                                </div>
                                <div class="col-10" style=" background-color: #FFFFFF;">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="d-flex flex-row align-items-center justify-content-center gap-4
                                            py-3">
                                                <div class="col-2">
                                                    <div class="card rounded-4 zoom"
                                                        style="background-color: #FFFFFF; height: 170px;">
                                                        <div class="row g-0">
                                                            <div class="col-md-4">
                                                                <img src="resources/profile_images/user1.svg"
                                                                    alt="Trendy Pants and Shoes"
                                                                    class="img-fluid rounded-start"
                                                                    style="height: 150px;" />
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="card-body">
                                                                    <h5 class="card-title font-italic">Total Users</h5>
                                                                    <hr />

                                                                    <?php
                                                                    $user_rs = Database::search("SELECT * FROM `user` WHERE `position_id` = '2'");
                                                                    $user_num = $user_rs->num_rows;
                                                                    ?>

                                                                    <p
                                                                        class="card-text fs-1 text-center text-black fw-bold">
                                                                        <?php echo $user_num; ?>
                                                                    </p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="card rounded-4 zoom"
                                                        style=" background-color: #FFFFFF;height: 170px;">
                                                        <div class="row g-0">
                                                            <div class="col-md-4 px-2">
                                                                <img src="resources/joystick.svg"
                                                                    alt="Trendy Pants and Shoes"
                                                                    class="img-fluid rounded-start"
                                                                    style="height: 150px;" />
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="card-body">
                                                                    <h5 class="card-title font-italic">Total Games</h5>
                                                                    <hr />

                                                                    <?php
                                                                    $game_rs = Database::search("SELECT * FROM `game`");
                                                                    $game_num = $game_rs->num_rows;
                                                                    ?>

                                                                    <p
                                                                        class="card-text fs-1 text-center text-black fw-bold">
                                                                        <?php echo $game_num; ?>
                                                                    </p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="card rounded-4 zoom"
                                                        style="height: 170px; background-color: #FFFFFF ;">
                                                        <div class="row g-0">
                                                            <div class="col-md-4 px-2">
                                                                <img src="resources/profile_images/sellings.svg"
                                                                    alt="Trendy Pants and Shoes"
                                                                    class="img-fluid rounded-start"
                                                                    style="height: 150px;" />
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="card-body">
                                                                    <h5 class="card-title font-italic">Total Sellings</h5>
                                                                    <hr />

                                                                    <?php
                                                                    $sellings_rs = Database::search("SELECT * FROM `sellings`");
                                                                    $sellings_num = $sellings_rs->num_rows;
                                                                    ?>

                                                                    <p
                                                                        class="card-text fs-1 text-center text-black fw-bold">
                                                                        <?php echo $sellings_num; ?>
                                                                    </p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="card rounded-4 zoom"
                                                        style="height: 170px; background-color: #FFFFFF;">
                                                        <div class="row g-0">
                                                            <div class="col-md-4 px-2">
                                                                <img src="resources/profile_images/sellings.svg"
                                                                    alt="Trendy Pants and Shoes"
                                                                    class="img-fluid rounded-start"
                                                                    style="height: 150px;" />
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="card-body">
                                                                    <h5 class="card-title font-italic">Today Sellings</h5>
                                                                    <hr />

                                                                    <?php

                                                                    $todayDate = date("Y-m-d");

                                                                    $sellings_rs = Database::search("SELECT * FROM `sellings` WHERE `purchased_date`='" . $todayDate . "'");
                                                                    $sellings_num = $sellings_rs->num_rows;

                                                                    ?>

                                                                    <p
                                                                        class="card-text fs-1 text-center text-black fw-bold">
                                                                        <?php echo $sellings_num; ?>
                                                                    </p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="d-flex flex-row align-items-center justify-content-center gap-4
                                            py-3">
                                                <div class="col-3">
                                                    <div class="card shadow rounded-4 zoom"
                                                        style="height: 170px; background-color: #FFFFFF ;">
                                                        <div class="row g-0">
                                                            <div class="col-md-4 px-2">
                                                                <img src="resources/coin.svg" alt="Trendy Pants and Shoes"
                                                                    class="img-fluid rounded-start"
                                                                    style="height: 150px;" />
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="card-body">
                                                                    <h5 class="card-title font-italic">Total Earnings</h5>
                                                                    <hr />

                                                                    <?php
                                                                    $total_rs = Database::search("SELECT SUM(`selling_price`) AS total FROM `sellings` ");
                                                                    $total_data = $total_rs->fetch_assoc();
                                                                    $total = $total_data["total"];
                                                                    $total_formatted = round($total, 2);
                                                                    ?>

                                                                    <p
                                                                        class="card-text fs-1 text-center text-black fw-bold">
                                                                        $
                                                                        <?php echo $total_formatted; ?>
                                                                    </p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="card shadow rounded-4 zoom"
                                                        style="height: 170px; background-color: #FFFFFF ;">
                                                        <div class="row g-0">
                                                            <div class="col-md-4 px-2">
                                                                <img src="resources/coin.svg" alt="Trendy Pants and Shoes"
                                                                    class="img-fluid rounded-start"
                                                                    style="height: 150px;" />
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="card-body">
                                                                    <h5 class="card-title font-italic">Today Earnings</h5>
                                                                    <hr />

                                                                    <?php
                                                                    $today_rs = Database::search("SELECT SUM(`selling_price`) AS today FROM `sellings` WHERE `purchased_date`='" . $todayDate . "'");
                                                                    $today_data = $today_rs->fetch_assoc();
                                                                    ?>

                                                                    <p
                                                                        class="card-text fs-1 text-center text-black fw-bold">
                                                                        $
                                                                        <?php echo round($today_data["today"],2) ?>
                                                                    </p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="card shadow rounded-4 zoom"
                                                        style="height: 170px; background-color: #FFFFFF ;">
                                                        <div class="row g-0">
                                                            <div class="col-md-4 px-2">
                                                                <img src="resources/coin.svg" alt="Trendy Pants and Shoes"
                                                                    class="img-fluid rounded-start"
                                                                    style="height: 150px;" />
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="card-body">
                                                                    <h5 class="card-title font-italic">Last 30 Day Earnings
                                                                    </h5>
                                                                    <hr />

                                                                    <?php
                                                                    $pm = date('Y-m-d', strtotime('-30 days'));
                                                                    $monthly_rs = Database::search("SELECT SUM(`selling_price`) AS total FROM `sellings` WHERE `purchased_date` BETWEEN '" . $pm . "' AND '" . $todayDate . "';");
                                                                    $monthly_data = $monthly_rs->fetch_assoc();
                                                                    $monthly_total = $monthly_data["total"];
                                                                    $monthly_formatted = round($monthly_total, 2);
                                                                    ?>

                                                                    <p
                                                                        class="card-text fs-1 text-center text-black fw-bold">
                                                                        $
                                                                        <?php echo $monthly_formatted; ?>
                                                                    </p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="d-flex flex-row align-items-center justify-content-center gap-5 
                                            py-3">
                                                <div class="col-3">
                                                    <div class="card mb-4 shadow rounded-4 zoom">

                                                        <?php

                                                        $freq_rs = Database::search("SELECT `game_id`, COUNT(`game_id`) AS `value_occurence` 
                                                    FROM `sellings` GROUP BY `game_id` ORDER BY 
                                                    `value_occurence` DESC LIMIT 1");

                                                        $freq_num = $freq_rs->num_rows;

                                                        $freq_data = $freq_rs->fetch_assoc();

                                                        $freq_game_rs = Database::search("SELECT * FROM `game` INNER JOIN `publisher` ON game.publisher_id=publisher.id INNER JOIN `developer` ON game.developer_id=developer.id WHERE `game`.`id`='" . $freq_data["game_id"] . "'");
                                                        $freq_game_data = $freq_game_rs->fetch_assoc();

                                                        $actual_price = $freq_game_data["price"];
                                                        $discount = $freq_game_data["discount"];
            
                                                        $selling_price = $actual_price - ($actual_price * ($discount / 100));
            

                                                        $image_rs = Database::search("SELECT * FROM `game_images` WHERE `game_id`='" . $freq_data["game_id"] . "'");
                                                        $image_data = $image_rs->fetch_assoc();
                                                        ?>

                                                        <img src="<?php echo $image_data["path"]; ?>" class="rounded-4" />
                                                        <div class="card-body">
                                                            <h5 class="card-title text-center">Best Selling Game</h5>
                                                            <hr />
                                                            <p class="card-text text-dark">Name :
                                                                <?php echo $freq_game_data["game_name"]; ?>
                                                            </p>
                                                            <p class="card-text text-dark">Developer :
                                                                <?php echo $freq_game_data["developer_name"]; ?>
                                                            </p>
                                                            <p class="card-text text-dark">Publisher :
                                                                <?php echo $freq_game_data["publisher_name"]; ?>
                                                            </p>
                                                            
                                                            <?php
                                                        if ($discount == 0) {
                                                            ?>
                                                            <p class="card-text text-dark">Price : $
                                                                <?php echo $freq_game_data["price"]; ?>
                                                            </p>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <p class=" text-black">Price : $
                                                                <?php echo round($selling_price, 2); ?>
                                                                <del class="text-danger mx-2">$
                                                                    <?php echo round($actual_price, 2); ?>
                                                                </del>
                                                                <span class="badge badge-secondary text-white bg-primary">-
                                                                    <?php echo $discount ?>%
                                                                </span>
                                                        </p>
                                                            <?php
                                                        }
                                                        ?>


                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-6 rounded-4 shadow zoom" style="background-color: #FFFFFF;">

                                                    <?php

                                                    $yvalues = array();
                                                    $dates = array();

                                                    $purchase_rs = Database::search("SELECT `purchased_date`, COUNT(`game_id`) AS `value_occurence`
                                                FROM `sellings`
                                                GROUP BY `purchased_date`
                                                ORDER BY 
                                                 `purchased_date` DESC LIMIT 7");



                                                    for ($p = 0; $p < $purchase_rs->num_rows; $p++) {
                                                        $purchase_data = $purchase_rs->fetch_assoc();

                                                        $yvalues[] = $purchase_data["value_occurence"];
                                                        $dates[] = $purchase_data["purchased_date"];
                                                    }


                                                    ?>

                                                    <div class="col-12 my-4">
                                                        <div class="row text-center">
                                                            <h2 class="fw-bold text-decoration-underline font-italic">Daily
                                                                Sellings
                                                            </h2>
                                                        </div>
                                                    </div>

                                                    <canvas id="myChart" style="width:100%;"></canvas>

                                                    <script>
                                                        var xValues = ["<?php echo $dates[6]; ?>", "<?php echo $dates[5]; ?>", "<?php echo $dates[4]; ?>", "<?php echo $dates[3]; ?>", "<?php echo $dates[2]; ?>", "<?php echo $dates[1]; ?>", "<?php echo $dates[0]; ?>",];
                                                        var yValues = [<?php echo $yvalues[6]; ?>, <?php echo $yvalues[5]; ?>, <?php echo $yvalues[4]; ?>, <?php echo $yvalues[3] ?>, <?php echo $yvalues[2] ?>, <?php echo $yvalues[1] ?>, <?php echo $yvalues[0] ?>,];
                                                        var barColors = ["blue", "blue", "blue", "blue", "blue", "blue", "blue"];

                                                        new Chart("myChart", {
                                                            type: "bar",
                                                            data: {
                                                                labels: xValues,
                                                                datasets: [{
                                                                    backgroundColor: barColors,
                                                                    data: yValues
                                                                }]
                                                            },
                                                            options: {
                                                                legend: { display: false },
                                                                scales: {
                                                                    yAxes: [{ ticks: { min: 0 } }],
                                                                }
                                                            }
                                                        });
                                                    </script>


                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>



                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content" style="width: 600px;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Messages</h5>
                                        <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card mask-custom bg-transparent">
                                            <div class="card-body">

                                                <ul class="list-unstyled mb-0" style="overflow-y: scroll; height:500px;">

                                                    <?php

                                                    $user_rs = Database::search("SELECT * FROM `chat` WHERE `user_from_id` != '10' GROUP BY `user_from_id` ORDER BY  `date_time` DESC");


                                                    for ($u = 0; $u < $user_rs->num_rows; $u++) {
                                                        $user_data = $user_rs->fetch_assoc();

                                                        $userDetails = Database::search("SELECT * FROM `user` WHERE `id`='" . $user_data["user_from_id"] . "'");
                                                        $userDetails_data = $userDetails->fetch_assoc();

                                                        $img_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_id`='" . $user_data["user_from_id"] . "'");
                                                        $img_data = $img_rs->fetch_assoc();

                                                        $count_rs = Database::search("SELECT COUNT(`msg_status_id`) AS `value` FROM `chat` WHERE `user_from_id`='" . $user_data["user_from_id"] . "' AND `msg_status_id`='1' ");
                                                        $count_data = $count_rs->fetch_assoc();


                                                        ?>

                                                        <li class="p-2 border-bottom bg-light mx-2">
                                                            <a href="<?php echo "adminChatView.php?uid=" . $user_data['user_from_id']; ?>"
                                                                class="d-flex justify-content-between link-light">
                                                                <div class="d-flex flex-row px-2">
                                                                    <img src="<?php echo $img_data["path"]; ?>" alt="avatar"
                                                                        class="rounded-circle d-flex align-self-center me-3 shadow-1-strong"
                                                                        width="60">
                                                                    <div class="pt-1">
                                                                        <p class="fw-bold mb-0 text-black">
                                                                            <?PHP echo $userDetails_data['fname'] . " " . $userDetails_data['lname']; ?>
                                                                        </p>
                                                                        <p class="small text-primary">
                                                                            <?PHP echo $user_data['message']; ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="pt-1 px-4">
                                                                    <p class="small text-dark mb-1">
                                                                        <?PHP echo $user_data['date_time']; ?>
                                                                    </p>
                                                                    <span class="badge bg-danger float-end">
                                                                        <?php echo $count_data["value"]; ?>
                                                                    </span>
                                                                </div>
                                                            </a>
                                                        </li>

                                                        </hr>

                                                        <?php
                                                    }
                                                    ?>



                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-mdb-dismiss="modal">Close</button>

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