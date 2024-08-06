<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'suppliers';

    protected $fillable = [
        'name', 'cuil', 'domicile', 'status','social_reason'
    ];

    public function movements()
    {
        return $this->hasMany('App\Models\Movement');
    }

    static function getSuppliers()
    {
        $suppliers = Self::where('status', 1)->get();
        return $suppliers;
    }
}
