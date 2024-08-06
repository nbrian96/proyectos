<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShipTravelController extends Controller
{
    public function index()
    {
        return view('shiptravel.index');
    }
}
