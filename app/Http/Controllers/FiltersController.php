<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Traveller;
use App\Trip;
use Carbon\Carbon;

class FiltersController extends Controller
{
    public function category(Request $request)
    {
         $search = $request->search;

        if($request->categories == "people"){
            $datas = Traveller::leftJoin('trips', 'travellers.id_traveller', '=', 'trips.traveller_id')
                            // ->unionAll($travel)
                            ->select('trips.*', 'travellers.*')
                            ->orWhere('travellers.first_name', 'LIKE', '%' . $search . '%')
                            ->orWhere('travellers.last_name', 'LIKE', '%' . $search . '%')
                            // ->distinct()
                            ->orderBy('trips.trip_id', 'DESC')
                            // ->paginate(21);
                            ->get();
        } elseif ($request->categories == "start") {
            $datas = Traveller::leftJoin('trips', 'travellers.id_traveller', '=', 'trips.traveller_id')
                            // ->unionAll($travel)
                            ->select('trips.*', 'travellers.*')
                            ->orWhere('trips.current', 'LIKE', '%' . $search . '%')
                            // ->distinct()
                            ->orderBy('trips.trip_id', 'DESC')
                            // ->paginate(21);
                            ->get();
        } elseif ($request->categories == "destination") {
            if($request->cek == 1){
                $request->validate([
                    'from'        => 'required|date',
                    'to'          => 'required|date',
                ]);
                $from    = Carbon::parse($request->from)
                                ->startOfDay()        // 2018-09-29 00:00:00.000000
                                ->toDateTimeString(); // 2018-09-29 00:00:00

                $to      = Carbon::parse($request->to)
                                ->endOfDay()          // 2018-09-29 23:59:59.000000
                                ->toDateTimeString();
                $datas = Traveller::leftJoin('trips', 'travellers.id_traveller', '=', 'trips.traveller_id')
                                // ->unionAll($travel)
                                ->select('trips.*', 'travellers.*')
                                ->where('trips.destination', 'LIKE', '%' . $search . '%')
                                ->whereBetween('trips.departure_date', [$from, $to])
                                // ->whereBetween('trips.departure_date', '>=', $request->from)
                                // ->whereBetween('trips.departure_date', '<=', $request->to)
                                // ->distinct()
                                ->orderBy('trips.departure_date')
                                ->get();
            } else{
                $datas = Traveller::leftJoin('trips', 'travellers.id_traveller', '=', 'trips.traveller_id')
                                // ->unionAll($travel)
                                ->select('trips.*', 'travellers.*')
                                ->orWhere('trips.destination', 'LIKE', '%' . $search . '%')
                                // ->distinct()
                                ->orderBy('trips.trip_id', 'DESC')
                                // ->paginate(21);
                                ->get();
            }
        } elseif ($request->categories == "from") {
            $datas = Traveller::leftJoin('trips', 'travellers.id_traveller', '=', 'trips.traveller_id')
                            // ->unionAll($travel)
                            ->select('trips.*', 'travellers.*')
                            ->orWhere('travellers.currently_live_at', 'LIKE', '%' . $search . '%')
                            // ->distinct()
                            ->orderBy('trips.trip_id', 'DESC')
                            // ->paginate(21);
                            ->get();
        }
        // dd($request);
        // dd($datas);
        // $myaccount = Traveller::where('user_id', auth()->user()->id)->first();

        // $notifs = Message::where('to', Auth::id())->get();

        // return view('traveller.search', compact('datas', 'search'));

        // return $datas;
        // $generatedData = GenerateDataFromJobRef($datas);
        // return json_encode(["datas" => $datas]);
        return response()->json(array("datas" => $datas, "search" => $search));
    }
}
