<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EarlyLateType extends Model
{
    use HasFactory;

    public function movements()
    {
        return $this->hasMany('App\Models\Movement');
    }

    static function getEarlyLateTypes()
    {
        $earlyLateTypes = Self::where('status', 1)->get();
        return $earlyLateTypes;
    }

    static function getEarlyLateUshTypes()
    {
        $earlyLateUshTypes = Self::where('status', 1)->get();
        return $earlyLateUshTypes;
    }
}
