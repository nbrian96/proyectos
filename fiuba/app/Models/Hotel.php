<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    public function movements()
    {
        return $this->hasMany('App\Models\Movement');
    }

    static function getHotels()
    {
        $hotels = Self::where('status', 1)
            ->whereIn('city_id', [1, 3])
            ->get();
        return $hotels;
    }

    static function getUshHotels()
    {
        $ush_hotels = Self::where('status', 1)
            ->whereIn('city_id', [1, 2])
            ->get();
        return $ush_hotels;
    }
}
