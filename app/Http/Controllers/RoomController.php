<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        return Room::all();
    }

    public function searchAvailable(Request $request) {
        $locationId =  $request->get("location");
        $numberOfPeople = $request->get("numberOfPeople");
        $filters = array(
            1 => $request->get("typeDesk") === 'true' ? '1' : false,
            2 => $request->get("typeSilent")  === 'true' ? '2' : false,
            3 => $request->get("typeMeeting")  === 'true' ? '3' : false
        );
        return json_encode(Room::join('floors', 'rooms.floor_id', '=', 'floors.id')->where('floors.location_Id', $locationId)->whereIn('room_type_id', $filters) ->select('rooms.*', 'floors.location_id', 'floors.floor_name')->get());
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $room = Room::create($request->all());

        // $room = new Room();
        // $room->floor_id = $request->input('floor_id');
        // $room->room_type_id = $request->input('room_type_id');
        // $room->room_name = $request->input('room_name');
        // $room->max_persons = $request->input('max_persons');
        // $room->grid_locations = $request->input('grid_locations');
        // $room->save();

        return response()->json(array('success' => true, 'last_insert_id' => $room->id), 200);
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $room = Room::find($id);
        $room->update($request->all());
    }

    public function destroy($id)
    {
        $room = Room::find($id);
        $room->delete();
    }
}
