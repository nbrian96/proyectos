<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boat extends Model
{
    use HasFactory;
    protected $table = 'boats';

    protected $fillable = [
        'name',
        'flag',
        'registration',
        'call_sign',
        'owner',
        'total_length',
        'gross_tonnage',
        'net_tonnage',
        'beam',
        'passenger_capacity',
        'crew_capacity',
        'status',
    ];  

    public function shiptravel()
    {
        return $this->hasMany('App\Models\ShipTravel');
    }

    static function getBoats()
    {
        $boats = self::where('status', 1)->get();
        return $boats;
    }
    
}
