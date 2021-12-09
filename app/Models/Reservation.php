<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'room_id',
        'date_time'
    ];

    public function room()
    {
        return $this->hasone(Room::class);
    }

    public function reservationStartAndBeginTime()
    {
        $reservationStart = new DateTime($this->reservation_start);
        $reservationEnd = new DateTime($this->reservation_end);

        return $reservationStart->format('H:i:s A') . " - " . $reservationEnd->format('H:i:s A');
    }
}
