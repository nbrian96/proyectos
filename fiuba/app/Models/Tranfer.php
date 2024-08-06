<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tranfer extends Model
{
    use HasFactory;

    public function movements()
    {
        return $this->hasMany('App\Models\Movement');
    }

    static function getTranfers()
    {
        $tranfers = Self::where('status', 1)
            ->whereIn('type', [1, 2])
            ->get();
        return $tranfers;
    }

    static function getLocalTranfers()
    {
        $tranfers = Self::where('status', 1)
            ->whereIn('type', [1, 3, 4])
            ->get();
        return $tranfers;
    }

    public static function getTransferBsAs()
    {
        return self::where('status', 1)->whereIn('type', [1, 2])->get();
    }

    public static function getTransferOnUsuahia()
    {
        return self::where('status', 1)->whereIn('type', [1, 3])->get();
    }

    public static function getTransferOffUsuahia()
    {
        return self::where('status', 1)->whereIn('type', [1, 4])->get();
    }
}
