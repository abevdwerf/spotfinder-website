<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Location;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("reserve", [
            "page" => "Reserve",
            "rooms" => Room::all(),
            "locations" => Location::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $reservation = new Reservation([
        //     "user_id" => Auth::Check() ? Auth::User()->id : "",
        //     "room_id" => $request->get('roomId'),
        //     "reservation_start" => $request->get('reservationStart'),
        //     "reservation_end" => $request->get('reservationEnd')
        // ]);

        // die(var_dump($reservation));
        
        // $reservation->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Reservation::create([
            "user_id" => Auth::Check() ? Auth::User()->id : "",
            "room_id" => $request->get('room_id'),
            "reservation_start" => $request->get('reservation_start'),
            "reservation_end" => $request->get('reservation_end')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::find($id);
        $locations = Location::all();

        return view("reservation", [
            "page" => "Reservate",
            "reservation" => $reservation
        ]);
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
        $reservation = Reservation::find($id);
        $reservation->update($request->all());
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
    }
}
