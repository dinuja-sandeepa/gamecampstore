<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Game Camp</title>

  <link rel="stylesheet" href="bootstrap.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="indexstyle.css" />
  <link rel="stylesheet" href="style.css" />

  <link rel="stylesheet" href="mdb.min.css" />

  <link rel="icon" href="resources/logo2.png" />

</head>

<body class="">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block" style="z-index: 2000;">
    <div class="container-fluid">
      <!-- Navbar brand -->
      <img src="resources/logo2.png" style="height: 40px;" />
      <a class="navbar-brand nav-link" target="_blank" href="index.php">
        <strong>GameCamp Store</strong>
      </a>

      <div class=" offset-7 mt-2">
        <ul class="navbar-nav mb-2 mb-lg-0 gap-3">
          <li class="nav-item mx-2">
            <a href="home.php" class=" text-decoration-none text-white fs-6 ">Home<a>
          </li>
          <li class="nav-item">
            <a href="signUp.php" class=" text-decoration-none text-white fs-6 ">SignUp</a>
          </li>
          <li class="nav-item">
            <a href="signIn.php" class=" text-decoration-none text-white fs-6 ">SignIn</a>
          </li>
          <li class="nav-item">
            <a href="" class=" text-decoration-none text-white fs-6 ">About Us</a>
          </li>
        </ul>


      </div>
    </div>
  </nav>
  <!-- Navbar -->

  <!-- Carousel wrapper -->
  <div id="introCarousel" class="carousel slide carousel-fade shadow-2-strong" data-mdb-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-mdb-target="#introCarousel" data-mdb-slide-to="0" class="active"></li>
      <li data-mdb-target="#introCarousel" data-mdb-slide-to="1"></li>
      <li data-mdb-target="#introCarousel" data-mdb-slide-to="2"></li>
    </ol>

    <!-- Inner -->
    <div class="carousel-inner">
      <!-- Single item -->
      <div class="carousel-item active">
        <div class="mask">
          <div class="d-flex justify-content-start offset-1 align-items-center h-100">
            <div class="text-white text-start">
              <!-- <h1 class=" welcome">WELCOME TO GAMECAMP STORE</h1>
              <p>Download your favourite games</p>
              <a class="btn btn-outline-light btn-lg m-2" href="home.php" target="_blank" role="button">Shop Now</a> -->
              <div class="text-box">
                <p class="welcome fade-in-up">WELCOME TO</p>
                <h1 class="gamecamp">GAMECAMPSTORE</h1>
                <!-- <h3 class="explore">Explore New Games</h3> -->
                <div class="mt-5">
                  <a class="shopNow" href="home.php">Shop Now</a>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <!-- Single item -->
      <div class="carousel-item">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
          <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white text-center">
              <div class="text-box">
                <h1 class="gamecampSub">THE BEST GAMES OUT THERE</h1>
                <h3 class="explore">Download your favourite games</h3>
                <a class="shopNow" href="home.php">Shop Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Single item -->
      <div class="carousel-item">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
          <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white text-center">
              <div class="text-box">
                <h1 class="gamecampSub">A NEW ERA FOR GAMERS</h1>
                <h3 class="explore">Download your favourite games</h3>
                <a class="shopNow" href="home.php">Shop Now</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Inner -->


  </div>
  <!-- Carousel wrapper -->

  </div>

  </div>

  <script src="mdb.min.js"></script>
  <script src="script.js"></script>
  <script src="bootstrap.js"></script>
</body>

</html>