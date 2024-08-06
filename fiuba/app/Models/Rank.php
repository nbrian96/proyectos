<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    use HasFactory;

    public function movements()
    {
        return $this->hasMany('App\Models\Movement');
    }

    static function getRanks()
    {
        $ranks = Self::where('status', 1)->get();
        return $ranks;
    }
}
