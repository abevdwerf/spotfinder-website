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

    public function roomType()
    {
        return $this->hasone(RoomType::class);
    }

    public function floor()
    {
        return $this->hasone(Floor::class, 'id', 'floor_id');
    }
}
