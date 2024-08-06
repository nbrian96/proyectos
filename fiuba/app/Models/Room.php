<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function movements()
    {
        return $this->hasMany('App\Models\Movement');
    }

    static function getRooms()
    {
        $rooms = Self::where('status', 1)->get();
        return $rooms;
    }

    static function getUshRooms()
    {
        $ush_rooms = Self::where('status', 1)->get();
        return $ush_rooms;
    }
}
