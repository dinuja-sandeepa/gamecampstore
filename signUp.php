<?php
require "connection.php";
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="mdb.min.css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire">

    <link rel="icon" href="resources/logo2.png" />

</head>

<body
    style=" background-image: url('resources/UserSignUpBackground.jpg'); background-repeat: no-repeat; background-size: cover;">

    <section class="vh-100 h-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-6">
                    <div class="card rounded-3" style=" background-color: hsla(0,0%,0%,0.6)">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2 text-white fw-bold text-center">SignUp</h3>

                            <form class="px-md-2">

                                <div class="col-12 d-none" id="msgdiv">

                                    <div class="alert alert-danger" role="alert" id="alertdiv">
                                        <i class="bi bi-x-octagon-fill fs-6" id="msg"></i>

                                    </div>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="text" id="e" class="form-control text-white" />
                                    <label class="form-label text-white-50">Email</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="text" id="f" class="form-control  text-white" />
                                    <label class="form-label text-white-50">First Name</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="text" id="l" class="form-control  text-white" />
                                    <label class="form-label text-white-50">Last Name</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="text" id="p" class="form-control  text-white" />
                                    <label class="form-label text-white-50">Password</label>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline datepicker">
                                            <input type="text" class="form-control  text-white" id="m" />
                                            <label class="form-label text-white-50">Mobile</label>
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <select class=" form-select opacity-50 bg-dark text-white" id="g">
                                            <option>Select Your Gender</option>
                                            <?php

                                            $rs = Database::search("SELECT * FROM `gender`");
                                            $n = $rs->num_rows;

                                            for ($x = 0; $x < $n; $x++) {
                                                $d = $rs->fetch_assoc();

                                                ?>

                                                <option value="<?php echo $d["id"]; ?>"><?php echo $d["gender_name"]; ?>
                                                </option>

                                                <?php

                                            }
                                            ?>
                                        </select>

                                    </div>
                                </div>



                                <button type="button" class="btn btn-dark btn-lg mb-1 offset-5"
                                    onclick="signUp();">Submit</button>

                                <div class=" text-center mt-2">
                                    <p class="mb-0 text-white">Already have an account? <a href="signIn.php"
                                            class="text-white fw-bold">SignIn</a>
                                    </p>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--  -->

    <div class="modal rounded-5 " style=" margin-top: 300px;" tabindex="-1" id="Successfully_signup">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center text-dark">
                    <p>Account Created Successfully</p>
                    <a href="signIn.php"><button type="button" class="btn btn-success" data-bs-dismiss="modal"><i
                                class="bi bi-check-lg fw-bold fs-5"></i></button></a>
                </div>
            </div>
        </div>
    </div>


    <!--  -->

    </div>
    </div>




    <script src="mdb.min.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>