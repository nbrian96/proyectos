<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use App\Models\ShipTravel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MovementController extends Controller
{
    public function index()
    {
        return view('movements.index');
    }

    public function create_update_movements($ship_travel_id)
    {
        try {
            $ship_travel = ShipTravel::where('id', $ship_travel_id)
                ->with(['boat' => function ($query) {
                    $query->where('status', 1);
                }])
                ->firstOrFail();

            return view('movements.create_update_movements', compact('ship_travel'));
        } catch (\Exception $e) {
            Log::channel('movement')->info('Exception create_update_movements: ' . $e->getMessage());
            abort(404);
        }
    }
}
