<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;
use App\SetTrip;
use DB;
class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('trips.trip');
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
            $trip = new Trip;

            $trip->trip_name =$request->input('tripname');
            $trip->date =$request->input('tripdate');

            $trip->save();

            return redirect('trips')->with('trip',$trip);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $trips = Trip::all();

        return view('trips.trip')->with('trips',$trips);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trip = Trip::find($id);

        return view('trips.trip_edit')->with('trip',$trip);
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
        $trip = Trip::find($id);

        $trip->trip_name =$request->input('tripname');
        $trip->date =$request->input('tripdate');

        $trip->save();

        return redirect('trips')->with('trip',$trip);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trip = Trip::find($id);

        $trip->delete();

        return redirect('/trips')->with('trip',$trip);

    }

    public function settripindex()
    {
        return view('trips.settrip');
    }
    public function settrip()
    {
        $currenttrips = SetTrip::all();

        return view('trips.settrip')->with('currenttrips',$currenttrips);
    }
    public function changetrip($id)
    {
        $settrip = SetTrip::find($id);

        return view('trips.changetrip')->with('settrip',$settrip);
    }
    public function tripupdate(Request $request, $id)
    {
        $settrip = SetTrip::find($id);

        $settrip->set_trip =$request->input('settrip');

        $settrip->save();

        return redirect('set_trips')->with('settrip',$settrip);
    }

}
