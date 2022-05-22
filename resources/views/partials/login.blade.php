<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div id="formContent" class=" modal-content">
        <div class="mt-5 mb-4">
          <img  src="{{asset('images/logo-2.png')}}" height="50" width="50"  alt="">
        </div>
        <!-- Login Form -->
        <form class="form-login" method="POST" action="{{ route('login') }}">
          @csrf
          <input type="text" id="login" class="fadeIn second @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email" autofocus >
          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
          <input type="password" id="password" class="fadeIn third @error('password') is-invalid @enderror" name="password" placeholder="password" required autocomplete="current-password">
          @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>

          @enderror
          <input type="submit" class="fadeIn fourth" value="Log In">
        </form>
        <!-- Remind Passowrd -->
        <div id="formFooter">
          <a class="underlineHover" href="#">Forgot Password?</a>
        </div>
    </div>
    </div>
  </div>
  @section('scripts')
  @parent

  @if($errors->has('email') || $errors->has('password'))
      <script>
      $(function() {
          $('#loginModal').modal({
              show: true
          });
      });
      </script>
  @endif
  @endsection
