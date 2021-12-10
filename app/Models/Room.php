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
        'room_type_id'
    ];

    public function roomType ($typeNumber)
    {
        switch ($typeNumber) {
            case "0":
                return "Desk";
            break;

            case "1":
                return "Silent room";
            break;

            case "2":
                return "Meeting room";
            break;
        }
    }
}
