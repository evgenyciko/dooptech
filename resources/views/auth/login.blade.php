@extends('layouts.app-landing')
@push('style')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endpush
@section('content')
<main class="py-4">
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      <!-- Icon -->
      <div class="mt-5 mb-4">
        <img  src="{{asset('images/logo-2.png')}}" height="50" width="50"  alt="">
      </div>
      <!-- Login Form -->
      <form class="" method="POST" action="{{ route('login') }}">
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
</main>
@endsection
