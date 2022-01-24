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
        'reservation_start',
        'reservation_end'
    ];

    public function room()
    {
        return $this->hasone(Room::class, 'id', 'room_id');
    }

    public function showDate()
    {
        $reservationStart = new DateTime($this->reservation_start);

        return $reservationStart->format('d F Y');
    }

    public function reservationStartAndBeginTime()
    {
        $reservationStart = new DateTime($this->reservation_start);
        $reservationEnd = new DateTime($this->reservation_end);

        return $reservationStart->format('H:i') . " - " . $reservationEnd->format('H:i');
    }
}
