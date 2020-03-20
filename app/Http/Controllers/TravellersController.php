<?php

namespace App\Http\Controllers;

use App\Traveller;
use App\Message;
use App\Trip;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TravellersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user_id = Auth::user()->id();
        $notifs = Message::where('to', Auth::id())->get();
        $traveller = Traveller::all();
        return view('traveller.home', compact('traveller', 'notifs'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Traveller  $traveller
     * @return \Illuminate\Http\Response
     */
    public function show($traveller)
    {
        $id = Auth::user()->id;
        if ($id == $traveller) {
            $traveller = Traveller::all()->where('user_id', $traveller)->first();
            $trips = Trip::all()->where('traveller_id', $traveller->id_traveller)->sortByDesc('trip_id');
            $myaccount = Traveller::where('user_id', auth()->user()->id)->first();
            $notifs = Message::where('to', Auth::id())->get();
            // $trips = Trip::select('trips.*')->orderBy('trip_id', 'DESC');
            // dd($trips);
            return view('traveller.myaccount', compact('traveller', 'trips', 'myaccount', 'notifs'));
        }
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Traveller  $traveller
     * @return \Illuminate\Http\Response
     */
    public function edit($traveller)
    {
        $id = Auth::user()->id;
        if ($id == $traveller) {
            // echo "berhasil";
            $traveller = Traveller::all()->where('user_id', $traveller)->first();
            $myaccount = Traveller::where('user_id', auth()->user()->id)->first();
            $notifs = Message::where('to', Auth::id())->get();
            // dd($traveller);
            return view('traveller.editprofile', compact('traveller', 'myaccount', 'notifs'));
        }
        return abort(404);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Traveller  $traveller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Traveller $traveller)
    {
        $id = Auth::user()->id;

        $request->validate([
            'bio' => 'string',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'country' => 'required|string|max:255',
            'phone_number' => 'required|integer',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:50000',
        ]);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            // dd($image);
            $new_image = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path("assets/pic/profilepic"), $new_image);
            Traveller::where('id_traveller', $traveller->id_traveller)
                ->update([
                    'photo' => $new_image
                ]);
        }

        Traveller::where('id_traveller', $traveller->id_traveller)
            ->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'date_of_birth' => $request->date_of_birth,
                'country' => $request->country,
                'currently_live_at' => $request->currently_live_at,
                'phone_number' => $request->phone_number,
                'job' => $request->job,
                'bio' => $request->bio,
            ]);

        User::where('id', $traveller->user_id)
            ->update([
                'name' => $request->first_name . " " . $request->last_name
            ]);

        return redirect('/myaccount/' . $id)->with('status', 'Profile Changed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Traveller  $traveller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Traveller $traveller)
    {
        //
    }

    public function getWhatsapp($id_traveller)
    {
        $traveller = Traveller::all()->where('id_traveller', $id_traveller)->first();
        // dd($traveller);
        if ($traveller->id_traveller == $id_traveller) {
            return redirect('https://wa.me/'.$traveller->phone_number);
        }
        return abort(404);
    }

    public function details(Traveller $traveller){

        // $user = User::join('travellers', 'users.id', '=', 'travellers.user_id')
                    // ->select()
        // dd($traveller);
        $id_traveller = $traveller->id_traveller;
        // dd($id_traveller);
        $traveller = $traveller->join('users', 'travellers.user_id', '=', 'users.id')
                            ->select('travellers.*', 'users.email')
                            ->where('id_traveller', $id_traveller)
                            ->first();

        // dd($traveller);
        $trips = Trip::all()->where('traveller_id', $id_traveller)->sortByDesc('trip_id');
            // $trips = Trip::select('trips.*')->orderBy('trip_id', 'DESC');
            // dd($trips);

        $myaccount = Traveller::where('user_id', auth()->user()->id)->first();

        $notifs = Message::where('to', Auth::id())->get();

        return view('traveller.detail', compact('traveller', 'trips', 'myaccount', 'notifs'));
    }
}
