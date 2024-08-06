<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Livewire\WithPagination;

class ClientsIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public $isOpen = 0;
    public $selectedState = 1;

    public $client_id, $client_name, $client_cuit, $client_domicile, $client_status, $client_social_reason;
    public $client_email, $client_phone_number;

    public function render()
    {
        try {
            $clients = Client::query()
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

            return view('livewire.clients-index', compact('clients'));
        } catch (\Exception $e) {
            Log::channel('client')->info("Exception/Client/render: " . $e->getMessage());
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
        $this->client_id = '';
        $this->client_name = '';
        $this->client_cuit = '';
        $this->client_domicile = '';
        $this->client_status = 1;
        $this->client_social_reason = '';
        $this->client_email = '';
        $this->client_phone_number = '';

        $this->resetErrorBag();
    }

    public function store()
    {
        $this->validate([
            'client_name' => 'required|string|max:255',
            'client_cuit' => 'required|integer|min:0',
            'client_social_reason' => 'required',
            'client_email' => 'nullable|email|max:255',
        ]);

        $ok = false;

        try {
            $ok = Client::updateOrCreate(['id' => $this->client_id], [
                'name' => $this->client_name,
                'cuit' => $this->client_cuit,
                'domicile' => $this->client_domicile,
                'status' => $this->client_status,
                'social_reason' => $this->client_social_reason,
                'email' => $this->client_email,
                'phone_number' => $this->client_phone_number
            ]);
        } catch (\Exception $e) {
            Log::channel('client')->info("Exception/Client/Store: " . $e->getMessage());
        }

        session()->flash(
            'message',
            $ok ?
                (!empty($this->client_id) ? 'Cliente Modificado exitosamente.' : 'Cliente Creado exitosamente.')
                : (!empty($this->client_id) ? 'ERROR: Cliente no Modificado.' : 'ERROR: Cliente no Creado.')
        );

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $this->resetInputFields();

        try {
            $client = Client::findOrFail($id);

            $this->client_id = $client->id;
            $this->client_name = $client->name;
            $this->client_cuit = $client->cuit;
            $this->client_domicile = $client->domicile;
            $this->client_status = $client->status;
            $this->client_social_reason = $client->social_reason;
            $this->client_email = $client->email;
            $this->client_phone_number = $client->phone_number;
            $this->openModal();
        } catch (\Exception $e) {
            Log::channel('client')->info("Exception/Client/edit: " . $e->getMessage());
        }
    }
}
