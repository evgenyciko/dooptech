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
          <svg width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <title>Logo Game</title>
            <rect width="49" height="49" fill="url(#pattern0)" />
            <defs>
              <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                <use xlink:href="#image0" transform="scale(0.00617284)" />
              </pattern>
              <image id="image0" width="162" height="162" xlink:href="https://cdn.iconscout.com/icon/free/png-256/metamask-2728406-2261817.png" />
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
          <img src="./images/logo_doop.png" class="img-fluid float-left" alt="" srcset="" width="500" height="500">
        </div>
        <div class="col-md-6">
          <h3 class="header-mini-info">Doopstech</h3>
          <h1 class="header-tittle-info">learning should be fun</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
      </div>
    </div>
  </header>

  <!-- end header  -->

  <!-- service card -->
  <section class="page-card">
    <div class="container mx-auto">
      <div class="row tittle-card">
        <h1>Our Services</h1>
      </div>
      <div class="row">
        <div class="col"> 
          <div class="profile-card-4 text-center"><img src="./assets/ucen.jpg" class="img img-responsive">
            <div class="profile-content">
                <div class="profile-name">
                </div>
                <div class="profile-description">
                  <h3>Learning</h3>
                  <div class="postcard__bar"></div>
                  <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.</p>
                </div>
            </div>
          </div>
        </div> 
        <div class="col"> 
          <div class="profile-card-4 text-center"><img src="./assets/ucen.jpg" class="img img-responsive">
            <div class="profile-content">
                <div class="profile-name">
                </div>
                <div class="profile-description">
                  <h3>Blog</h3>
                  <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.</p>
                </div>
            </div>
          </div>
        </div>
        <div class="col"> 
          <div class="profile-card-4 text-center"><img src="./assets/ucen.jpg" class="img img-responsive">
            <div class="profile-content">
                <div class="profile-name">
                </div>
                <div class="profile-description">
                  <h3>Community</h3>
                  <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.</p>
                </div>
            </div>
          </div>
        </div>  
      </div>
    </div>
  </section>    
  <!-- end service card -->

  <!-- blog -->
  <section class="blog">
    <div class="container">
      <div class="container py-4">
        <div class="row">
          <h1>Our Blog</h1>
        </div>
          <article class="postcard dark green">
            <a class="postcard__img_link" href="#">
              <img class="postcard__img" src="https://picsum.photos/500/501" alt="Image Title" />
            </a>
            <div class="postcard__text">
              <h1 class="postcard__title green"><a href="#">Podcast Title</a></h1>
              <div class="postcard__subtitle small">
                <time datetime="2020-05-25 12:00:00">
                  <i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2020
                </time>
              </div>
              <div class="postcard__bar"></div>
              <div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim, commodi quia, doloribus eius! Ducimus nemo accusantium maiores velit corrupti tempora reiciendis molestiae repellat vero. Eveniet ipsam adipisci illo iusto quibusdam, sunt neque nulla unde ipsum dolores nobis enim quidem excepturi, illum quos!</div>
              <ul class="postcard__tagbox">
                <li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
                <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
                <li class="tag__item play green">
                  <a href="#"><i class="fas fa-play mr-2"></i>Play Episode</a>
                </li>
              </ul>
            </div>
          </article>
          <article class="postcard dark yellow">
            <a class="postcard__img_link" href="#">
              <img class="postcard__img" src="https://picsum.photos/501/501" alt="Image Title" />
            </a>
            <div class="postcard__text">
              <h1 class="postcard__title yellow"><a href="#">Podcast Title</a></h1>
              <div class="postcard__subtitle small">
                <time datetime="2020-05-25 12:00:00">
                  <i class="fas fa-calendar-alt mr-2"></i>Mon, May 25th 2020
                </time>
              </div>
              <div class="postcard__bar"></div>
              <div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim, commodi quia, doloribus eius! Ducimus nemo accusantium maiores velit corrupti tempora reiciendis molestiae repellat vero. Eveniet ipsam adipisci illo iusto quibusdam, sunt neque nulla unde ipsum dolores nobis enim quidem excepturi, illum quos!</div>
              <ul class="postcard__tagbox">
                <li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
                <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
                <li class="tag__item play yellow">
                  <a href="#"><i class="fas fa-play mr-2"></i>Play Episode</a>
                </li>
              </ul>
            </div>
          </article>
        <div class="row">
          <div class="col offset-11">
            <a href="#" class="btn btn-primary tombol">kontol</a>
          </div>
        </div>  
    </div>
  </section>
  <!-- end blog -->

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

  <div class="container">
    <footer class="py-5">
      <div class="row">
        <div class="col-2">
          <h5>Section</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
          </ul>
        </div>

        <div class="col-2">
          <h5>Section</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
          </ul>
        </div>

        <div class="col-2">
          <h5>Section</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
          </ul>
        </div>

        <div class="col-4 offset-1">
          <form>
            <h5>Subscribe to our newsletter</h5>
            <p>Monthly digest of whats new and exciting from us.</p>
            <div class="d-flex w-100 gap-2">
              <label for="newsletter1" class="visually-hidden">Email address</label>
              <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
              <button class="btn btn-primary" type="button">Subscribe</button>
            </div>
          </form>
        </div>
      </div>

      <div class="d-flex justify-content-between py-4 my-4 border-top">
        <p>&copy; 2022 Company, Inc. All rights reserved.</p>
        <ul class="list-unstyled d-flex">
          <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                <use xlink:href="#twitter" />
              </svg></a></li>
          <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                <use xlink:href="#instagram" />
              </svg></a></li>
          <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                <use xlink:href="#facebook" />
              </svg></a></li>
        </ul>
      </div>
    </footer>
  </div>


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
    if ($(window).scrollTop()) {
      $('nav').addClass('black');
    } else {
      $('nav').removeClass('black');
    }
  })
</script>

</html>