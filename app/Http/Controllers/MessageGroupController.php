<?php

namespace App\Http\Controllers;
Use Illuminate\Support\facades\Auth;
use Illuminate\Http\Request;
use App\MessageGroup;
use App\MessageGroupMember;
use App\UserMessage;
use App\Message;
Use App\User;
use PHPUnit\TextUI\XmlConfiguration\Group;

class MessageGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $data['name'] = $request->name_group;
      $data['user_id'] = Auth::id();


        $messageGroup = MessageGroup::create($data);

        if ($messageGroup){
            if(isset($request->user_id) && !empty($request->user_id)) {
                foreach ($request->user_id as $userId){
                    $memberData['user_id'] = $userId;
                    $memberData['message_group_id'] = $messageGroup->id;
                    $memberData['status'] = 0;

                    MessageGroupMember::create($memberData);
                }
            }

        }

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // $message = Message::with('users')->where('id','!=',Auth::id())->get();
    $user = User::find(Auth::id()); 

    $user->getRoleNames();

    if ($user->HasRole('admin')) {
        $users = User::where('id', '!=', Auth::id())->get();         
     } else {
         $users = User::role('admin')->where('id', '!=', Auth::id())->get();
     }


    
    $user->getRoleNames();

    if ($user->HasRole('admin')) {
        $users = User::where('id', '!=', Auth::id())->get();         
     } else {
         $users = User::role('admin')->where('id', '!=', Auth::id())->get();
     }
  
       
       
       
        $my_info = User::find(Auth::id());

        $groups = MessageGroup::with('message_groups_members')->whereHas('message_groups_members', function ($query) use( $my_info) {
            return $query->where('user_id', '=', $my_info->id);
        })->get();
      
        
      $chat_history = UserMessage::orderBy('created_at','ASC')->with('message','users')->whereHas('message', function ($query) use( $id) {
        return $query->where('message_group_id', '=', $id);
    })->get();



        $currentGroup = MessageGroup::where('id',$id)
        ->with('message_groups_members.user')
        ->first();

        $data =  compact('user','users','my_info','groups','currentGroup','chat_history');

        return view('message_groups/index',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = MessageGroup::where('id',$id);

        $group_member = MessageGroupMember::where('message_group_id',$id)->get();

        $user_message = UserMessage::with('message')->where('message_group_id',$id)->get();

      // return  $message = Message::whereIn('message_id',$user_message->get()->pluck('id'));

      try {
        $user_message->delete();
    } catch (\Exception $e) {

    }

    try {
        $group_member->delete();
    } catch (\Exception $e) {

    }

    try {
        $group->delete();
    } catch (\Exception $e) {

    }
        
    return redirect()->route('home');
    }
}
