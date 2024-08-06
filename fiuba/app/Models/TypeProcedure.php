<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeProcedure extends Model
{
    use HasFactory;
    protected $table = 'type_procedures';

    public function movements()
    {
        return $this->hasMany('App\Models\Movement');
    }

    static function getProcedureTypes()
    {
        $procedureTypes = Self::where('status', 1)->get();
        return $procedureTypes;
    }
}
