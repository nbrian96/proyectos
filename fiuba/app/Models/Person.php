<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $table = 'persons';

    protected $fillable = [
        'first_name',
        'last_name',
        'passport_number',
        'passport_expiration',
        'gender',
        'phone_number',
        'nationality',
        'email',
        'dob',
        'status',
        'requires_argentine_visa',
        'obtained_argentine_visa',
    ];

    public static function genders()
    {
        return ['Male', 'Female', 'Other'];
    }

    public function movements()
    {
        return $this->hasMany('App\Models\Movement');
    }

    static function getPersons()
    {
        return self::where('status', 1)->get();
    }
}
