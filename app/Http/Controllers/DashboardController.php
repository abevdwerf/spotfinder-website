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
            return view("dashboard", [
                "page" => "Dashboard",
                "reservations" => Auth::Check() ? Reservation::where('user_id', Auth::User()->id)->get() : "",
                "locations" => Location::join("floors", "locations.id", "=", "floors.location_id")->groupBy("locations.id")->get()
            ]);
        }
    }
?>