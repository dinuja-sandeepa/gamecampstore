<?php
require "connection.php";
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Login</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="mdb.min.css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire">

    <link rel="icon" href="resources/logo2.png" />

</head>

<body
    style=" background-image: url('resources/AdminSignIn.jpg'); background-repeat: no-repeat; background-size: cover;">

    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card text-white" style="border-radius: 1rem; background-color: hsla(0,0%,0%,0.7);">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase mb-5">Admin Login</h2>
                                <div class="col-12 d-none my-3" id="msgdiv">

                                    <div class="alert alert-danger" role="alert" id="alertdiv">
                                        <i class="bi bi-x-octagon-fill fs-6" id="msg"></i>

                                    </div>
                                </div>
                                <p class="text-white-50">Please enter your email!</p>

                                <div class="form-outline form-white mb-4">
                                    <input type="email" id="Ae" class="form-control form-control-lg" />
                                    <label class="form-label">Email</label>
                                </div>

                                <button class="btn btn-outline-light btn-lg px-5" type="submit"
                                    onclick="adminVerification();">Login</button>

                                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                    <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                </div>

                            </div>

                            <div>
                                <p class="mb-0">Not an Admin? SignIn as a User <a href="signIn.php"
                                        class="text-white-50 fw-bold">Sign
                                        In</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--  -->

        <div class="modal" style=" margin-top: 300px;" tabindex="-1" id="verificationModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Admin Verification</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label class="form-label">Enter Your Verification Code</label>
                        <input type="text" class="form-control" id="vcode">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="verify();">Verify</button>
                    </div>
                </div>
            </div>
        </div>

        <!--  -->

    </section>

    <script src="mdb.min.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>