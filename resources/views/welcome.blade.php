@extends('layouts.app-landing')
@push('style')
@endpush
@section('content')
<!-- modal -->

<!-- end-modal -->
  <header class="masthead text-white text-center">
      <div class="container d-flex align-items-center flex-column">
          <!-- Masthead Avatar Image-->
          <div id="header-image" class="rounded-circle d-flex align-items-center">
            <!-- <img class="masthead-avatar mb-5" src="{{asset('images/logo-2.png')}}" alt="..." /> -->
          </div>

          <!-- Masthead Heading-->
          <h1 class="masthead-heading text-uppercase mb-0">SHUNTECNO</h1>
          <!-- Icon Divider-->
          <div class="divider-custom divider-light">
              <div class="divider-custom-line"></div>
              <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
              <div class="divider-custom-line"></div>
          </div>
          <!-- Masthead Subheading-->
          <p class="masthead-subheading font-weight-light mb-0">Aplikasi Chatting Realtime</p>
      </div>
  </header>
@endsection
@push('scripts')
<script>
    $(window).scroll(function() {
        if ($(document).scrollTop() > 50) {
            $('.nav').addClass('affix');
            console.log("OK");
        } else {
            $('.nav').removeClass('affix');
        }
    });

    $('.navTrigger').click(function () {
$(this).toggleClass('active');
console.log("Clicked menu");
$("#mainListDiv").toggleClass("show_list");
$("#mainListDiv").fadeIn();
});

$(document).ready(function(){
  $(".login").click(function(){
      $("#loginModal").modal("show");
  });
});

$(document).ready(function(){
  $(".register").click(function(){
      $("#registerModal").modal("show");
  });
});
</script>
@endpush
