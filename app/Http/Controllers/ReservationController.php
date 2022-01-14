<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Location;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        return view("reserve", [
            "page" => "Reserve",
            "rooms" => Room::all(),
            "locations" => Location::all(),
            "reservations" => Auth::Check() ? Reservation::where('user_id', Auth::User()->id)->get() : "",
        ]);
    }

    public function create(Request $request)
    {

    }

    public function searchAvailable() {
        echo json_encode(Reservation::all());
    }

    public function store(Request $request)
    {
        Reservation::create([
            "user_id" => Auth::Check() ? Auth::User()->id : "",
            "room_id" => $request->get('room_id'),
            "reservation_start" => $request->get('reservation_start'),
            "reservation_end" => $request->get('reservation_end')
        ]);
    }

    public function show($id)
    {
        $reservation = Reservation::find($id);
        $locations = Location::all();

        return view("reservation", [
            "page" => "Reservate",
            "reservation" => $reservation
        ]);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::find($id);
        $reservation->update($request->all());
    }

    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
    }
}
