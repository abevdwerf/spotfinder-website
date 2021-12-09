<?php
    namespace App\Http\Controllers;

    use App\Models\Reservation;
    use App\Models\Room;
    use App\Models\Floor;
    use App\Models\Location;
    use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
    {
        public function Initialization ()
        {
            $locations = Location::all();
            $reservations = Reservation::where('user_id', Auth::User()->id)->get();

            return view("dashboard", ["page" => "Dashboard",
                "locations" => $locations,
                "reservations" => $reservations
            ]);
        }

        public function GetRooms ()
        {
            $rooms = Room::all();
            $floors = Floor::all();

            $locationId =  intval($_GET["location"]);
            $numberOfPeople = intval($_GET["numberOfPeople"]);
            $filters = [
                1 => boolval($_GET["filterDeskPlace"]),
                2 => boolval($_GET["filterSilentRoom"]),
                3 => boolval($_GET["filterMeetingRoom"])
            ];

            $specifiedRooms = array();

            foreach ($rooms as $key => $room) {
                $room->type = $room->roomType($room["room_type_id"]);

                if ($filters[$room["room_type_id"]]) {
                    foreach ($floors as $key => $floor) {
                        if ($room["floor_id"] === $floor["id"]) if ($floor["location_id"] === $locationId) array_push($specifiedRooms, $room);
                    }
                }
            }

            return view("rooms")->with(
                array(
                    'rooms' => $specifiedRooms,
                    'specification' => array (
                        'location' => Location::find($locationId),
                        'numberOfPeople' => $numberOfPeople,
                        'filters' => $filters
                    )
                )
            );
        }

        public function getRoom () {
            return view("room", ["gridTemplate" =>
                array(
                    array (
                        'x' => 1,
                        'y' => 1
                    ),
                    array (
                        'x' => 2,
                        'y' => 1
                    ),
                    array (
                        'x' => 3,
                        'y' => 1
                    ),
                    array (
                        'x' => 4,
                        'y' => 1
                    ),
                    array (
                        'x' => 5,
                        'y' => 1
                    ),
                    array (
                        'x' => 1,
                        'y' => 2
                    ),
                    array (
                        'x' => 2,
                        'y' => 2
                    ),
                    array (
                        'x' => 3,
                        'y' => 2
                    ),
                    array (
                        'x' => 4,
                        'y' => 2
                    ),
                    array (
                        'x' => 5,
                        'y' => 2
                    )
                )
            ]);
        }
    }
?>
