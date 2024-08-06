<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'clients';

    protected $fillable = [
        'name', 'cuit', 'domicile', 'status','social_reason','email','phone_number'
    ];

    public function movements()
    {
        return $this->hasMany('App\Models\Movement');
    }

    static function getClients()
    {
        $clients = self::where('status', 1)->get();
        return $clients;
    }
}
