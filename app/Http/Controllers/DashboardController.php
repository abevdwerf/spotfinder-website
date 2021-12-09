<?php
    namespace App\Http\Controllers;

    use App\Models\Reservation;
    use App\Models\Room;
    use App\Models\Location;
    use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
    {
        public function index ()
        {
            $reservations = null;
            $locations = Location::all();

            //checking user signed in, if it's true then get all user reservations
            if(Auth::Check())
            {
               $reservations = Reservation::where('user_id', Auth::User()->id)->get();
            }

            return view("dashboard", [
                "page" => "Dashboard",
                "locations" => $locations,
                "reservations" => $reservations
            ]);
        }

        public function getRooms ()
        {
            $locationId =  $_GET["location"];
            $numberOfPeople = $_GET["numberOfPeople"];
            $filters = [
                $_GET["filterDeskPlace"],
                $_GET["filterSilentRoom"],
                $_GET["filterMeetingRoom"]
            ];

            //TODO filteren op numberofpeople (is nog niet gedaan omdat die data nog niet in de database staat)
            $rooms = Room::join('floors', 'rooms.floor_id', '=', 'floors.id')->where('floors.location_Id', $locationId)->whereIn('room_type_id', $filters)->get();

            return view("rooms")->with(
                array(
                    'rooms' => $rooms,
                    'location' => Location::find($locationId),
                    'numberOfPeople' => $numberOfPeople,
                    'filters' => $filters
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
