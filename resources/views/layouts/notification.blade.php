@if ($message = Session::get('success'))
<div class="alert alert-success alert-with-icon" data-notify="container">
  <i class="material-icons" data-notify="icon">add_alert</i>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <i class="material-icons">close</i>
  </button>
  <span data-notify="message">{{$message}}</span>
</div>
@endif
