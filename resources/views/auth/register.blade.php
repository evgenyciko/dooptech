@extends('layouts.app-landing')
@push('style')

@endpush
@section('content')

<div class="main fadeInDown">
    <div class="container-reg shadow">
        <div class="sign-up-content">
            <form id="register" method="POST" class="signup-form" method="POST" action="{{ route('register') }}">
              @csrf
              <div class="form-textbox">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                    @error('name')
                        <span class="invalid-feedback d-flex justify-content-center" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="form-textbox">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="@error('email') is-invalid @enderror"  value="{{ old('email') }}" required autocomplete="email" />
                    @error('email')
                        <span class="invalid-feedback d-flex justify-content-center" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-textbox">
                    <label for="pass">Password</label>
                    <input type="password" name="password" id="pass" class="@error('password') is-invalid @enderror" required autocomplete="new-password" />
                    @error('password')
                        <span class="invalid-feedback d-flex justify-content-center" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-textbox">
                    <label for="pass">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="pass" class="" required autocomplete="new-password"/>
                </div>
                <!-- <div class="form-group">
                    <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                    <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                </div> -->
                <div class="form-textbox">
                    <input type="submit" name="submit" id="submit" class="submit" value="Create account" />
                </div>
            </form>
            <h4 class="loginhere">
                Already have an account ?<a href="{{route('login')}}" class="loginhere-link"> Log in</a>
            </h4>
        </div>
    </div>
</div>

@endsection
@push('script')
<script src="{{ asset('colorlib-regform-10/js/main.js') }}"></script>
@endpush
