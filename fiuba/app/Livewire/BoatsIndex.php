<?php

namespace App\Livewire;

use App\Models\Boat;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Livewire\WithPagination;

class BoatsIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $isOpen = 0;
    public $search;
    public $selectedState = 1;

    public $boat_id,$boat_name, $boat_flag, $boat_registration, $boat_call_sign, $boat_owner;
    public $boat_total_length, $boat_gross_tonnage, $boat_net_tonnage, $boat_beam;
    public $boat_passenger_capacity, $boat_crew_capacity,$boat_status;


    public function mount()
    {
        $this->resetInputFields();
    }

    public function render()
    {
        try {
            $boats = Boat::query()
                ->when($this->search, function ($query) {
                    $query->where(function ($query) {
                        $query->where('name', 'LIKE', '%' . $this->search . '%');
                    });
                })
                ->when($this->selectedState !== null, function ($query) {
                    $query->where('status', $this->selectedState);
                }, function ($query) {
                    $query->orWhere('status', 0);
                })
                ->orderBy('id', 'asc')
                ->paginate();

                $this->resetPage();

            return view('livewire.boats-index', compact('boats'));
        } catch (\Exception $e) {
            Log::channel('boat')->info("Exception/Boat/render: " . $e->getMessage());
        }
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->boat_id = '';
        $this->boat_name = '';
        $this->boat_flag = '';
        $this->boat_registration = '';
        $this->boat_call_sign = '';
        $this->boat_owner = '';
        $this->boat_total_length = '';
        $this->boat_gross_tonnage = '';
        $this->boat_net_tonnage = '';
        $this->boat_beam = '';
        $this->boat_passenger_capacity = '';
        $this->boat_crew_capacity = '';
        $this->boat_status = 1;

        $this->resetErrorBag();
    }

    public function store()
    {
        $this->validate([
            'boat_name' => 'required|string|max:255',
            'boat_flag' => 'required|string|max:255',
            'boat_registration' => 'required|string|max:255',
            'boat_call_sign' => 'required|string|max:255',
            'boat_owner' => 'required|string|max:255',
            'boat_total_length' => 'required|numeric',
            'boat_gross_tonnage' => 'required|numeric',
            'boat_net_tonnage' => 'required|numeric',
            'boat_beam' => 'required|numeric',
            'boat_passenger_capacity' => 'required|integer',
            'boat_crew_capacity' => 'required|integer',
        ]);

        $ok = false;

        try {
            $ok = Boat::updateOrCreate(['id' => $this->boat_id], [
                'name' => $this->boat_name,
                'flag' => $this->boat_flag,
                'registration' => $this->boat_registration,
                'call_sign' => $this->boat_call_sign,
                'owner' => $this->boat_owner,
                'total_length' => $this->boat_total_length,
                'gross_tonnage' => $this->boat_gross_tonnage,
                'net_tonnage' => $this->boat_net_tonnage,
                'beam' => $this->boat_beam,
                'passenger_capacity' => $this->boat_passenger_capacity,
                'crew_capacity' => $this->boat_crew_capacity,
                'status' => $this->boat_status,
            ]);
        } catch (\Exception $e) {
            Log::channel('boat')->info("Exception/Boat/Store: " . $e->getMessage());
        }

        session()->flash(
            'message',
            $ok ?
                (!empty($this->boat_id) ? 'Barco modificado Exitosamente.' : 'Barco Creado Exitosamente.')
                : (!empty($this->boat_id) ? 'ERROR: Barco no modificado.' : 'ERROR: Barco no Creado.')
        );

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $this->resetInputFields();

        try {
            $boat = Boat::findOrFail($id);
            $this->boat_id = $boat->id;
            $this->boat_name = $boat->name;
            $this->boat_flag = $boat->flag;
            $this->boat_registration = $boat->registration;
            $this->boat_call_sign = $boat->call_sign;
            $this->boat_owner = $boat->owner;
            $this->boat_total_length = $boat->total_length;
            $this->boat_gross_tonnage = $boat->gross_tonnage;
            $this->boat_net_tonnage = $boat->net_tonnage;
            $this->boat_beam = $boat->beam;
            $this->boat_passenger_capacity = $boat->passenger_capacity;
            $this->boat_crew_capacity = $boat->crew_capacity;
            $this->boat_status = $boat->status;
            $this->openModal();
        } catch (\Exception $e) {
            Log::channel('boat')->info("Exception/Boat/edit: " . $e->getMessage());
        }
    }
}
