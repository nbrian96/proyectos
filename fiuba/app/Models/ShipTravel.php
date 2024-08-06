<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipTravel extends Model
{
    use HasFactory;

    protected $table = 'ship_travel';

    protected $fillable = [
        'code', 'boat_id', 'arrival_date', 'status'
    ];

    public function boat()
    {
        return $this->belongsTo('App\Models\Boat');
    }

    public function movements()
    {
        return $this->hasMany('App\Models\Movement');
    }

    static function getShipTravels()
    {
        $shipTravels = Self::where('status', 1)->get();
        return $shipTravels;
    }
}
