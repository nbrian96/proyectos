<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeRedirection extends Model
{
    use HasFactory;
    protected $table = 'type_redirections';

    public function movements()
    {
        return $this->hasMany('App\Models\Movement');
    }

    static function getRedirectionTypes()
    {
        $redirectionTypes = Self::where('status', 1)->get();
        return $redirectionTypes;
    }
}
