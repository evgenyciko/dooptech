<?php

namespace App\Http\Controllers;
use App\Message;
use App\UserMessage;
use App\MessageGroup;
Use App\User;
Use Illuminate\Support\facades\Auth;
Use Illuminate\Http\Request;
use App\Events\PrivateMessageEvent;
use App\Events\GroupMessageEvent;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;

class MessageController extends Controller
{
    public function conversation($user_id){
    // return     $waktu = Carbon::now()->addHour(8);
    // $message = Message::with('users')->where('id','!=',Auth::id())->get();
    $user = User::find(Auth::id()); 

    
    $user->getRoleNames();

    if ($user->HasRole('admin')) {
      $users = User::where('id', '!=', Auth::id())->get();         
   } else {
       $users = User::role('admin')->where('id', '!=', Auth::id())->get();
   }



      $friend_info = User::findorfail($user_id);
      $my_info = User::find(Auth::id()); 

       $groups = MessageGroup::with('message_groups_members')->whereHas('message_groups_members', function ($query) use( $my_info) {
            return $query->where('user_id', '=', $my_info->id);
        })->get();
      

      $chat_history_sender = UserMessage::with('message')->where('sender_id',$my_info->id)->where('receiver_id',$friend_info->id)->get();
      $chat_history_receiver = UserMessage::with('message')->where('sender_id',$friend_info->id)->where('receiver_id',$my_info->id)->get();
      $chat_history = $chat_history_sender->merge($chat_history_receiver)->sortByDesc('created_at');

      $chat_history = array_values(array_sort($chat_history, function ($value) {
       return $value['created_at'];
     }));


 // $last_message = array_values($chat_history)[0];

      $this->data['user'] = $user;
      $this->data['users'] = $users;
      $this->data['friend_info'] = $friend_info;
      $this->data['my_info'] = $my_info;
      $this->data['users_id'] = $user_id;
      $this->data['chat_history'] = $chat_history;
      $this->data['groups'] = $groups;
      // $this->data['last_message'] = $last_message;

      return view('chat/conversation',$this->data);
    }


    public function sendMessage(Request $request) {
      $request->validate([
         'message' => 'required',
         'receiver_id' => 'required'
      ]);
  
     $waktu = Carbon::now()->addHour(8);
      $sender_id = Auth::id();
      $receiver_id = $request->receiver_id;
  
  
      $message = new Message();
      $message->message = $request->message;
      $message->created_at = $waktu;
  
      if ($message->save()) {
          try {
  
            if ($request->receiver_id == 0) {
              $message->users()->attach($sender_id, [
                'receiver_id' => $receiver_id,
                'type' => 1,
              ]);
            }else {
              $message->users()->attach($sender_id, [
                'receiver_id' => $receiver_id,
              ]);
            }
  
              $sender = User::where('id', '=', $sender_id)->first();
  
              $data = [];
              $data['sender_id'] = $sender_id;
              $data['sender_name'] = $sender->name;
              $data['receiver_id'] = $receiver_id;
              $data['content'] = $message->message;
              $data['created_at'] = $message->created_at;
              $data['message_id'] = $message->id;
  
              event(new PrivateMessageEvent($data));
  
              return response()->json([
                 'data' => $data,
                 'success' => true,
                 'message' => 'Message sent successfully'
              ]);
          } catch (\Exception $e) {
              $message->delete();
          }
      }
  }

public function sendGroupMessage(Request $request) {
  $request->validate([
     'message' => 'required',
     'message_group_id' => 'required'
  ]);

 $waktu = Carbon::now()->addHour(8);
  $sender_id = Auth::id();
  $messageGroupId = $request->message_group_id;



  $message = new Message();
  $message->message = $request->message;
  $message->created_at = $waktu;

  if ($message->save()) {
      try {
          $message->users()->attach($sender_id, ['message_group_id' => $messageGroupId]);
          $sender = User::where('id', '=', $sender_id)->first();

          $data = [];
          $data['sender_id'] = $sender_id;
          $data['sender_name'] = $sender->name;
          $data['content'] = $message->message;
          $data['created_at'] = $message->created_at;
          $data['message_id'] = $message->id;
          $data['group_id'] = $messageGroupId;
          $data['type'] = 2;
          
          event(new GroupMessageEvent($data));

          return response()->json([
             'data' => $data,
             'success' => true,
             'message' => 'Message sent successfully'
          ]);
      } catch (\Exception $e) {
          $message->delete();
      }
  }
}
}
