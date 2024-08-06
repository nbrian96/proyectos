<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoatController extends Controller
{
    public function index()
    {
        return view('boats.index');
    }
}
