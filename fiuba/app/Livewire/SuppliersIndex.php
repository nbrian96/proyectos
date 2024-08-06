<?php

namespace App\Livewire;

use App\Models\Supplier;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Livewire\WithPagination;

class SuppliersIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public $isOpen = 0;
    public $selectedState = 1;

    public $supplier_id, $supplier_name, $supplier_cuil, $supplier_domicile,$supplier_status,$supplier_social_reason;

    public function render()
    {
        try {
            $suppliers = Supplier::query()
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

            return view('livewire.suppliers-index', compact('suppliers'));
        } catch (\Exception $e) {
            Log::channel('supplier')->info("Exception/Supplier/render: " . $e->getMessage());
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
        $this->supplier_id = '';
        $this->supplier_name = '';
        $this->supplier_cuil = '';
        $this->supplier_domicile = '';
        $this->supplier_status = 1;
        $this->supplier_social_reason = '';

        $this->resetErrorBag();
    }

    public function store()
    {
        $this->validate([
            'supplier_name' => 'required|string|max:255',
            'supplier_cuil' => 'required|integer|min:0',
            'supplier_social_reason' => 'required',
        ]);

        $ok = false;

        try {
            $ok = Supplier::updateOrCreate(['id' => $this->supplier_id], [
                'name' => $this->supplier_name,
                'cuil' => $this->supplier_cuil,
                'domicile' => $this->supplier_domicile,
                'status' => $this->supplier_status,
                'social_reason' => $this->supplier_social_reason
            ]);
        } catch (\Exception $e) {
            Log::channel('supplier')->info("Exception/Supplier/Store: " . $e->getMessage());
        }

        session()->flash(
            'message',
            $ok ?
                (!empty($this->supplier_id) ? 'Proveedor Modificado exitosamente.' : 'Proveedor Creado exitosamente.')
                : (!empty($this->supplier_id) ? 'ERROR: Proveedor no Modificado.' : 'ERROR: Proveedor no Creado.')
        );

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $this->resetInputFields();

        try {
            $supplier = Supplier::findOrFail($id);

            $this->supplier_id = $supplier->id;
            $this->supplier_name = $supplier->name;
            $this->supplier_cuil = $supplier->cuil;
            $this->supplier_domicile = $supplier->domicile;
            $this->supplier_status = $supplier->status;
            $this->supplier_social_reason = $supplier->social_reason;
            $this->openModal();
        } catch (\Exception $e) {
            Log::channel('supplier')->info("Exception/Supplier/edit: " . $e->getMessage());
        }
    }
}
