<?php

namespace App\Livewire;

use App\Models\Person;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Livewire\WithPagination;

class PersonsIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public $isOpen = 0;
    public $selectedState = 1;

    public $person_id,
       $person_first_name,
       $person_last_name,
       $person_passport_number,
       $person_passport_expiration,
       $person_gender,
       $person_phone_number,
       $person_nationality,
       $person_email,
       $person_dob,
       $person_status,
       $person_requires_argentine_visa,
       $person_obtained_argentine_visa;

    public $genders;

    public function mount()
    {
        $this->genders = Person::genders();
    }

    public function render()
    {
        try {
            $persons = Person::query()
                    ->when($this->search, function ($query) {
                        $query->where(function ($query) {
                            $query->where('first_name', 'LIKE', '%' . $this->search . '%')
                                    ->orWhere('last_name', 'LIKE', '%' . $this->search . '%')
                                    ->orWhere('email', 'LIKE', '%' . $this->search . '%');
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
                    
            return view('livewire.persons-index', compact('persons'));
        } catch (\Exception $e) {
            Log::channel('person')->info("Exception/Person/render: " . $e->getMessage());
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
        $this->person_id = '';
        $this->person_first_name = '';
        $this->person_last_name = '';
        $this->person_passport_number = '';
        $this->person_passport_expiration = null;
        $this->person_gender = '';
        $this->person_phone_number = '';
        $this->person_nationality = '';
        $this->person_email = '';
        $this->person_dob = '';
        $this->person_status = 1;
        $this->person_requires_argentine_visa = 0;
        $this->person_obtained_argentine_visa = 0;

        $this->resetErrorBag();
    }

    public function store()
    {
        $this->validate([
            'person_first_name' => 'required|string|max:255',
            'person_last_name' => 'required|string|max:255',
            'person_passport_number' => 'required|string|max:255|unique:persons,passport_number,' . $this->person_id,
            'person_passport_expiration' => 'nullable|date',
            'person_gender' => 'nullable|string|max:255',
            'person_phone_number' => 'nullable|string|max:255',
            'person_nationality' => 'nullable|string|max:255',
            'person_email' => 'nullable|email|max:255',
            'person_dob' => 'nullable|string|max:255',
            'person_status' => 'required|in:0,1',
            'person_requires_argentine_visa' => 'required|integer|in:0,1',
            'person_obtained_argentine_visa' => 'required|integer|in:0,1,2'
        ]);
        

        $ok = false;

        try {
            $ok = Person::updateOrCreate(
                ['id' => $this->person_id],
                [
                    'first_name' => $this->person_first_name,
                    'last_name' => $this->person_last_name,
                    'passport_number' => $this->person_passport_number,
                    'passport_expiration' => $this->person_passport_expiration,
                    'gender' => $this->person_gender,
                    'phone_number' => $this->person_phone_number,
                    'nationality' => $this->person_nationality,
                    'email' => $this->person_email,
                    'dob' => $this->person_dob,
                    'status' => $this->person_status,
                    'requires_argentine_visa' => $this->person_requires_argentine_visa,
                    'obtained_argentine_visa' => $this->person_obtained_argentine_visa
                ]
            );
        } catch (\Exception $e) {
            Log::channel('person')->error("Exception/Person/Store: " . $e->getMessage());
        }

        session()->flash(
            'message',
            $ok ?
                (!empty($this->person_id) ? 'Persona Modificada exitosamente.' : 'Persona Creada exitosamente.')
                : (!empty($this->person_id) ? 'ERROR: Persona no Modificada.' : 'ERROR: Persona no Creada.')
        );

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $this->resetInputFields();

        try {
            $person = Person::findOrFail($id);
        
            $this->person_id = $person->id;
            $this->person_first_name = $person->first_name;
            $this->person_last_name = $person->last_name;
            $this->person_passport_number = $person->passport_number;
            $this->person_passport_expiration = $person->passport_expiration;
            $this->person_gender = $person->gender;
            $this->person_phone_number = $person->phone_number;
            $this->person_nationality = $person->nationality;
            $this->person_email = $person->email;
            $this->person_dob = $person->dob;
            $this->person_status = $person->status;
            $this->person_requires_argentine_visa = $person->requires_argentine_visa;
            $this->person_obtained_argentine_visa = $person->obtained_argentine_visa;
        
            $this->openModal();
        } catch (\Exception $e) {
            Log::channel('person')->info("Exception/Person/edit: " . $e->getMessage());
        }
    }
}
