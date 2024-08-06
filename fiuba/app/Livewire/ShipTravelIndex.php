<?php

namespace App\Livewire;

use App\Models\ShipTravel;
use App\Models\Boat;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Livewire\WithPagination;

class ShipTravelIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public $isOpen = 0;
    public $selectedState = 1;

    public $shiptravel_id, $shiptravel_code, $shiptravel_boat_id, $shiptravel_arrival_date,$shiptravel_status,$boats;

    public function mount()
    {
        $this->boats = Boat::getBoats();
    }

    public function render()
    {
        try {
            $shiptravel = ShipTravel::query()
                ->when($this->search, function ($query) {
                    $query->where(function ($query) {
                        $query->where('code', 'LIKE', '%' . $this->search . '%');
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

            return view('livewire.ship-travel-index', compact('shiptravel'));
        } catch (\Exception $e) {
            Log::channel('shiptravel')->info("Exception/Shiptravel/render: " . $e->getMessage());
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
        $this->shiptravel_id = '';
        $this->shiptravel_code = '';
        $this->shiptravel_boat_id = '';
        $this->shiptravel_arrival_date = '';
        $this->shiptravel_status = 1;

        $this->resetErrorBag();
    }

    public function store()
    {
        $this->validate([
            'shiptravel_code' => 'required|string|max:255',
            'shiptravel_boat_id' => 'required',
            'shiptravel_arrival_date' => 'required',
        ]);

        $ok = false;

        try {
            $ok = ShipTravel::updateOrCreate(['id' => $this->shiptravel_id], [
                'code' => $this->shiptravel_code,
                'boat_id' => $this->shiptravel_boat_id,
                'arrival_date' => $this->shiptravel_arrival_date,
                'status' => $this->shiptravel_status
            ]);
        } catch (\Exception $e) {
            Log::channel('shiptravel')->info("Exception/Shiptravel/Store: " . $e->getMessage());
        }

        session()->flash(
            'message',
            $ok ?
                (!empty($this->shiptravel_id) ? 'Buqueviaje Modificado exitosamente.' : 'Buqueviaje Creado exitosamente.')
                : (!empty($this->shiptravel_id) ? 'ERROR: Buqueviaje no Modificado.' : 'ERROR: Buqueviaje no Creado.')
        );

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $this->resetInputFields();

        try {
            $shiptravel = ShipTravel::findOrFail($id);

            $this->shiptravel_id = $shiptravel->id;
            $this->shiptravel_code = $shiptravel->code;
            $this->shiptravel_boat_id = $shiptravel->boat_id;
            $this->shiptravel_arrival_date = $shiptravel->arrival_date;
            $this->shiptravel_status = $shiptravel->status;
            $this->openModal();
        } catch (\Exception $e) {
            Log::channel('shiptravel')->info("Exception/Shiptravel/edit: " . $e->getMessage());
        }
    }
}
