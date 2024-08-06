<?php

namespace App\Livewire;

use App\Models\Airport;
use App\Models\EarlyLateType;
use App\Models\Hotel;
use App\Models\Movement;
use App\Models\Rank;
use App\Models\Room;
use App\Models\ShipTravel;
use App\Models\Supplier;
use App\Models\Tranfer;
use App\Models\TypeProcedure;
use App\Models\TypeRedirection;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Livewire\WithPagination;

class MovementsIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $selectedRank, $selectedtype, $selectedProcedure, $selectedTranfer, $selectedLocalTranfer, $selectedHotel, $selectedSupplier;
    public $selectedEarlyLate, $selectedRoom, $selectedAirport, $selectedHotelUsh, $selectedRoomUsh, $selectedEarlyLateUsh;
    public $selectedLocalSupplier, $selectedRedirection, $selectedShiptravel;
    public $ranks, $procedureTypes, $tranfers, $ush_tranfers, $hotels, $suppliers, $shipTravels;
    public $earlyLateTypes, $rooms, $airports, $ush_hotels, $redirectionTypes;


    public $startDateArrival;
    public $endDateArrival;
    public $startDateFlight;
    public $endDateFlight;
    public $startDateETD;
    public $endDateETD;
    public $startDateETAUSH;
    public $endDateETAUSH;
    public $startDatePickUpHotel;
    public $endDatePickUpHotel;
    public $startDateEmbark;
    public $endDateEmbark;
    public $startDatePickUpCruise;
    public $endDatePickUpCruise;
    public $startDateETDUSH;
    public $endDateETDUSH;
    public $startDateETA;
    public $endDateETA;

    public function mount()
    {
        $this->ranks = Rank::getRanks();
        $this->procedureTypes = TypeProcedure::getProcedureTypes();
        $this->tranfers = Tranfer::getTranfers();
        $this->ush_tranfers = Tranfer::getLocalTranfers();
        $this->hotels = Hotel::getHotels();
        $this->suppliers = Supplier::getSuppliers();
        $this->earlyLateTypes = EarlyLateType::getEarlyLateTypes();
        $this->rooms = Room::getRooms();
        $this->airports = Airport::getAirports();
        $this->ush_hotels = Hotel::getUshHotels();
        $this->redirectionTypes = TypeRedirection::getRedirectionTypes();
        $this->shipTravels = ShipTravel::getShipTravels();
    }

    public function render()
    {
        try {
            $type = Movement::getTypeMovement();

            $movements = Movement::query()
                ->when($this->selectedRank, function ($query) {
                    $query->where('rank_id', $this->selectedRank);
                })
                ->when($this->selectedtype, function ($query) {
                    $query->where('type', $this->selectedtype);
                })
                ->when($this->selectedProcedure, function ($query) {
                    $query->where('procedure_id', $this->selectedProcedure);
                })
                ->when($this->selectedTranfer, function ($query) {
                    $query->where('tranfer_id', $this->selectedTranfer);
                })
                ->when($this->selectedHotel, function ($query) {
                    $query->where('hotel_id', $this->selectedHotel);
                })
                ->when($this->selectedSupplier, function ($query) {
                    $query->where('supplier_id', $this->selectedSupplier);
                })
                ->when($this->selectedEarlyLate, function ($query) {
                    $query->where('early_late_id', $this->selectedEarlyLate);
                })
                ->when($this->selectedRoom, function ($query) {
                    $query->where('room_id', $this->selectedRoom);
                })
                ->when($this->selectedAirport, function ($query) {
                    $query->where('airport_id', $this->selectedAirport);
                })
                ->when($this->selectedHotelUsh, function ($query) {
                    $query->where('hotel_ush_id', $this->selectedHotelUsh);
                })
                ->when($this->selectedRoomUsh, function ($query) {
                    $query->where('room_ush_id', $this->selectedRoomUsh);
                })
                ->when($this->selectedEarlyLateUsh, function ($query) {
                    $query->where('early_late_ush_id', $this->selectedEarlyLateUsh);
                })
                ->when($this->selectedLocalTranfer, function ($query) {
                    $query->where('tranfer_ush_id', $this->selectedLocalTranfer);
                })
                ->when($this->selectedLocalSupplier, function ($query) {
                    $query->where('supplier_ush_id', $this->selectedLocalSupplier);
                })
                ->when($this->selectedRedirection, function ($query) {
                    $query->where('redirection_id', $this->selectedRedirection);
                })
                ->when($this->startDateArrival, function ($query) {
                    $query->whereDate('arrival_datetime', '>=', $this->startDateArrival);
                })
                ->when($this->endDateArrival, function ($query) {
                    $query->whereDate('arrival_datetime', '<=', $this->endDateArrival);
                })
                ->when($this->startDateFlight, function ($query) {
                    $query->whereDate('flight_datetime', '>=', $this->startDateFlight);
                })
                ->when($this->endDateFlight, function ($query) {
                    $query->whereDate('flight_datetime', '<=', $this->endDateFlight);
                })
                ->when($this->startDateETD, function ($query) {
                    $query->whereDate('etd', '>=', $this->startDateETD);
                })
                ->when($this->endDateETD, function ($query) {
                    $query->whereDate('etd', '<=', $this->endDateETD);
                })
                ->when($this->startDateETAUSH, function ($query) {
                    $query->whereDate('eta_ush_datetime', '>=', $this->startDateETAUSH);
                })
                ->when($this->endDateETAUSH, function ($query) {
                    $query->whereDate('eta_ush_datetime', '<=', $this->endDateETAUSH);
                })
                ->when($this->startDatePickUpHotel, function ($query) {
                    $query->whereDate('pick_up_hotel_datetime', '>=', $this->startDatePickUpHotel);
                })
                ->when($this->endDatePickUpHotel, function ($query) {
                    $query->whereDate('pick_up_hotel_datetime', '<=', $this->endDatePickUpHotel);
                })
                ->when($this->startDateEmbark, function ($query) {
                    $query->whereDate('embark_datetime', '>=', $this->startDateEmbark);
                })
                ->when($this->endDateEmbark, function ($query) {
                    $query->whereDate('embark_datetime', '<=', $this->endDateEmbark);
                })
                ->when($this->startDatePickUpCruise, function ($query) {
                    $query->whereDate('pick_up_cruise_datetime', '>=', $this->startDatePickUpCruise);
                })
                ->when($this->endDatePickUpCruise, function ($query) {
                    $query->whereDate('pick_up_cruise_datetime', '<=', $this->endDatePickUpCruise);
                })
                ->when($this->startDateETDUSH, function ($query) {
                    $query->whereDate('etd_ush', '>=', $this->startDateETDUSH);
                })
                ->when($this->endDateETDUSH, function ($query) {
                    $query->whereDate('etd_ush', '<=', $this->endDateETDUSH);
                })
                ->when($this->startDateETA, function ($query) {
                    $query->whereDate('eta_datetime', '>=', $this->startDateETA);
                })
                ->when($this->endDateETA, function ($query) {
                    $query->whereDate('eta_datetime', '<=', $this->endDateETA);
                })
                ->when($this->selectedShiptravel, function ($query) {
                    $query->where('ship_travel_id', $this->selectedShiptravel);
                })
                ->orderBy('id', 'asc')
                ->paginate();

                $this->resetPage();

            return view('livewire.movements-index', compact('movements', 'type'));
        } catch (\Exception $e) {
            Log::channel('movement')->info("Exception/Movement/render: " . $e->getMessage());
        }
    }
}
