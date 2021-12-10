<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id',
        'floor_name'
    ];

    public function location()
    {
        return $this->hasone(Location::class, 'id', 'location_id');
    }

    public function rooms()
    {
        return $this->hasmany(Room::class, 'id', 'room_id');
    }
}
