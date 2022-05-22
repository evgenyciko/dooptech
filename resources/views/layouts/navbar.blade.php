<nav class="nav">
        <div class="container">
            <!-- <div class="logo rounded-circle ">
              <a href="{{ url('/') }}">
                <img  src="{{asset('images/logo-2.png')}}"  width="40" height="40"  alt="">
              </a>
            </div> -->
            <div id="mainListDiv" class="main_list">
                <ul class="navlinks">
                      <!-- Authentication Links -->
                      @if (Route::has('login'))
                      @auth
                        <li><a href="{{ url('/home') }}">Home</a></li>
                      @else
                      <li class="login"><a href="#">Login</a></li>
                      @if (Route::has('register'))
                      <li class="register"><a href="#">Register</a></li>
                      @endif
                      @endauth
                      @endif
                </ul>
            </div>
            <span class="navTrigger ">
              <div class="burger">
                <i></i>
                <i></i>
                <i></i>
              </div>  
            </span>
        </div>
    </nav>
