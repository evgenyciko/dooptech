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
  <h3 class=" text-center">Messaging</h3>
  <div class="messaging">
    <div class="inbox_msg">
      <div class="inbox_people">
        <div class="headind_srch">
          <div class="recent_heading">
            <h4>Recent</h4>
          </div>
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
            <div class="chat_list @if($data->id == $friend_info->id) active_chat @endif">
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
                    <p></p>
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
      <div class="mesgs">
        <div id="auto-focus" class="msg_history">
          @if($chat_history != null)
          @foreach($chat_history as $data)
          @if($data->sender_id == $my_info->id )
          <div class="outgoing_msg">
            <div class="sent_msg">
              <p>{{$data->message->message}}</p>
              <span class="time_date">{{date('h:m A', strtotime($data->message->created_at))}}</span>
            </div>
          </div>
          @else
          <div class="incoming_msg">
            <div class="incoming_msg">
            <p style="margin-bottom: auto; margin-left:15px;">{{$data->users->name}}</p>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p>{{$data->message->message}}</p>
                  <span class="time_date">{{date('h:m A', strtotime($data->message->created_at))}}</span>
                </div>
              </div>
            </div>
          </div>
          @endif
          @endforeach
          @endif
        </div>
        <div class="type_msg">
          <div class="input_msg_write">
            <div class="chat-box">
              <div class="chat-input border border-dark" id="chat-input" contenteditable="true">
              </div>
              <div class="chat-input-toolbar">
                <button type="button" title="Add File" class="btn btn-light btn-sm btn-file-upload" name="button">
                  <i class="fa fa-paperclip"></i>
                </button>
                <button title="Bold" type="button" name="button" class="btn btn-light btn-sm tool-items" onclick="document.execCommand('bold',false,'')">
                  <i class="fa fa-bold tool-icon"></i>
                </button>
                <button title="Italic" type="button" name="button" class="btn btn-light btn-sm tool-items" onclick="document.execCommand('italic',false,'')">
                  <i class="fa fa-italic tool-icon"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- <p class="text-center top_spac"> Design by <a target="_blank" href="https://www.linkedin.com/in/sunil-rajput-nattho-singh/">Sunil Rajput</a></p> -->

    </div>
  </div>
  @endsection
  @push('scripts')
  <script>
    $(function() {
      // untuk auto scrool
      var objDiv = document.getElementById("auto-focus");
      objDiv.scrollTop = objDiv.scrollHeight;


      let $chatInput = $(".chat-input");
      let $chatInputToolbar = $(".chat-input-toolbar");
      let $chatBody = $(".chat-boody");
      let $messageWrapper = $(".msg_history")

      let user_id = "{{ auth()->user()->id }}";
      let ip_address = '127.0.0.1';
      let socket_port = '8005';
      let socket = io(ip_address+':'+socket_port);
      let friendId = '{{$friend_info->id}}';


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

      $chatInput.keypress(function(e) {
        let message = $(this).html();
        if (e.which === 13 && !e.shiftKey) {
          $chatInput.html("");
          sendMessage(message);
          return false;
        }
      });

      function sendMessage(message) {
        let url = "{{route('send-message')}}";
        let form = $(this);
        let formData = new FormData();
        let token = "{{ csrf_token() }}";

        formData.append('message', message);
        formData.append('_token', token);
        formData.append('receiver_id', friendId);

        appendMessageToSender(message);

        $.ajax({
          url: url,
          type: 'POST',
          data: formData,
          processData: false,
          contentType: false,
          dataType: 'JSON',
          success: function(response) {
            if (response.success) {
              console.log(response.data);
            }
          }
        });

      }


      function appendMessageToReceiver(message) {
        let name = '{{$my_info->name}}';
        let image = '{!! makeImageFromName($my_info->name) !!}';

        let userInfo = '<div >' +
          '<p style="margin-bottom: auto; margin-left:15px;">' +
          message.sender_name +
          '</p>' +
          '</div>\n';

        let messageContent = '<div class="received_msg">\n' +
          '<div class="received_withd_msg">\n' +
          '<p>' + message.content + '</p>\n' +
          '<span class="time_date">' + timeFormat(message.created_at) + '</span></div>\n' +
          '</div>\n';

        let newMessage = '<div class="incoming_msg">' +
          userInfo + messageContent +
          '</div>';

        $messageWrapper.append(newMessage);
        objDiv.scrollTop = objDiv.scrollHeight;
      }

      function appendMessageToSender(message) {
        // let name = '{{$friend_info->name}}';
        let image = '{!! makeImageFromName($friend_info->name) !!}';

        let messageContent = '<div class="sent_msg">\n' +
          '<p>' + message + '</p>\n' +
          '<span class="time_date">' + getCurrentTime() + '</span>\n' +
          '</div>\n';

        let newMessage = '  <div class="outgoing_msg">\n' +
          messageContent +
          '</div>';

        $messageWrapper.append(newMessage);
        objDiv.scrollTop = objDiv.scrollHeight;
      }

      socket.on("private-channel:App\\Events\\PrivateMessageEvent", function(message) {
        appendMessageToReceiver(message)
      });

    });

    $(document).ready(function() {
      $('.js-example-basic-multiple').select2();
    });
  </script>

  @endpush