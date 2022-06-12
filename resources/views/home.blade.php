@extends('layouts.app')
@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('group-members')}}" method="post">
          @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama Group:</label>
            <input type="text" class="form-control" id="recipient-name" name="name_group">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Pilih Member:</label>
            <select id="selectmember" class="js-example-basic-multiple form-control" name="user_id[]" multiple="multiple" style="width:100% !important;" name="user_id[]">
              @foreach($users as $data)
              <option value="{{$data->id}}">{{$data->name}}</option>
              @endforeach
              <option value="{{ auth()->user()->id}}" selected>{{ auth()->user()->name}}</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Buat Group</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
<div class="container">
  <h4 class=" text-center">PIlih Untuk Memulai Obrolan</h4>
  <div class="messaging">
    <div class="inbox_msg">
      <div class="inbox_people">
        <div class="headind_srch d-flex justify-content-between">
          <div class="recent_heading ">
            <h4>Recent</h4>
          </div>
          <!-- <div class="srch_bar">
              <div class="stylish-input-group">
                <input type="text" class="search-bar"  placeholder="Search" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
            </div> -->
          <div class="recent_heading">
            @if($user->HasRole('admin'))
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Buat Group
            </button>
            @endif
          </div>
        </div>
        <div class="inbox_chat">
          @if($users->count())
          @foreach($users as $data)
          <a href="{{route('conversation',$data->id)}}">
            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img">
                  <div class="chat-image">
                    {!! makeImageFromName($data->name) !!}
                    <i class="fa fa-circle user-status-icon user-icon-{{$data->id}}" title="away"></i>
                  </div>
                </div>
                <div class="chat_ib">
                  <div class="chat-name font-weight-bold">
                    <h5>{{$data->name}}<span class="chat_date"></span></h5>
                  </div>

                </div>
              </div>
            </div>
          </a>
          @endforeach
          @endif
          @if($groups->count())
          @foreach($groups as $data)
          <a href="{{route('message-groups.show',$data->id)}}">
            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img">
                  <div class="chat-image">
                    {!! makeImageFromName($data->name) !!}
                  </div>
                </div>
                <div class="chat_ib">
                  <div class="chat-name font-weight-bold">
                    <h5>{{$data->name}}<span class="chat_date"></span></h5>
                    @if($user->HasRole('admin'))
                    <div> <a href="{{route('delete-group',$data->id)}}"><i class="fa fa-trash"></i></a> </div>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </a>
          @endforeach
          @endif
        </div>
      </div>

    </div>


    <!-- <p class="text-center top_spac"> Design by <a target="_blank" href="https://www.linkedin.com/in/sunil-rajput-nattho-singh/">Sunil Rajput</a></p> -->

  </div>
</div>
@endsection
@push('scripts')
<script>
  let $chatInputToolbar = $(".chat-input-toolbar");
  let $chatBody = $(".chat-boody");

  $(function() {

    let user_id = '{{ auth()->user()->id}}';
    let ip_address = '127.0.0.1';
    let socket_port = '8005';
    let socket = io(ip_address+':'+socket_port);



    socket.on('connect', function() {
      socket.emit('user_connected', user_id);
    });

    socket.on('updateUserStatus', (data) => {
      let $userStatusIcon = $('.user-status-icon');
      $userStatusIcon.removeClass('text-success');
      $userStatusIcon.attr('title', 'Away');

      $.each(data, function(key, val) {
        if (val !== null && val !== 0) {
          let $userIcon = $(".user-icon-" + key);
          $userIcon.addClass("text-success");
          $userIcon.attr('title', 'Online');
        }
      });

    });

  });

  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
  });
</script>

@endpush