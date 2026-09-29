<?php
require "connection.php";
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="mdb.min.css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire">

    <link rel="icon" href="resources/logo2.png" />

</head>

<body
    style=" background-image: url('resources/userSignIn.jpg'); background-repeat: no-repeat; background-size: cover;">

    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-10">
                    <div class="card text-white shadow-1"
                        style="border-radius: 1rem; background-color: hsla(0,100%,64%,0.6);">
                        <div class="card-body p-5 text-center">

                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-10 text-center">
                                    <h2 class="fw-bold mb-5">SignIn now</h2>
                                    <form>


                                        <!-- Email input -->
                                        <div class="form-outline mb-4">
                                            <input type="email" id="e2" class="form-control text-white" />
                                            <label class="form-label text-white-50">Email address</label>
                                        </div>

                                        <!-- Password input -->
                                        <div class="form-outline mb-4">
                                            <input type="password" id="p2" class="form-control text-white" />
                                            <label class="form-label text-white-50">Password</label>
                                        </div>

                                        <!-- Checkbox -->
                                        <div class="form-check d-flex justify-content-center mb-4">
                                            <input class="form-check-input me-2" type="checkbox" value="1"
                                                id="rememberme" />
                                            <label class="form-check-label" for="form2Example33">
                                                Remember Me
                                            </label>
                                        </div>

                                        <!-- Submit button -->
                                        <div class="col-12">
                                            <div class=" row col-6 offset-3">
                                            <button onclick="signIn();" type="button"
                                                class="btn btn-dark btn-block mb-2">
                                                Login
                                            </button>
                                        </div>
                                        </div>

                                        <!-- Register buttons -->
                                        <div class="text-center">
                                            <a class=" text-decoration-none text-white"
                                                onclick="forgotPassword();">Forgot
                                                Password?</a>

                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div>
                                <p class="mb-0">Don't have an account? <a href="signUp.php"
                                        class="text-white-50 fw-bold">Sign Up</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- modal -->

    <div class="modal" tabindex="-1" id="forgotPasswordModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reset Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">

                        <div class="col-6">
                            <label class="form-label">New Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="npi" />
                                <button class="btn btn-outline-secondary" type="button" id="npb"
                                    onclick="showPassword1();"><i id="sp1" class="bi bi-eye-slash-fill"></i></button>
                            </div>
                        </div>

                        <div class="col-6">
                            <label class="form-label">Re-type Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="rnp" />
                                <button class="btn btn-outline-secondary" type="button" id="rnpb"
                                    onclick="showPassword2();"><i id="sp2" class="bi bi-eye-slash-fill"></i></button>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Verification Code</label>
                            <input type="text" class="form-control" id="vc" />
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="resetpw();">Reset Password</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal -->

    </div>
    </div>




    <script src="mdb.min.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>