<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;

    private static $type = array(1 => 'ON - SIGNERS', 2 => 'OFF - SIGNERS');

    private static $transfer_type = array(0 => 'Transfer Buenos Aires', 1 => 'Transfer Local Ushuaia');

    protected $fillable = [
        'early_late_id',
        'room_id',
        'airport_id',
        'flight_datetime',
        'local_flight',
        'eta_ush_datetime',
        'hotel_ush_id',
        'room_ush_id',
        'early_late_ush_id',
        'reservation_number_ush',
        'reservation_number',
        'nights_ush',
        'nights',
        'tranfer_ush_id',
        'pick_up_hotel_datetime',
        'embark_datetime',
        'redirection_id',
        'pick_up_cruise_datetime',
        'etd_ush',
        'etd',
        'eta_datetime',
        'air_route',
        'type',
        'ship_travel_id',
        'person_id',
        'rank_id',
        'supplier_id',
        'supplier_ush_id',
        'client_id',
        'hotel_id',
        'procedure_id',
        'tranfer_id',
        'arrival_datetime',
        'comment',
        'intl_flight',
    ];

    public static function getTypeMovement()
    {
        return self::$type;
    }

    public static function getTransferType()
    {
        return self::$transfer_type;
    }

    public function person()
    {
        return $this->belongsTo('App\Models\Person', 'person_id');
    }

    public function rank()
    {
        return $this->belongsTo('App\Models\Rank', 'rank_id');
    }

    public function airport()
    {
        return $this->belongsTo('App\Models\Airport', 'airport_id');
    }

    public function early_late_type()
    {
        return $this->belongsTo('App\Models\EarlyLateType', 'early_late_id');
    }

    public function room()
    {
        return $this->belongsTo('App\Models\Room', 'room_id');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier', 'supplier_id');
    }

    public function supplierUsh()
    {
        return $this->belongsTo(Supplier::class, 'supplier_ush_id');
    }

    public function ship_travel()
    {
        return $this->belongsTo(ShipTravel::class, 'ship_travel_id');
    }

    public function tranfer()
    {
        return $this->belongsTo('App\Models\Tranfer', 'tranfer_id');
    }

    public function type_procedure()
    {
        return $this->belongsTo('App\Models\TypeProcedure', 'procedure_id');
    }

    public function type_redirection()
    {
        return $this->belongsTo('App\Models\TypeRedirection', 'redirection_id');
    }

    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel', 'hotel_id');
    }

    public function hotelUsh()
    {
        return $this->belongsTo('App\Models\Hotel', 'hotel_ush_id');
    }

    public function roomUsh()
    {
        return $this->belongsTo('App\Models\Room', 'room_ush_id');
    }

    public function early_late_ush_type()
    {
        return $this->belongsTo('App\Models\EarlyLateType', 'early_late_ush_id');
    }

    public function tranferUsh()
    {
        return $this->belongsTo('App\Models\Tranfer', 'tranfer_ush_id');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'client_id');
    }

    static public function getMovementsByShipTravel($ship_travel_id)
    {
        $movements = self::where('ship_travel_id', $ship_travel_id)
            ->where('status', 1)
            ->with(['person' => function ($query) {
                $query->where('status', 1);
            }])
            ->with(['rank' => function ($query) {
                $query->where('status', 1);
            }])
            ->with(['type_procedure' => function ($query) {
                $query->where('status', 1);
            }])
            ->with(['tranfer' => function ($query) {
                $query->where('status', 1);
            }])
            ->with(['supplier' => function ($query) {
                $query->where('status', 1);
            }])
            ->with(['hotel' => function ($query) {
                $query->where('status', 1);
            }])
            ->with(['early_late_type' => function ($query) {
                $query->where('status', 1);
            }])
            ->with(['room' => function ($query) {
                $query->where('status', 1);
            }])
            ->with(['airport' => function ($query) {
                $query->where('status', 1);
            }])
            ->with(['hotelUsh' => function ($query) {
                $query->where('status', 1);
            }])
            ->with(['roomUsh' => function ($query) {
                $query->where('status', 1);
            }])
            ->with(['early_late_ush_type' => function ($query) {
                $query->where('status', 1);
            }])
            ->with(['tranferUsh' => function ($query) {
                $query->where('status', 1);
            }])
            ->with(['supplierUsh' => function ($query) {
                $query->where('status', 1);
            }])
            ->with(['type_redirection' => function ($query) {
                $query->where('status', 1);
            }])
            ->with(['client' => function ($query) {
                $query->where('status', 1);
            }])
            ->get();

        if (!$movements->count()) {
            return [];
        }

        $result = array(1 => array(), 2 => array());

        foreach ($movements as $movement) {
            $result[$movement->type][] = $movement;
        }

        $movements = $result;

        return $movements;
    }
}
