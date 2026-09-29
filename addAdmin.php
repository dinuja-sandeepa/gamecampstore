<?php
require "connection.php";
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add New Admin</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="mdb.min.css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire">

    <link rel="icon" href="resources/logo2.png" />

</head>

<body
style=" background-image: url('resources/UserSignUpBackground.jpg'); background-repeat: no-repeat; background-size: cover;">>

    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-10">
                    <div class="card text-white shadow-1" style=" background-color: hsla(0,0%,0%,0.6)"
                        >
                        <div class="card-body p-5 text-center">

                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-10 text-center">
                                    <h2 class="fw-bold mb-5">Add New Admin</h2>
                                    <form>


                                        <!-- Email input -->
                                        <div class="form-outline mb-4">
                                            <input type="email" id="e" class="form-control text-white" />
                                            <label class="form-label text-white-50">Email address</label>
                                        </div>

                                        <!-- Password input -->
                                        <div class="form-outline mb-4">
                                            <input id="fn" class="form-control text-white" />
                                            <label class="form-label text-white-50">First Name</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input  id="ln" class="form-control text-white" />
                                            <label class="form-label text-white-50">Last Name</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input id="m" class="form-control text-white" />
                                            <label class="form-label text-white-50">Mobile</label>
                                        </div>

                                
                                        <!-- Submit button -->
                                        <div class="col-12">
                                            <div class=" row col-6 offset-3">
                                            <button onclick="addAdmin();" type="button"
                                                class="btn btn-outline-light btn-block mb-2">
                                                Add
                                            </button>
                                        </div>
                                        </div>

                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- modal -->

    <div class="modal rounded-5 " style=" margin-top: 300px;" tabindex="-1" id="addAdmin">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center text-dark">
                    <p>Admin added successfully</p>
                    <a href="manageAdmin.php"><button type="button" class="btn btn-success" data-bs-dismiss="modal"><i
                                class="bi bi-check-lg fw-bold fs-5"></i></button></a>
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