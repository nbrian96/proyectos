<?php

namespace App\Livewire;

use App\Models\Airport;
use App\Models\Client;
use App\Models\EarlyLateType;
use App\Models\Hotel;
use App\Models\Movement;
use App\Models\Person;
use App\Models\Rank;
use App\Models\Room;
use App\Models\ShipTravel;
use App\Models\Supplier;
use App\Models\Tranfer;
use App\Models\TypeProcedure;
use App\Models\TypeRedirection;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;

class MovementsCreate extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $isOpen = 0;
    public $isOpenPopUp = 0;
    public $type_mov, $type_mov_id, $ship_travel;

    public $ranks, $procedureTypes, $tranfers, $hotels, $ush_hotels, $type, $transfer_type, $tranfersUshuaiaOFF;
    public $suppliers, $earlyLateTypes, $rooms, $airports, $persons, $clients, $tranfersUshuaiaON, $hotels_ush, $redirection_type;

    public $id, $person_id, $rank_id, $client_id, $comment, $procedure_id, $hotel_id, $hotel_ush_id;
    public $tranfer_id, $arrival_datetime, $intl_flight, $supplier_id, $early_late_id, $room_ush_id;
    public $supplier_ush_id, $room_id, $nights, $nights_ush, $reservation_number, $reservation_number_ush;
    public $early_late_ush_id, $tranfer_ush_id, $airport_id, $flight_datetime, $local_flight, $etd;
    public $eta_datetime, $eta_ush_datetime, $pick_up_hotel_datetime, $embark_datetime;
    public $pick_up_cruise_datetime, $etd_ush, $air_route, $redirection_id;

    public function mount($ship_travel = null)
    {
        $this->ship_travel = empty($ship_travel) ? $this->ship_travel : $ship_travel;

        $this->persons = Person::getPersons();
        $this->ranks   = Rank::getRanks();
        $this->clients = Client::getClients();
        $this->procedureTypes = TypeProcedure::getProcedureTypes();
        $this->tranfers = Tranfer::getTransferBsAs();
        $this->tranfersUshuaiaON = Tranfer::getTransferOnUsuahia();
        $this->tranfersUshuaiaOFF = Tranfer::getTransferOffUsuahia();
        $this->hotels = Hotel::getHotels();
        $this->hotels_ush = Hotel::getUshHotels();
        $this->suppliers = Supplier::getSuppliers();
        $this->airports = Airport::getAirports();
        $this->earlyLateTypes = EarlyLateType::getEarlyLateTypes();
        $this->rooms = Room::getRooms();
        $this->type = Movement::getTypeMovement();
        $this->transfer_type = Movement::getTransferType();
        $this->redirection_type = TypeRedirection::getRedirectionTypes();
    }

    public function render()
    {
        try {
            $type_movements = Movement::getMovementsByShipTravel($this->ship_travel->id);

            $type = $this->type;

            $transfer_type = $this->transfer_type;

            return view('livewire.movements-create', compact('type_movements', 'type', 'transfer_type'));
        } catch (\Exception $e) {
            Log::channel('movement')->info("Exception/MovementsCreate/render: " . $e->getMessage());
        }
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetInputFields();
    }

    public function openPopUp()
    {
        $this->isOpenPopUp = true;
    }

    public function closePopUp()
    {
        $this->isOpenPopUp = false;
        $this->resetInputFields();
    }

    public function create($type_mov)
    {
        $this->closePopUp();
        $this->resetInputFields();

        $type_movements = Movement::getTypeMovement();
        $this->type_mov_id = $type_mov;
        $this->type_mov = $type_movements[$type_mov];
        $this->openModal();
    }

    private function resetInputFields()
    {
        $this->id = null;
        $this->type_mov    = null;
        $this->type_mov_id = null;

        $this->person_id = null;
        $this->rank_id   = null;
        $this->client_id = null;
        $this->comment   = null;
        $this->hotel_id  = null;
        $this->tranfer_id = null;
        $this->hotel_ush_id  = null;
        $this->tranfer_ush_id = null;
        $this->procedure_id = null;
        $this->arrival_datetime = null;
        $this->intl_flight = null;
        $this->supplier_id = null;
        $this->early_late_id = null;
        $this->early_late_ush_id = null;
        $this->supplier_ush_id = null;
        $this->room_id = null;
        $this->room_ush_id = null;
        $this->nights = null;
        $this->nights_ush = null;
        $this->reservation_number = null;
        $this->reservation_number_ush = null;
        $this->airport_id = null;
        $this->flight_datetime = null;
        $this->eta_ush_datetime = null;
        $this->local_flight = null;
        $this->etd = null;
        $this->eta_datetime = null;
        $this->pick_up_hotel_datetime = null;
        $this->embark_datetime = null;
        $this->pick_up_cruise_datetime = null;
        $this->etd_ush = null;
        $this->air_route = null;
        $this->redirection_id = null;

        $this->resetErrorBag();
    }

    public function store($type_id)
    {
        $this->validate([
            'early_late_id'  => '',
            'early_late_ush_id'  => '',
            'redirection_id' => '',
            'room_id' => '',
            'airport_id' => '',
            'room_ush_id' => '',
            'supplier_id'  => '',
            'supplier_ush_id' => '',
            'person_id'  => 'required|integer',
            'rank_id'    => '',
            'client_id'  => '',
            'hotel_id'  => '',
            'tranfer_id'  => '',
            'hotel_ush_id'  => '',
            'tranfer_ush_id'  => '',
            'procedure_id' => '',
            'arrival_datetime' => '',
            'flight_datetime' => '',
            'eta_ush_datetime' => '',
            'eta_datetime' => '',
            'embark_datetime' => '',
            'etd_ush' => '',
            'pick_up_cruise_datetime' => '',
            'etd' => '',
            'pick_up_hotel_datetime' => '',
            'intl_flight' => 'max:255',
            'local_flight' => 'max:255',
            'comment'    => 'max:255',
            'air_route' => 'max:255',
            'nights' => 'min:0|max:99',
            'nights_ush' => 'min:0|max:99',
            'reservation_number' => 'min:0|max:9999',
            'reservation_number_ush' => 'min:0|max:9999',
        ]);

        $ok = false;

        try {
            $exists = Movement::where('ship_travel_id', $this->ship_travel->id)
                ->where('person_id', $this->person_id)
                ->where('status', 1)
                ->first();

            if ($exists) {
                if (empty($this->id) || ($exists->id != $this->id)) {
                    return Session::flash('error', 'ERROR: El crew ya existe en el buqueviaje');
                }
            }

            $ok = Movement::updateOrCreate(
                ['id' => $this->id],
                [
                    'early_late_id' => $this->early_late_id,
                    'room_id' => $this->room_id,
                    'airport_id' => $this->airport_id,
                    'flight_datetime' => $this->flight_datetime,
                    'local_flight' => $this->local_flight,
                    'eta_ush_datetime' => $this->eta_ush_datetime,
                    'hotel_ush_id' => $this->hotel_ush_id,
                    'room_ush_id' => $this->room_ush_id,
                    'early_late_ush_id' => $this->early_late_ush_id,
                    'reservation_number_ush' => $this->reservation_number_ush,
                    'reservation_number' => $this->reservation_number,
                    'nights_ush' => $this->nights_ush,
                    'nights' => $this->nights,
                    'tranfer_ush_id' => $this->tranfer_ush_id,
                    'pick_up_hotel_datetime' => $this->pick_up_hotel_datetime,
                    'embark_datetime' => $this->embark_datetime,
                    'redirection_id' => $this->redirection_id,
                    'pick_up_cruise_datetime' => $this->pick_up_cruise_datetime,
                    'etd_ush' => $this->etd_ush,
                    'etd' => $this->etd,
                    'eta_datetime' => $this->eta_datetime,
                    'air_route' => $this->air_route,
                    'type'      => $type_id,
                    'ship_travel_id' => $this->ship_travel->id,
                    'person_id' => $this->person_id,
                    'rank_id'   => $this->rank_id,
                    'supplier_id'   => $this->supplier_id,
                    'supplier_ush_id' => $this->supplier_ush_id,
                    'client_id' => $this->client_id,
                    'hotel_id' => $this->hotel_id,
                    'procedure_id' => $this->procedure_id,
                    'tranfer_id' => $this->tranfer_id,
                    'arrival_datetime' => $this->arrival_datetime,
                    'comment' => $this->comment,
                    'intl_flight' => $this->intl_flight,
                ]
            );
        } catch (\Exception $e) {
            Log::channel('movement')->info("Exception/MovementsCreate/Store: " . $e->getMessage());
        }

        $type_msg = ($ok ? 'message' : 'error');
        $msg =  $ok ?
            (!empty($this->id) ? 'Movimiento Modificado Exitosamente.' : 'Movimiento Creado Exitosamente.')
            : (!empty($this->id) ? 'ERROR: Movimiento no modificado.' : 'ERROR: Movimiento no Creado.');

        Session::flash($type_msg, $msg);

        $this->closeModal();
        $this->closePopUp();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $this->closeModal();
        $this->resetInputFields();

        try {
            $movement = Movement::findOrFail($id);
            $type_movements = Movement::getTypeMovement();

            $this->ship_travel = ShipTravel::findOrFail($movement->ship_travel_id);

            $this->type_mov_id = $movement->type;
            $this->type_mov = $type_movements[$movement->type];

            $this->id = $id;
            $this->early_late_id = $movement->early_late_id;
            $this->room_id = $movement->room_id;
            $this->airport_id = $movement->airport_id;
            $this->flight_datetime = $movement->flight_datetime;
            $this->local_flight = $movement->local_flight;
            $this->eta_ush_datetime = $movement->eta_ush_datetime;
            $this->hotel_ush_id = $movement->hotel_ush_id;
            $this->room_ush_id = $movement->room_ush_id;
            $this->early_late_ush_id = $movement->early_late_ush_id;
            $this->reservation_number_ush = $movement->reservation_number_ush;
            $this->reservation_number = $movement->reservation_number;
            $this->nights_ush = $movement->nights_ush;
            $this->nights = $movement->nights;
            $this->tranfer_ush_id = $movement->tranfer_ush_id;
            $this->pick_up_hotel_datetime = $movement->pick_up_hotel_datetime;
            $this->embark_datetime = $movement->embark_datetime;
            $this->redirection_id = $movement->redirection_id;
            $this->pick_up_cruise_datetime = $movement->pick_up_cruise_datetime;
            $this->etd_ush = $movement->etd_ush;
            $this->etd = $movement->etd;
            $this->eta_datetime = $movement->eta_datetime;
            $this->air_route = $movement->air_route;
            $this->person_id = $movement->person_id;
            $this->rank_id = $movement->rank_id;
            $this->supplier_id = $movement->supplier_id;
            $this->supplier_ush_id = $movement->supplier_ush_id;
            $this->client_id = $movement->client_id;
            $this->hotel_id = $movement->hotel_id;
            $this->procedure_id = $movement->procedure_id;
            $this->tranfer_id = $movement->tranfer_id;
            $this->arrival_datetime = $movement->arrival_datetime;
            $this->comment = $movement->comment;
            $this->intl_flight = $movement->intl_flight;

            $this->openPopUp();
        } catch (\Exception $e) {
            Log::channel('movement')->info("Exception/MovementsCreate/edit: " . $e->getMessage());
        }
    }
}
