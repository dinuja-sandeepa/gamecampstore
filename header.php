<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>header</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="mdb.min.css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire">

    <link rel="icon" href="resources/logo2.png" />

</head>

<body style="background-color: #121313;">



    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg" style="background-color: #2A2B2B;">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" href="#">
                    <img src="resources/logo2.png" height="20" alt="MDB Logo" loading="lazy" />
                </a>
                <!-- Left links -->
                <ul class="navbar-nav me-auto  mb-2 mb-lg-0 text-white">
                    <li class="nav-item text-white">
                        <a class="nav-link text-white" href="home.php">GameCamp</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="userChatView.php">HELP</a>
                    </li>
                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->

            <div class="d-flex align-items-center">


                <?php

                session_start();
                require "connection.php";

                if (isset($_SESSION["u"])) {
                    $data = $_SESSION["u"];



                    $count_rs = Database::search("SELECT COUNT(`msg_status_id`) AS `value` FROM `chat` WHERE `user_to_id`='" . $data["id"] . "' AND `msg_status_id`='1' ");
                    $count_data = $count_rs->fetch_assoc();
                    $count_num = $count_rs->num_rows;


                    ?>

                    <label class="mx-3 text-info">Welcome
                        <?php echo $data["fname"]; ?>
                    </label>

                    <a class="text-reset me-3" href="userChatView.php">
                        <i class="bi bi-envelope text-white fs-4">
                            <?php
                            if ($count_data["value"] == 0) {
                                ?>
                                <span class="badge bg-danger float-end rounded-5 text-center" style="font-size: 10px;"></span>
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
                    </a>





                    <?php

                } else {

                    ?>

                    <a href="signin.php"><button class="btn mx-3 fw-bold" style="background-color: #17E6E6;">Sign In or
                            Register</button></a>

                    <?php

                }


                ?>




                <!-- cart -->
                <a class="text-reset me-3" href="cart.php">
                    <i class="bi bi-cart-check text-success fs-3"></i>
                </a>

                <a class="text-reset me-3" href="wishlist.php">
                    <img src="resources/wishlist.png" class="rounded-circle " height="30"
                        alt="Black and White Portrait of a Man" loading="lazy" />

                </a>


                <!-- Avatar -->
                <div class="dropdown">
                    <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                        id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">


                        <img src="resources/category.svg" class="rounded-circle " height="30"
                            alt="Black and White Portrait of a Man" loading="lazy" />


                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item " href="profile.php">My profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="wishlist.php">Wishlist</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="cart.php">Cart</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="library.php">Library</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#" onclick="signOut()" ;>Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->


    <script src="mdb.min.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>