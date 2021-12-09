<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'floor_id',
        'room_name',
        'max_persons',
        'room_type'
    ];

    public function roomType ($typeNumber)
    {
        switch ($typeNumber) {
            case "1":
                return "Desk";
            break;

            case "2":
                return "Silent room";
            break;

            case "3":
                return "Meeting room";
            break;
        }
    }
}
