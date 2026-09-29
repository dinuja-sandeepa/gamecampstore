<!DOCTYPE html>

<html>

<head>
    <title>Invoice</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="mdb.min.css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire">

    <link rel="icon" href="resources/logo2.png" />

</head>

<body style=" background-color:white">

    <?php

    include "header.php";

    $umail = $_SESSION["u"]["email"];
    $code = $_SESSION["code"];
    ?>

    <?php



    $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $umail . "'");
    $user_data = $user_rs->fetch_assoc();



    $today = date("Y-m-d");
    ?>
    <div class=" container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="container mb-5 mt-3">
                    <div class="row d-flex align-items-baseline">
                        <div class="col-xl-9">
                            <p style="color: #7e8d9f;font-size: 20px;">Invoice >> <strong>ID: #
                                    <?php echo $code ?>
                                </strong></p>
                        </div>
                        <div class="col-xl-3 float-end">
                            <button class="btn btn-warning" onclick="printInvoice();">Print</button>
                            <button class="btn btn-warning" onclick="generatePDF();">Export</button>

                        </div>
                        <hr>
                    </div>
                    <div class="container" id="page">
                        <div class="col-md-12 mt-4">
                            <div class="text-center">
                                <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
                                <p class="pt-0">GameCamp Store</p>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-xl-8">
                                <ul class="list-unstyled">
                                    <li class="text-muted">To: <span style="color:#5d9fc5 ;">
                                            <?php echo $user_data["fname"]; ?>
                                        </span></li>
                                    <li class="text-muted">
                                        <?php echo $user_data["email"]; ?>
                                    </li>
                                    <li class="text-muted"><i class="bi bi-telephone-fill"></i>
                                        <?php echo $user_data["mobile"]; ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xl-4">
                                <p class="text-muted">Invoice</p>
                                <ul class="list-unstyled">
                                    <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                            class="fw-bold">ID:</span>#
                                        <?php echo $code ?>
                                    </li>
                                    <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                            class="fw-bold">Creation Date: </span>
                                        <?php echo $today ?>
                                    </li>
                                    <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                            class="me-1 fw-bold">Status:</span><span
                                            class="badge bg-warning text-black fw-bold">
                                            Paid</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="row my-2 mx-1 justify-content-center">
                            <table class="table table-striped table-borderless">
                                <thead style="background-color:#84B0CA ;" class="text-white">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Game Id</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $subtotal = 0;
                                    $dis = 0;
                                    $total = 0;

                                    $game_IDs = $_SESSION["game_IDs"];

                                    foreach ($game_IDs as $game_ID) {

                                        $id = $game_ID['id'];
                                        //$total = $game_ID['total'];

                                        

                                        $game_rs = Database::search("SELECT * FROM `game` INNER JOIN `developer` ON game.developer_id=developer.id INNER JOIN `publisher` ON game.publisher_id=publisher.id 
                                        INNER JOIN `platform` ON game.platform_id=platform.id  INNER JOIN game_position ON game_position.id=game.game_position_id WHERE game.id='" . $id . "'");
                                        $game_data = $game_rs->fetch_assoc();
                                        $game_num = $game_rs->num_rows;

                                        $actual_price = $game_data["price"];
                                        $discount = $game_data["discount"];

                                        $selling_price = $actual_price - ($actual_price * ($discount / 100));

                                        $subtotal = $subtotal + round($actual_price,2);
                                        $dis = $dis + round($actual_price * ($discount / 100),2);
                                        $total = $total + round($selling_price,2);

                                        $image_rs = Database::search("SELECT * FROM `game_images` WHERE `game_id`='" . $id . "'");
                                        $image_data = $image_rs->fetch_assoc();

                                        ?>

                                        <tr>
                                            <th><img src="<?php echo $image_data["path"]; ?>" style=" height : 50px;" />
                                            </th>
                                            <td>
                                                <?php echo $game_data["game_name"]; ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($discount == 0) {
                                                    ?>
                                                    <h6 class=" text-black fw-bold">$
                                                        <?php echo $game_data["price"]; ?>
                                                    </h6>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <h6 class=" text-black fw-bold">$
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
                                                <?php echo $id; ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>

                            </table>
                        </div>
                        <div class="row">
                            <div class="col-xl-8">
                                <p class="ms-3">Add additional notes and payment information</p>

                            </div>
                            <div class="col-xl-3">
                                <ul class="list-unstyled">
                                    <li class="text-muted ms-3"><span class="text-black me-4">SubTotal</span>$
                                        <?php echo $subtotal; ?>
                                    </li>
                                    <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Discount</span>-$ <?php echo $dis ?>
                                    </li>
                                </ul>
                                <p class="text-black float-start"><span class="text-black me-3"> Total
                                        Amount</span><span style="font-size: 25px;">$
                                        <?php echo $total; ?>
                                    </span></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xl-10 text-center">
                                <p>Thank you for your purchase</p>
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
    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>