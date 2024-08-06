<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;

    public function movements()
    {
        return $this->hasMany('App\Models\Movement');
    }

    static function getAirports()
    {
        $airports = Self::where('status', 1)->get();
        return $airports;
    }
}
