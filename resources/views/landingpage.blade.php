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
        <nav class="navbar navbar-expand-lg navbar-dark nav">
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

    <!-- service -->
    <section class="page-service">
      <div class="container">
      <div class="row service">
        <h1>Our Services</h1>
      </div>
      <div class="row service-us">
        <div class="col-lg-6">
          <img src="https://ibixion.com/wp-content/uploads/2020/04/Hacker-II-1.jpg" class="img-fluid">
        </div>
        <div class="col-lg-5">
          <h4>You work like at home</h4>
          <p>Bekerja dengan suasana hati yang lebih asik dan mempelajari hal baru setiap harinya.</p>
          <h4>You work like at home</h4>
          <p>Bekerja dengan suasana hati yang lebih asik dan mempelajari hal baru setiap harinya.</p>
          <h4>You work like at home</h4>
          <p>Bekerja dengan suasana hati yang lebih asik dan mempelajari hal baru setiap harinya.</p>
          <h4>You work like at home</h4>
          <p>Bekerja dengan suasana hati yang lebih asik dan mempelajari hal baru setiap harinya.</p>
        </div>
      </div>
      </div>
    </section>
    <!-- end service -->

    <!-- section why  -->
    <section class="page-why">
      <div class="container">
        <div class="row why">
          <h1>Why Choose Us?</h1>
        </div>
        <div class="row why-us">
          <div class="col-lg-6">
            <img src="https://ibixion.com/wp-content/uploads/2020/04/Hacker-II-1.jpg" class="img-fluid">
          </div>
          <div class="col-lg-5">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque sed perspiciatis nobis ipsa quas, fugit esse! Ipsum ea ipsa explicabo quo assumenda doloribus blanditiis hic quos, dolorem nulla, autem incidunt, sapiente facere eveniet laudantium. Reprehenderit illum cumque consequuntur, cum dolor repellat accusantium ut nemo eius in perferendis doloribus? Amet suscipit alias obcaecati aut explicabo. Eum nesciunt quisquam, similique totam possimus sunt rerum sed ratione? Exercitationem delectus culpa fugiat asperiores quasi repudiandae facere perferendis autem non? Consequatur nostrum assumenda pariatur eum magnam id distinctio corporis odio quia debitis. Qui totam adipisci magnam voluptate tenetur, fugiat velit neque rem, porro molestias doloribus.</p>
          </div>
        </div>
      </div>
    </section>
    <!-- end why  -->

    <!-- card -->

    <section class="page-card">
    <div class="container">
        <div class="row">
          <div class="col-lg-12 float-end text-end">
            <h1 class="service-tittle-info">Services.</h1>
            <h3 class="service-mini-info">OUR SERVICES FOR CLIENTS</h3>
          </div>
        </div>
      <div class="row test1">
          <!-- section about us  -->
        <div class="col-lg-3 test">
          <div class="card1">
                <a href="#" class="card__link">
              <!-- Media -->
              <div class="row">
                <div class="card__media">
                  <img src="./assets/rockpaperstrategy-1600.jpg" class="img-fluid">
                </div>
              </div>
              <!-- Header -->
              <div class="row">
                <div class="card__header">
                  <h3 class="card__header-title">Title of Card</h3>
                  <p class="card__header-meta">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
              </div>
              <div class="row">
                  <div class="card__header-icon">
                    <svg viewbox="0 0 28 25">
                      <path fill="#fff" d="M13.145 2.13l1.94-1.867 12.178 12-12.178 12-1.94-1.867 8.931-8.8H.737V10.93h21.339z"/>
                    </svg>
                  </div>
              </div>
            </a>
          </div>
        </div>
        
        <div class="col-lg-3 test">
          <div class="card1">
                <a href="#" class="card__link">
              <!-- Media -->
              <div class="row">
                <div class="card__media">
                  <img src="./assets/rockpaperstrategy-1600.jpg" class="img-fluid">
                </div>
              </div>
              <!-- Header -->
              <div class="row">
                <div class="card__header">
                  <h3 class="card__header-title">Title of Card</h3>
                  <p class="card__header-meta">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
              </div>
              <div class="row">
                  <div class="card__header-icon">
                    <svg viewbox="0 0 28 25">
                      <path fill="#fff" d="M13.145 2.13l1.94-1.867 12.178 12-12.178 12-1.94-1.867 8.931-8.8H.737V10.93h21.339z"/>
                    </svg>
                  </div>
              </div>
            </a>
          </div>
        </div>
        
        <div class="col-lg-3 test">
          <div class="card1">
                <a href="#" class="card__link">
              <!-- Media -->
              <div class="row">
                <div class="card__media">
                  <img src="./assets/rockpaperstrategy-1600.jpg" class="img-fluid">
                </div>
              </div>
              <!-- Header -->
              <div class="row">
                <div class="card__header">
                  <h3 class="card__header-title">Title of Card</h3>
                  <p class="card__header-meta">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
              </div>
              <div class="row">
                  <div class="card__header-icon">
                    <svg viewbox="0 0 28 25">
                      <path fill="#fff" d="M13.145 2.13l1.94-1.867 12.178 12-12.178 12-1.94-1.867 8.931-8.8H.737V10.93h21.339z"/>
                    </svg>
                  </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-lg-3 test">
          <div class="card1">
                <a href="#" class="card__link">
              <!-- Media -->
              <div class="row">
                <div class="card__media">
                  <img src="./assets/rockpaperstrategy-1600.jpg" class="img-fluid">
                </div>
              </div>
              <!-- Header -->
              <div class="row">
                <div class="card__header">
                  <h3 class="card__header-title">Title of Card</h3>
                  <p class="card__header-meta">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
              </div>
              <div class="row">
                  <div class="card__header-icon">
                    <svg viewbox="0 0 28 25">
                      <path fill="#fff" d="M13.145 2.13l1.94-1.867 12.178 12-12.178 12-1.94-1.867 8.931-8.8H.737V10.93h21.339z"/>
                    </svg>
                  </div>
              </div>
            </a>
          </div>
        </div>
          
          
      </div>
  </div>
</section>


    <!-- end card -->
    
    <!-- section about us  -->
    <section class="page-about">
      <div class="container">
        <div class="row about">
          <h1>About Us</h1>
        </div>
        <div class="row about-us">
          <div class="col-lg-6">
            <img src="https://ibixion.com/wp-content/uploads/2020/04/Hacker-II-1.jpg" class="img-fluid">
          </div>
          <div class="col-lg-5">
            <h3>You work like at home</h3>
            <p>Bekerja dengan suasana hati yang lebih asik dan mempelajari hal baru setiap harinya.</p>
            <a href="#" class="btn btn-primary tombol">Gallery</a>
          </div>
        </div>
      </div>
    </section>
    <!-- end about us  -->
    
    <!-- footer -->

    <section class="page-footer">
      <div class="container-fluid">
        <div class="row footer border-bottom">
          <div class="col-md-3">
            <h4>About Us</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime molestias aliquam enim odio ut beatae doloremque modi quo quidem distinctio, suscipit perspiciatis magnam omnis dolorem ex, nisi ad qui ipsa.</p>
          </div>
          <div class="col-md-3">
            <div class="row">
              <div class="col-12">
                <h4>Contact US</h4>
                <ul>
                  <li>081930812</li>
                  <li>kontol@gmail.com</li>
                  <li>di cerita senja</li>
                </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="bawah">
          <p class="text-left text-muted">&copy; 2022, Inc. All Right Reserved</p>
      </div>
    </section>



    <!-- footer -->
    
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
  <script>
  $(document).ready(function() {
            $(".menu-icon").on("click", function() {
                  $("nav ul").toggleClass("showing");
            });
      });

      // Scrolling Effect

      $(window).on("scroll", function() {
            if($(window).scrollTop()) {
                  $('nav').addClass('black');
            }
            else {
                  $('nav').removeClass('black');
            }
      })
    </script>
</html>