@extends('layouts.app-dashboard')
@section('content')
<div id="update-lokasi" class="d-flex justify-content-center mb-5">

</div>
<div class="">
  <button class="check" type="button" name="button">testing</button>
</div>



<video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" poster="http://video-js.zencoder.com/oceans-clip.png" data-setup="{}">
  <source src="http://103.160.63.178:8080/hls/patroli1.m3u8" type='application/x-mpegURL' />
  <track kind="captions" src="captions.vtt" srclang="en" label="English" />
</video>

<hr/>
<!-- ID Must Be Unique -->
<video id="example_video_2" class="video-js vjs-default-skin" controls preload="none" poster="http://video-js.zencoder.com/oceans-clip.png" data-setup="{}">
  <source src="http://103.160.63.178:8080/hls/patroli1.m3u8" type='application/x-mpegURL' />
  <track kind="captions" src="captions.vtt" srclang="en" label="English" />
</video>

@endsection
@push('style')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
@endpush
@push('scripts')

<script type="text/javascript">


setInterval(function(){
    setTimeout(function(){
      get_location();
    }, 1000);
}, 3000);


$( ".check" ).click(function() {
    console.log('oke');
    get_location();
  });

  function get_location() {
    $.ajax({
      xhrFields: {
          withCredentials: true
      },
      beforeSend: function (xhr) {
          xhr.setRequestHeader('Authorization', 'Basic ' + btoa('lander:12345678'));
      },
      url: "https://demo2.traccar.org/api/positions"
  });

  // using jQuery & 'headers' property
  $.ajax({
      xhrFields: {
          withCredentials: true
      },
      headers: {
          'Authorization': 'Basic ' + btoa('lander:12345678')
      },
      url: "https://demo2.traccar.org/api/positions"
  });

  // using XMLHttpRequest
  // var xhr = new XMLHttpRequest();
  // xhr.open("GET", "https://demo2.traccar.org/api/positions", true);
  // xhr.withCredentials = true;
  // xhr.setRequestHeader("Authorization", 'Basic ' + btoa('lander:12345678'));
  // xhr.onload = function () {
  //     console.log(xhr.responseText);
  // };
  // xhr.send();

  // using Fetch API
  var myHeaders = new Headers();
  myHeaders.append("Authorization", 'Basic ' + btoa('lander:12345678'));
  fetch("https://demo2.traccar.org/api/positions", {
      credentials: "include",
      headers: myHeaders
  }).then(function (response) {
      return response.json();
  }).then(function (json) {

      console.log(json);
    let myObj = json[0];
    let  latitude =  myObj.latitude;
    let longitude =  myObj.longitude;

      get_info_lokasi(latitude,longitude);
  });

}

function get_info_lokasi(latitude,longitude)
{
  $.ajax({
      url:"{{route('lokasi')}}",
      method:'POST',
      data:{
        '_token': '{{csrf_token()}}',
        latitude:latitude,
        longitude:longitude},
        success:function(data){
        console.log(data);
        $('#update-lokasi').html(data);

        var mymap = L.map('mapid').setView([latitude, longitude], 18);

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
          maxZoom: 50,
          id: 'mapbox/streets-v11',
          tileSize: 512,
          zoomOffset: -1
        }).addTo(mymap);

        var marker = new L.marker([latitude,longitude ]).on('click', markerOnClick).addTo(mymap);

        function markerOnClick(e)
        {

        }

        var popup = L.popup();

        function onMapClick(e) {
          popup
              .setLatLng(e.latlng)
              .setContent("You clicked the map at " + e.latlng.toString())
              .openOn(mymap);
        }

        mymap.on('click', onMapClick);

      }
  });
}



    (function(){
    var resizeVideoJs = function(player, aspectRatio){
      // Get the parent element's actual width
      var width = document.getElementById(player.id).parentElement.offsetWidth;
      // Set width to fill parent element, Set height
      player.width(width).height( width * aspectRatio );
    }

    // Get all the videos!
    var videos = document.getElementsByTagName('video');

    // Loop through the videos
    for(i=0;i<videos.length;i++) {

      // Stash the video
      var video = videos[i];

      // Check for VideoJs
      if(video.className.indexOf('video-js') > -1) {

        // When player is ready...
        _V_(video.id).ready(function(){

          // Stash the player object
          var player = this;
          // Create an aspect ratio
          var aspectRatio = player.height()/player.width();

          // Apply the resizer
          resizeVideoJs(player, aspectRatio);

          // Add/Attach the event on resize
          if (window.addEventListener) {
            window.addEventListener('resize', function(){
              resizeVideoJs(player, aspectRatio);
            }, false);
          } else if (window.attachEvent)  {
            window.attachEvent('onresize', function(){
              resizeVideoJs(player, aspectRatio);
            });
          }
        });
      }
    }
  })();


</script>

@endpush
