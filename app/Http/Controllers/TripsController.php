<?php

namespace App\Http\Controllers;

use App\Trip;
use App\Message;
use Auth;
use App\Traveller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class TripsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Traveller::join('trips', 'travellers.id_traveller', '=', 'trips.traveller_id')
                            ->select('trips.*', 'travellers.*')
                            ->orderBy('trip_id', 'DESC')
                            ->paginate(21);
                            // ->get();

        // dd($datas);
        $myaccount = Traveller::where('user_id', auth()->user()->id)->first();
        // dd($myaccount);
        $notifs = Message::where('to', Auth::id())->get();

        return view('traveller.home', compact('datas', 'myaccount', 'notifs'));
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
        $id = Auth::user()->id;
        $traveller = Traveller::all()->where('user_id', $id)->first();
        $request->request->add(['traveller_id' => $traveller->id_traveller]);
        // $request->request->add(['created_at' => Carbon::now()]);
        // $request->request->add(['updated_at' => Carbon::now()]);

        $validator = Validator::make($request->all(), [
            'current' => 'required|string|min:3|max:255',
            'departure_date' => 'required|date',
            'traveller_id' => 'required|integer'
        ]);

        if ($validator->passes()) {

            // $trip = new Trip;
            // $trip->current = $request->current;
            // $trip->destination = $request->destination;
            // $trip->departure_date = $request->departure_date;
            // $trip->note = $request->note;
            // $trip->traveller_id = $request->traveller_id;
            // $trip->save();
            // return $request;
            
            Trip::create([
                'current' => $request->current,
                'destination' => $request->destination,
                'departure_date' => $request->departure_date,
                'trip_duration' => $request->trip_duration,
                'note' => $request->note,
                'traveller_id' => $request->traveller_id
            ]);
            // return redirect('/home');
            // return $request;
        } else{
            return response()->json(['errors' => $validator->errors()->all()], 422);
        }

        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function show(Trip $trip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function edit(Trip $trip)
    {
        return $trip;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trip $trip)
    {
        $validator = Validator::make($request->all(), [
            'current' => 'required|string|min:3|max:255',
            'departure_date' => 'required|date',
        ]);

        if ($validator->passes()) {

            // $trip = new Trip;
            // $trip->current = $request->current;
            // $trip->destination = $request->destination;
            // $trip->departure_date = $request->departure_date;
            // $trip->note = $request->note;
            // $trip->traveller_id = $request->traveller_id;
            // $trip->save();
            // return $request;
            
            Trip::where('trip_id', $trip->trip_id)
                ->update([
                        'current' => $request->current,
                        'destination' => $request->destination,
                        'departure_date' => $request->departure_date,
                        'trip_duration' => $request->trip_duration,
                        'note' => $request->note,
                    ]);
            // return redirect('/home');
            return $request;
        } else{
            return response()->json(['errors' => $validator->errors()->all()], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trip $trip)
    {
        //
        Trip::destroy($trip->trip_id);
        return $trip;
    }

    public function search(Request $request)
    {
        // dd($request);
        $search = \Request::get( 'search' );
        $datas = Traveller::leftJoin('trips', 'travellers.id_traveller', '=', 'trips.traveller_id')
                            // ->unionAll($travel)
                            ->select('trips.*', 'travellers.*')
                            ->where('current', 'LIKE', '%' . $search . '%')
                            ->orWhere('destination', 'LIKE', '%' . $search . '%')
                            ->orWhere('first_name', 'LIKE', '%' . $search . '%')
                            ->orWhere('last_name', 'LIKE', '%' . $search . '%')
                            ->orWhere('gender', 'LIKE', '%' . $search . '%')
                            ->orWhere('country', 'LIKE', '%' . $search . '%')
                            // ->distinct()
                            ->orderBy('trip_id', 'DESC')
                            // ->paginate(21);
                            ->get();
        // dd($datas);
        $myaccount = Traveller::where('user_id', auth()->user()->id)->first();

        $notifs = Message::where('to', Auth::id())->get();

        return view('traveller.search', compact('datas', 'myaccount', 'notifs', 'search'));
    }
}
