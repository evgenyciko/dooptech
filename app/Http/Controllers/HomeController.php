<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserMessage;
use App\MessageGroup;
use Spatie\Permission\Models\Role;

use App\Message;
use Illuminate\Support\facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::find(Auth::id());

        
        if ($user->HasRole('admin')) {
           $users = User::where('id', '!=', Auth::id())->get();         
        } else {
            $users = User::role('admin')->where('id', '!=', Auth::id())->get();
        }

        $my_info = User::where('id', Auth::id())->first();



        $groups = MessageGroup::with('message_groups_members')->whereHas('message_groups_members', function ($query) use ($my_info) {
            return $query->where('user_id', '=', $my_info->id);
        })->get();


        // return   $groups = MessageGroup::with(['message_groups_members' => function($q) use( $my_info) {
        //     // Query the name field in status table
        //     $q->where('user_id', '=',  $my_info->id); // '=' is optional
        // }])->get();

        $data =  compact('user', 'users', 'my_info', 'groups');

        return view('home', $data);
    }
}
