<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/stylesheets.css">
</head>
  <body>
    <!-- header  -->

    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-dark">
          <div class="container-fluid">
            <a class="navbar-brand ml-5 px-5" href="/" aria-label="Logo Binar-Challenge">
              <svg width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>Logo Game</title>
                <rect width="49" height="49" fill="url(#pattern0)" />
                <defs>
                  <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0" transform="scale(0.00617284)" />
                  </pattern>
                  <image id="image0" width="162" height="162"
                    xlink:href="https://cdn.iconscout.com/icon/free/png-256/metamask-2728406-2261817.png" />
                </defs>
              </svg>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <!--menu1-->
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav text-center">
                <a class="nav-link text" aria-current="page" href="#">Home</a>
                <a class="nav-link" href="#">Work</a>
                <a class="nav-link" href="#">Contact</a>
                <a class="nav-link" href="#">About US</a>
              </div>
            </div>
            <!--menu2-->
            <div class="collapse navbar-collapse text-center" id="navbarNavAltMarkup">
              <ul class="navbar-nav ms-auto px-lg-2 mt-3 mt-lg-0">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    SIGN UP
                  </a>
                  <ul class="dropdown-menu dropdown-menu-light text-center w-25 p-3 mx-auto" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Sign Up</a></li>
                    <li><a class="dropdown-item" href="#">Login</a></li>
                  </ul>
                  <li class="nav-item">
                    <span class="d-none d-lg-block d-xl-block bold nav-link" style="color:aliceblue">|</span>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                      <img src="./assets/twitch.svg"> <span class="d-lg-none ml-3">Steam</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                      <img src="./assets/twitch.svg" alt="" srcset="">
                      <span class="d-lg-none ml-3">
                        Xbox
                      </span>
                    </a>
                  </li>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <div class="container header-info">
          <div class="row">
            <div class="col-md-6">
              <h3 class="header-mini-info">Doopstech</h3>
              <h1 class="header-tittle-info">learning should be fun</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="col-md-6">
                <img src="https://i.pinimg.com/originals/c2/8a/85/c28a85f5c9fc226116128a4f3ef8b020.png" class="img-fluid float-left" alt="" srcset="" width="500" height="500">
            </div>
          </div>  
        </div>
    </header>

    <!-- end header  -->
    <!-- section about us  -->
    <section class="service">
        <div class="container">
            <div class="row">
              <div class="col-lg-12 float-end text-end">
                <h1 class="service-tittle-info">Services.</h1>
                <h3 class="service-mini-info">OUR SERVICES FOR CLIENTS</h3>
              </div>
            </div>
            <div class="row">
              <div class="card" style="width: 20rem; height: 20rem;">
                <div class="card-body">
                  <h5 class="card-title">Lorem ipsum</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                </div>
              </div>
            </div>
        </div>
    </section>
    <!-- end section about us  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>