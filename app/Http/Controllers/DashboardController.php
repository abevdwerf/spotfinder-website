<?php
    namespace App\Http\Controllers;

    use App\Models\Room;
    use App\Models\Floor;
    use App\Models\Location;

    class DashboardController extends Controller
    {
        public function Initialization ()
        {
            $rooms = Room::all();
            $floors = Floor::all();
            $locations = Location::all();
            
            $userReservations = array();
            $specifiedLocations = array();

            // Filter locations for locations with available workspaces
            foreach ($rooms as $key => $room) {
                foreach ($floors as $key => $floor) {
                    if ($room["floor_id"] === $floor["id"]) {
                        foreach ($locations as $key => $location) {
                            if ($floor["location_id"] === $location["id"]) if (!in_array($location, $specifiedLocations)) array_push($specifiedLocations, $location);
                        }
                    }
                }
            }

            

            return view("dashboard", ["page" => "Dashboard"])->with(
                array(
                    'reservations' => $userReservations,
                    'locations' => $specifiedLocations,
                )
            );
        }

        public function GetRooms ()
        {
            $rooms = Room::all();
            $floors = Floor::all();

            $locationId =  intval($_GET["location"]);
            $numberOfPeople = intval($_GET["numberOfPeople"]);
            $filters = [
                0 => boolval($_GET["filterDeskPlace"]), 
                1 => boolval($_GET["filterSilentRoom"]),
                2 => boolval($_GET["filterMeetingRoom"])
            ];
            
            $specifiedRooms = array();

            foreach ($rooms as $key => $room) {
                $room->type = $room->roomType($room["room_type"]);
               
                if ($filters[$room["room_type"]]) {
                    foreach ($floors as $key => $floor) {
                        if ($room["floor_id"] === $floor["id"]) if ($floor["location_id"] === $locationId) array_push($specifiedRooms, $room);
                    }
                }
            }

            return view("rooms", ["page" => "Dashboard"])->with(
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
    }
?>