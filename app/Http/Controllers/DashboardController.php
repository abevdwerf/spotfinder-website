<?php
    namespace App\Http\Controllers;

    use App\Models\Room;
    use App\Models\Floor;
    use App\Models\Location;
    use App\Models\Reservation;
    use Illuminate\Support\Facades\Auth;

    class DashboardController extends Controller
    {
        public function index ()
        {
            $rooms = Room::all();
            $floors = Floor::all();
            $locations = Location::all();
            $specifiedLocations = array();

            // Filter locations for locations with available workspaces
            foreach ($rooms as $key => $room) {
                foreach ($floors as $key => $floor) {
                    if ($room["floor_id"] === $floor["id"]) {
                        foreach ($locations as $key => $location) {
                            if ($floor["location_id"] === $location["id"]) {
                                if (!in_array($location, $specifiedLocations)) array_push($specifiedLocations, $location);
                            }
                        }
                    }
                }
            }

            return view("dashboard", ["page" => "Dashboard",
                "locations" => $specifiedLocations,
                "reservations" => Auth::Check() ? Reservation::where('user_id', Auth::User()->id)->get() : ""
            ]);
        }

        public function getRooms ()
        {
            $locationId =  $_GET["location"];
            $numberOfPeople = $_GET["numberOfPeople"];
            $filters = array(
                1 => $_GET["typeDesk"] === 'true' ? '1' : false,
                2 => $_GET["typeSilent"]  === 'true' ? '2' : false,
                3 => $_GET["typeMeeting"]  === 'true' ? '3' : false
            );

            //TODO filteren op numberofpeople (is nog niet gedaan omdat die data nog niet in de database staat)

            return json_encode(Room::join('floors', 'rooms.floor_id', '=', 'floors.id')->where('floors.location_Id', $locationId)->whereIn('room_type_id', $filters)->get());

            // return view("rooms")->with(
            //     array(
            //         'filters' => $filters,
            //         'numberOfPeople' => $numberOfPeople,
            //         'location' => Location::find($locationId),
            //         'rooms' => Room::join('floors', 'rooms.floor_id', '=', 'floors.id')->where('floors.location_Id', $locationId)->whereIn('room_type_id', $filters)->get()
            //     )
            // );
        }

        public function getRoom ($id) {
            return view("room", ["room" => Room::where('id', $id)->get(),"gridTemplate" =>
                array(
                    array ('x' => 1, 'y' => 1),
                    array ('x' => 2, 'y' => 1),
                    array ('x' => 3, 'y' => 1),
                    array ('x' => 4, 'y' => 1),
                    array ('x' => 5, 'y' => 1),
                    array ('x' => 1, 'y' => 2),
                    array ('x' => 2, 'y' => 2),
                    array ('x' => 3, 'y' => 2),
                    array ('x' => 4, 'y' => 2),
                    array ('x' => 5, 'y' => 2)
                )
            ]);
        }

        public function getLocation ($id) {
            return Location::where('id', $id)->get()[0]->location_name;;
        }
    }
?>
