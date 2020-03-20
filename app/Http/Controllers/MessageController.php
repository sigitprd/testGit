<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Message;
use App\Traveller;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Pusher;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myaccount = Traveller::where('user_id', auth()->user()->id)->first();

        // $users = User::where('id', '!=', Auth::id())->get();
        // $users = DB::select("select users.id, users.name, users.email, travellers.photo, count(is_read) as unread from users LEFT JOIN messages ON users.id = messages.to and is_read = 0 and messages.to != " .Auth::id(). " LEFT JOIN travellers ON users.id = travellers.user_id where messages.from = " .Auth::id(). " group by users.id, users.name, travellers.photo,  .users.email");


        // fixxx
        // $users = DB::select("select users.id, users.name, users.email, travellers.photo, count(is_read != 1) as unread from users LEFT JOIN messages ON users.id = messages.to and messages.from = " .Auth::id(). " and messages.to != " .Auth::id(). " LEFT JOIN travellers ON users.id = travellers.user_id where messages.from = " .Auth::id(). " group by users.id, users.name, travellers.photo, .users.email"); 


        // $users = DB::select("select users.id, users.name, users.email, travellers.photo, count(is_read) as unread from users LEFT JOIN messages ON users.id = messages.to and messages.to != " .Auth::id(). " LEFT JOIN travellers ON users.id = travellers.user_id where messages.from = " .Auth::id(). " group by users.id, users.name, travellers.photo,  users.email");

        // $users = DB::select("select users.id, users.name, travellers.photo, users.email, count(is_read) as unread from users LEFT JOIN messages ON users.id = messages.from and is_read = 0 and messages.to = " .Auth::id(). " LEFT JOIN travellers ON users.id = travellers.user_id where users.id != " .Auth::id(). " group by users.id, users.name, travellers.photo, .users.email");

        $users = User::join('messages', 'users.id', '=', 'messages.from')
                            ->leftJoin('travellers', 'users.id', '=', 'travellers.user_id')
                            ->select('users.id', 'users.name', 'travellers.photo', 'users.email')
                            ->groupBy('users.id', 'users.name', 'travellers.photo', '.users.email')
                            ->where('messages.to', '=', Auth::id())
                            ->get();


        $notifs = Message::where('to', Auth::id())->get();
        // dd($notifs);

        // return $users;

        // foreach ($users as $key) {
        //     // var_dump($key);
        //     if($key->id == Auth::id()){
        //         // return count($users->unread);
        //         var_dump($key->id);
        //         var_dump($key->name);
        //         var_dump($key->photo);
        //         var_dump($key->email);
        //         var_dump($key->from);
        //         var_dump($key->unread);
        //     }
        // }
        // if($users->from == Auth::id()){
        // return count($users->unread);
        // }
        return view('messages.home', compact('myaccount', 'users', 'notifs'));
    }

    public function getMessage($user_id)
    {

        $my_id = Auth::id();
        // return $user_id;
        //when click to see message selected user's message will be read, update
        Message::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);

        // // getting all message for selected user
        // // getting those messsage which is from  = Auth::id() and to = user_id OR from = user_id and to = Auth::id();
        $messages = Message::where(function($query) use ($user_id, $my_id){
                                $query->where('from', $my_id)->where('to', $user_id);
                            })->orWhere(function($query) use ($user_id, $my_id){
                                $query->where('from', $user_id)->where('to', $my_id);
                            })->get();
        
        return view('messages.index', ['messages' => $messages]);


        // return view('messages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        // return $request;
        // return response()->json($request);
        $request->validate([
            'message' => 'string|required|max:255',
        ]);

        $from = Auth::id();

        $data = new Message();
        $data->from = $from;
        $data->to = $request->receiver_id;
        $data->message = $request->message;
        $data->is_read = 0; // message will be unread when sending message
        $data->save();

        //pusher
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['from' => $from, 'to' => $request->receiver_id]; // sending from and to user id
        $pusher->trigger('my-channel', 'my-event', $data);

        return redirect()->back();
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'string|required|max:255',
        ]);

        $from = Auth::id();

        $data = new Message();
        $data->from = $from;
        $data->to = $request->receiver_id;
        $data->message = $request->message;
        $data->is_read = 0; // message will be unread when sending message
        $data->save();

        //pusher
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['from' => $from, 'to' => $request->receiver_id]; // sending from and to user id
        $pusher->trigger('my-channel', 'my-event', $data);
        // return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
