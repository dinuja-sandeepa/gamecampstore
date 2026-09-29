<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Profile</title>

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
           

            ?>

            <?php

            if (isset($_SESSION["u"])) {

                $id = $_SESSION["u"]["id"];


                $details_rs = Database::search("SELECT * FROM `user`  WHERE `id`='" . $id . "'");
                $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_id`='" . $id . "'");

                $data = $details_rs->fetch_assoc();
                $image_data = $image_rs->fetch_assoc();

            ?>

                <section class="vh-100">
                    <div class="container py-5 h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col col-lg-10 mb-4 mb-lg-0">
                                <div class="card mb-3 text-white" style="border-radius: .5rem; background-color: #2A2B2B;">
                                    <div class="row g-0">
                                        <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">

                                            <?php

                                            if (empty($image_data["path"])) {

                                            ?>
                                                <img src="resources/profile_images/user.svg" id="viewImg" class="img-fluid my-5 rounded-circle" style="width: 80px;" />

                                            <?php

                                            } else {

                                            ?>

                                                <img src="<?php echo $image_data["path"]; ?>" alt="Avatar" id="viewImg" class="img-fluid my-5 rounded-circle" style="width: 80px;" />

                                            <?php

                                            }

                                            ?>

                                            <h5 class=""><?php echo $data["fname"] . " " . $data["lname"]; ?></h5>

                                            <input type="file" class="d-none" id="profileimg" accept="image/*" />
                                            <label for="profileimg" class="btn btn-primary mt-2" onclick="changeImage();">Update Profile Image</label>

                                            <i class="far fa-edit mb-5"></i>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body p-4">
                                                <h6>Information</h6>
                                                <hr class="mt-0 mb-4">
                                                <div class="row pt-1">
                                                    <div class="col-6 mb-3">
                                                        <h6>First Name</h6>
                                                        <input type="text" style="background-color: #202020;" class="form-control text-white border-0" value="<?php echo $data["fname"]; ?>" id="fname" />
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <h6>Last Name</h6>
                                                        <input type="text" style="background-color: #202020;" class="form-control text-white border-0" value="<?php echo $data["lname"]; ?>" id="lname" />
                                                    </div>
                                                </div>

                                                <div class="row pt-1">
                                                    <div class="col-6 mb-3">
                                                        <h6>Email</h6>
                                                        <p class=" text-white-50"><?php echo $data["email"]; ?></p>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <h6>Mobile</h6>
                                                        <input type="text" style="background-color: #202020;" class="form-control text-white border-0" value="<?php echo $data["mobile"]; ?>" id="mobile" />
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <button class="btn btn-outline-info" onclick="updateProfile();">Update My Profile</button>

                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            <?php

            } else {
                header("Location:http://localhost/gamecamp/home.php");
            }

            ?>


        </div>
    </div>



    <?php include "footer.php"; ?>
    <script src="mdb.min.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>