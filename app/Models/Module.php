<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'desk_id',
        'module_name'
    ];

    public function Desk()
    {
        return $this->hasone(Desk::class, 'id', 'desk_id');
    }
}
