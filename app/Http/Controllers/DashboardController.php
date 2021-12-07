<?php
    namespace App\Http\Controllers;

    use App\Models\Room;
    use App\Models\Location;

    class DashboardController extends Controller
    {
        public function Initialization ()
        {
            return view("dashboard", ["page" => "Dashboard"])->with(
                array(
                    'locations' => Location::all(),
                ))
            ;
        }

        public function GetRooms ()
        {

            $rooms = Room::all();
            $locations = Location::all();

            $locationId =  $_GET["location"];
            $numberOfPeople = $_GET["numberOfPeople"];

            $filters = [
                0 => $_GET["filterDeskPlace"],
                1 => $_GET["filterSilentRoom"],
                2 => $_GET["filterMeetingRoom"]
            ];
            $specifiedRooms = array();

            foreach ($rooms as $key => $room) {
                if ($room["location_id"] == $locationId) {
                    if (in_array($room["type"], $filters)) {
                        if ($room["seats_available"] >= $numberOfPeople) {
                            array_push($specifiedRooms, $room);
                        }
                    }
                }
            }

            return view("rooms", ["page" => "Dashboard"])->with(
                array(
                    'rooms' => Room::all(),
                )
            );
        }
    }
?>